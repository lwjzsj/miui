<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="list">
        <div class="title">
            <a href="/tp/index.php/Home/Content/Index/name/<?php echo ($vo["phoneclass"]); ?>/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a>
        </div>
        <div class="themeinfo">
            发帖时间：<?php echo ($vo["time"]); ?>&nbsp;||&nbsp;回复：<?php echo ($vo["num"]); ?>
        </div>


    </div><?php endforeach; endif; else: echo "" ;endif; ?>