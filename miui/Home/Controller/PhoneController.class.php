<?php
namespace Home\Controller;
use Think\Controller;
use Think\Upload;
class PhoneController extends Controller {
    //点击机型帖子列表,name机型
    public function Index($name){
        
        //主题排序
        $_SESSION["ord"]="time DESC";
        //本板块总贴数
        $m=M("list");
        $num=$m->where("phoneclass='$name'")->count();
        $this->assign("num",$num);
        
        
        
        //每个板块的版主，不可删除
        $banzhu=M("phone");
        $bz=$banzhu->where("name='$name'")->getField("admin");
        /*侧边栏热门机型*/
        $hot=$banzhu->where("hat > '0'")->order("hat DESC")->LIMIT(0,17)->select();
        $this->assign("hot",$hot);
        $this->assign("banzhu",$bz);
        $this->assign("name",$name);
        
        
        $this->display("index");
    }
    /*
    修改帖子排序方式
    order依据$_SESSION["ord"]排序
    整个板块有效
    */
    public function recoder($recder,$name){
        $m=M("list");
        //主题排序
        switch($recder){
            case 1:$_SESSION["ord"]="time ASC";
                break;
            case 2:$_SESSION["ord"]="time DESC";
                break;
            case 3:$_SESSION["ord"]="num DESC";
                break;
    }
    
    $list=$m->where("phoneclass='$name'")->order($_SESSION["ord"])->LIMIT(0,19)->select();
    //var_dump($list);
    $this->assign("list",$list);
    $this->assign("name",$name);
    $this->display("content");
}
//每页显示 name 机型名称 p页码
public function content($name,$p){
    $m=M("list");
    $user=M("user");
    $list=$m->where("phoneclass='$name'")->order($_SESSION["ord"])->LIMIT($p,20)->select();
    foreach($list as $key=> $val){
        $where="name='$val[name]'";
        $img=$user->where("$where")->getField("img");
        $list["$key"]["img"]=$img;
    }
    //var_dump($list);
    $this->assign("name",$name);
    $this->assign("list",$list);
    $this->display("content");
}
/*
发表新帖
name为新发帖所属机型
*/
public function newtheme($name){
    if($_SESSION["login"]!=true){
        $this->redirect("User/login");
    }
    else{
        $this->assign("name",$name);
        $this->display("newtheme");
    }
}
public function newthemewrite(){
    //更新板块列表list
    $list=M("list");
    $date["name"]=$_SESSION["name"];
    $date["time"]=date("Y-m-d H:i:s");
    $date["phoneclass"]=$_POST["name"];
    $date["title"]=$_POST["title"];
    $date["num"]=0;
    
    
    //保存上传图片 参数设置
    if($list->add($date)){
        //更新本版块总发帖数
        $hat=M("phone");
        $num=$hat->where("name='$_POST[name]'")->getField("hat");
        $num=$num+1;
        $hat->where("name='$_POST[name]'")->setField("hat",$num);
        $id=$list->where("time='$date[time]'")->getField("id");
        //更新本人发帖数
        $self=M("user");
        $unum=$self->where("name='$_SESSION[name]'")->getField("num");
        $unum=$unum+1;
        $self->where("name='$_SESSION[name]'")->setField("num",$unum);
        
        $config = array(
        'mimes'         =>  array(), //允许上传的文件MiMe类型
        'maxSize'       =>  0, //上传的文件大小限制 (0-不做限制)
        'exts'          =>  array("jpg","png","jpeg"), //允许上传的文件后缀
        'autoSub'       =>  false, //自动子目录保存文件
        'subName'       =>  array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
        'rootPath'      =>  './PUBLIC/img/', //保存根路径
        'savePath'      =>  './'.$id.'/', //保存路径
        'saveName'      =>  array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        'saveExt'       =>  '', //文件保存后缀，空则使用原后缀
        'replace'       =>  false, //存在同名是否覆盖
        'hash'          =>  true, //是否生成hash编码
        'callback'      =>  false, //检测文件是否存在回调，如果存在返回文件信息数组
        'driver'        =>  '', // 文件上传驱动
        'driverConfig'  =>  array(), // 上传驱动配置
    );
    $upload=new Upload($config);
    $re=$upload->upload();
    if($re){
        foreach($re as $info){
            $name=$info["savename"].",";
            $filename.=$name;
        }
    }
    else{
        $filename=null;
    }
    $reply["cid"]=$id;
        $reply["time"]=$date["time"];
        $reply["content"]=$_POST["content"];
        $reply["name"]=$_SESSION["name"];
        $reply["img"]=$filename;
        $rep=M("reply");
        if($rep->add($reply)){
            $this->redirect("Phone/Index",array("name"=>$_POST["name"]));
        }
    }
     

}
}