<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="list">
        <div class="userhead">
            <a href="/tp/index.php/Home/User/Index/name/<?php echo ($vo["name"]); ?>">
                <?php if($vo["head"] != null): ?><img class="img" src=/tp/Public/img/head/<?php echo ($vo["head"]); ?>>
                    <?php else: ?>
                    <img class="img" src=/tp/Public/img/head/default.jpg><?php endif; ?>
                <?php echo ($vo["name"]); ?>
            </a>
        </div>
        <div class="usercontent">
            <div class="time">
                发表于：<?php echo ($vo["time"]); ?>
            </div>
            <!--文本内容-->
            <div class="textcont">
                <?php echo ($vo["content"]); ?>
            </div>
            <!--图片-->

            <?php if($key == 0): if(!empty($image)): if(is_array($image)): $i = 0; $__LIST__ = $image;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$imag): $mod = ($i % 2 );++$i; if($imag != ''): ?><img class="image" src="/tp/Public/img/<?php echo ($vo["cid"]); ?>/<?php echo ($imag); ?>"><?php endif; endforeach; endif; else: echo "" ;endif; endif; endif; ?>
        </div>
        <div style="clear: both"></div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>