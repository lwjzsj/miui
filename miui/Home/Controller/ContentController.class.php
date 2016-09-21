<?php
namespace Home\Controller;
use Think\Controller;
class ContentController extends Controller {
    /*
    name为机型名称
    页面框架
    */
    public function Index($name,$id){
        //标题
        $t=M("list");
        $title=$t->where("id='$id'")->getField("title");
        $this->assign("title",$title);
        
        //发帖数
        $m=M("reply");
        $num=$m->where("cid='$id'")->count();
        $this->assign("num",$num);
        
        //导航使用
        $this->assign("name",$name);
        $this->assign("id",$id);
        
        //发帖框头像
        if($_SESSION["login"]==true){
            $head=M("user");
            $re=$head->where("name='$_SESSION[name]'")->getField("img");
            $this->assign("selfimg",$re);
        }

        
        $this->display("index");
    }
    /*
    本帖具体内容
    当前页帖子及回帖内容，ID：本次主题id，p:下一页页码*/
    public function replycontent($id,$p){
        $m=M("reply");
        $userhead=M("user");
        $list=$m->where("cid='$id'")->order("time ASC")->LIMIT($p,10)->select();
        //头像
        $img=null;
        foreach($list as $key=>$value)
        {
            $img=$userhead->where("name='$value[name]'")->getField("img");
            $list[$key]["head"]=$img;
            
        }
        if($list["0"]["img"]!=null)
        {
            $img=$list["0"]["img"];
        }
        
        $img=explode(",",$img);
        $this->assign("image",$img);
        //var_dump($img);
        //var_dump($list);
        $this->assign("id",$id);
        $this->assign("list",$list);
        $this->display("content");
    }
    public function reply($cid){
        $m=M("reply");
        $replynum=M("list");
        $date["time"]=date("Y-m-d H:i:s");
        $date["cid"]=$cid;
        $date["content"]=$_POST["text"];
        $date["name"]=$_SESSION["name"];
        //写入回复数据库reply
        $result=$m->add($date);
        //更新回帖数
        $num=$replynum->where("id='$cid'")->getField("num");
        if($result){
            $num=$num+1;
            $re=$replynum->where("id='$cid'")->setField("num",$num);
            $name=$replynum->where("id='$cid'")->getField("phoneclass");
            $this->redirect("Index",array("name"=>$name,"id"=>$cid));
        }
        else{
            $this->error("回复失败");
        }
    }
    
}