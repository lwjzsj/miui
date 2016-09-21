<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function Index(){
        if($_SESSION["login"]!=true)
        {
            $_SESSION["name"]=null;
            $_SESSION["login"]=false;
        }
        //热门机型列表
        $m=M("phone");
        $result=$m->where("hat>'0'")->order("hat DESC")->LIMIT(0,9)->select();
        $this->assign("hatphone",$result);
        //所有机型列表
        $list=$m->order("hat DESC")->select();
        $this->assign("allphone",$list);
        
        
        
        $this->display("index");
    }
    public function search(){
        $m=M("list");
        $str=$_POST["search"];
        if($str!=""){
            $where["title"]=array("like",array("%$str","%$str%","$str%"),'OR');
            $num=$m->where($where)->count();
            
            //var_dump($list);
            $this->assign("str",$str);
            $this->assign("num",$num);
            $this->display("searchtheme");
        }
    }
    public function page($str,$p){
        $m=M("list");
        if($str!=""){
            $where["title"]=array("like",array("%$str","%$str%","$str%"),'OR');
            $list=$m->where($where)->LIMIT($p,20)->select();
            
            $this->assign("list",$list);
            $this->display("searchlist");
        }
    }
    public function searchpeople(){
        $m=M("user");
       $str=$_POST["search"];
        if($str!=""){
            $where["title"]=array("like",array("%$str","%$str%","$str%"),'OR');
            $list=$m->where($where)->select();
            foreach($list as $vo){
                $user[]=array("name"=>$vo["name"],"head"=>$vo["img"]);
            }
            //var_dump($user);
            $this->assign("user",$user);
            $this->display("peoplelist");
        }
    }
}