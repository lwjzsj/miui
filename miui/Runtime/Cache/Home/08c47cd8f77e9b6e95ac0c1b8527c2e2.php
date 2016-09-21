<?php if (!defined('THINK_PATH')) exit();?><div style="height:850px;width:650px;margin:50px auto;">
    <?php if(is_array($showfriends)): $i = 0; $__LIST__ = $showfriends;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$friend): $mod = ($i % 2 );++$i;?><div style="height:190px;width:140px;float:left;margin-top:10px;margin-left:10px;border:1px solid #ccc;">
            <a href="/tp/index.php/Home/User/Index/name/<?php echo ($friend["name"]); ?>">
                <?php if($friend["headimg"] != ''): ?><img style="display:block;height:140px;width:auto;margin:10px auto;" src="/tp/Public/img/head/<?php echo ($friend["headimg"]); ?>" />
                    <?php else: ?>
                    <img style="display:block;height:140px;width:auto;margin:10px auto;" src="/tp/Public/img/head/default.jpg" /><?php endif; ?>
                <div style="height:30px;width:140px;text-align: center;line-height: 30px;"><?php echo ($friend["name"]); ?></div>
            </a>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>