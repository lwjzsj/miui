<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
class UserController extends Controller {
    /*
    用户信息页
    name可以为当前登陆用户，也可以为要查看的用户
    */
    public function Index($name){
        
        
        
        //留言板id
        $m=M("user");
        $id=$m->where("name='$name'")->getField("id");
        $this->assign("id",$id);
        
        $this->assign("name",$name);
        
        $this->display("index");
    }
    /*
    用户信息
    */
    public function userinfo($name){
        $m=M("user");
        $list=$m->where("name='$name'")->find();

        $friends=$list["friends"];
        $friends=explode(",",$friends);
        $fr="关注";
        foreach($friends as $value){
            if($value==$_SESSION["name"]){
                $fr="已关注";
            }
        }
        $this->assign("fr",$fr);
        //var_dump($list);
        $this->assign("info",$list);
        $this->display("userinfo");
    }
    
    /*
    编辑用户信息
    */
    public function edit($name){
        $m=M("user");
        $list=$m->where("name='$name'")->find();
        $id=$list["id"];
        if($_POST["oldpwd"]!=""){
            $str=$list["pwd"];
            if(!($str==md5($_POST["oldpwd"]))){
                $this->error("原密码输入不正确");
            }
            $date["pwd"]=md5($_POST["newpwd"]);
        }
        $config = array(
        'mimes'         =>  array(), //允许上传的文件MiMe类型
        'maxSize'       =>  0, //上传的文件大小限制 (0-不做限制)
        'exts'          =>  array("jpg","png","jpeg"), //允许上传的文件后缀
        'autoSub'       =>  false, //自动子目录保存文件
        'subName'       =>  array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
        'rootPath'      =>  './PUBLIC/img/head/', //保存根路径
        'savePath'      =>  './', //保存路径
        'saveName'      =>  array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        'saveExt'       =>  '', //文件保存后缀，空则使用原后缀
        'replace'       =>  false, //存在同名是否覆盖
        'hash'          =>  true, //是否生成hash编码
        'callback'      =>  false, //检测文件是否存在回调，如果存在返回文件信息数组
        'driver'        =>  '', // 文件上传驱动
        'driverConfig'  =>  array(), // 上传驱动配置
        );
        $upload=new upload($config);
        $re=$upload->upload();
        if($re["files"]["savename"]!=""){
            $date["img"]=$re["files"]["savename"];
        }
        if($m->where("id='$id'")->save($date)){
            $this->redirect("/Home/User/Index",array("name"=>"$name"));
        }
    }
    /*
    关注
    */
    public function flow($name){
        if($_SESSION["login"]==true){
            $m=M("user");
            $re=$m->where("name='$name'")->find();
            $fr=$re["friends"].",".$_SESSION["name"];
            $info=$m->where("id='$re[id]'")->setField("friends",$fr);
            if($info){
                echo "已关注";
            }
        }
        else{
            echo "请登录";
        }
    }

    /*
    用户主题
    */
    public function usertheme($name){
        //用户主题数
        $m=M("user");
        $num=$m->where("name='$name'")->getField("num");
        $this->assign("num",$num);
        $this->display("usertheme");
    }
    public function page($name,$p){
        $m=M("list");
        $list=$m->where("name='$name'")->order("time DESC")->LIMIT($p,8)->select();
        //var_dump($list);
        $this->assign("list",$list);
        $this->display("themelist");
    }
    /*
    用户好友
    */
    public function userfriends($name){
        $m=M("user");
        $list=$m->where("name='$name'")->getField("friends");
        $friends=explode(",",$list);
        //var_dump($friends);
        
        //var_dump($showfriends);
        foreach($friends as $value){
            if($value){
                $img=$m->where("name='$value'")->getField("img");
                $showfriends[]=array("name"=>$value,"headimg"=>$img);
            }
        }
        $this->assign("showfriends",$showfriends);
        $this->display("userfriends");
    }
    /*
    用户留言板
    */
    public function usertalk($name){
        $m=M("talk");
        $id=M("user");
        $cid=$id->where("name='$name'")->getField("id");

        $list=$m->where("cid='$cid'")->select();
        //var_dump($list);
        $this->assign("uname",$name);
        $this->assign("cid",$cid);
        $this->assign("talklist",$list);
        $this->display("talk");
    }
    // 留言写入数据库
    public function writetalk($cid,$name){
        if($_SESSION["login"]==true){
            $m=M("talk");
            $date["cid"]=$cid;
            $date["name"]=$_SESSION["name"];
            $date["time"]=date("Y-m-d H:i:s");
            $date["content"]=$_POST["retalk"];
            if($m->add($date)){
                $this->redirect("/Home/User/index/name/$name");
            }
        }
    }
    
    //用户登陆入口
    public function login($str="请登录"){
        $this->assign("str",$str);
        $this->display("login");
    }
    //用户登陆
    public function userlogin(){
        if($_SESSION["login"]==true){
            $this->error("你已登录");
        }
        $name=$_POST["name"];
        $pwd=md5($_POST["pwd"]);
        $m=M("user");
        $p=$m->where("name='$name'")->getField("pwd");
        
        if($pwd==$p){
            $_SESSION["name"]=$name;
            $_SESSION["login"]=true;
            $this->success("登陆成功",U("/Home/Index/index"));
        }
        else{
            $this->error("密码或用户名不正确");
        }
    }
    //用户注册
    public function userregin(){
        if($_SESSION["login"]==true){
            $this->error("你已登录");
        }
        
        $m=M("user");
        if(($m->where("name='$_POST[name]'")->find())!=null)
        {
            $this->error("用户已存在");
        }
        
        $date["name"]=$_POST["name"];
        $date["pwd"]=md5($_POST["pwd"]);
        $date["time"]=date("Y-m-d H:i:s");
        $date["qx"]="0";
        
        
        $result=$m->add($date);
        if($result){
            $_SESSION["name"]=$_POST["name"];
            $_SESSION["login"]=true;
            $this->success("注册成功",U("/Home/Index/index"));
        }
        else{
            $this->error("注册失败");
        }
    }
}