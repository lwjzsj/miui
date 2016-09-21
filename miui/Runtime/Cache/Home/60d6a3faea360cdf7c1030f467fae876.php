<?php if (!defined('THINK_PATH')) exit();?><div id="clist">
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--一个完整的主题-->
        <div class="list">
            <!--主题头像-->
            <a href="/tp/index.php/Home/User/index/name/<?php echo ($vo["name"]); ?>">
                <div class="headimg">
                    <?php if($vo["img"] != null): ?><img class="himg" src=/tp/Public/img/head/<?php echo ($vo["img"]); ?>>
                        <?php else: ?>
                        <img class="himg" src=/tp/Public/img/head/default.jpg><?php endif; ?>
                </div>
            </a>
            <!--主题标题，信息-->
            <div class="cont">
                <div class="title">
                    <a href=/tp/index.php/Home/Content/Index/name/<?php echo ($name); ?>/id/<?php echo ($vo["id"]); ?>><?php echo ($vo["title"]); ?></a>
                </div>
                <div class="listinfo">
                    发表于:<?php echo ($vo["time"]); ?>&nbsp;|&nbsp;回复:<?php echo ($vo["num"]); ?>
                </div>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>