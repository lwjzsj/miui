<?php
/**
 * Created by PhpStorm.
 * User: lwjzsj
 * Date: 2016/6/27
 * Time: 1:26
 */

namespace Home\Controller;


use Think\Controller;

class ContentController extends Controller
{
    public function border()
    {
        $m=M('list');
        $result=$m->select();
        $this->assign("content",$result);
        $this->display();
    }
    //帖子内容
    public function detail($id)
    {
        $id=intval($id);
        $t=M("list");
        $title=$t->where("ID='$id'")->find();
        $m=M('content');

        $n=$m->where("ID='$id'")->count();
        $page= new \Think\Page($n,2);
        $show=$page->show();
        $list=$m->where("ID='$id'")->LIMIT($page->firstRow.','.$page->listRows)->select();
        $this->assign("page",$show);
        $this->assign("post",$list);
        $this->assign("title",$title);
        $this->display();
    }

}