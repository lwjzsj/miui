<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="/tp/Public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#talkinput").keyup(function() {
                var str = $("#talkinput").val();
                var len = 200 - str.length;
                if (len < 0) {
                    $("#inputinfo").css("color", "red");
                    $("#inputinfo").html("输入长度过长");
                } else {
                    $("#inputinfo").css("color", "#000");
                    $("#inputinfo").html("你还可以输入" + len + "个字符");
                }
            })
        })

        function talkchick(form) {
            if ($("#talkinput").val() == "") {
                $("#inputinfo").css("color", "red");
                $("#inputinfo").html("你没有输入任何内容");
                return false;
            }
            var str = $("#talkinput").val();
            var len = 200 - str.length;
            if (len < 0) {
                $("#inputinfo").css("color", "red");
                $("#inputinfo").html("输入长度过长");
                return false;
            }
        }
    </script>

</head>

<body>
    <div style="height:500px;width:680px;margin:20px auto;overflow: auto;">
        <?php if(is_array($talklist)): $i = 0; $__LIST__ = $talklist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$talk): $mod = ($i % 2 );++$i;?><div style="height:auto;width:650px;margin:10px auto;border:1px solid #ccc;font-size: 13px;">
                "<?php echo ($talk["name"]); ?>"说:<br/>&nbsp;&nbsp;<?php echo ($talk["content"]); ?>
                <div style="height:13px;width:650px;text-align: right;font-size: 10px;color:#ccc;"><?php echo ($talk["time"]); ?></div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <?php if($_SESSION[login]==true): ?><form action="/tp/index.php/Home/User/writetalk/cid/<?php echo ($cid); ?>/name/<?php echo ($uname); ?>" method="POST" onsubmit="return talkchick(this)">
            <div style="height:150px;width:680px;margin:20px auto;">
                <textarea id="talkinput" style="display:block;height:120px;width:678px;" name="retalk"></textarea>
                <input type="submit" style="margin-top:5px;height:20px;width:60px;background-color:#fff;border:1px solid #ccc;" value="留言">
                <mm id="inputinfo" style="font-size:12px;"></mm>
            </div>
        </form>
        <?php else: ?>
        <div style="border:1px solid #ccc;font-size:13px;height:150px;width:680px;margin:20px auto;text-align: center;line-height: 150px;">
            你尚未
            <a href="/tp/index.php/Home/User/login">
                <mm style="font-size:13px;color:red;">登录</mm>
            </a>，无法留言
        </div><?php endif; ?>
</body>