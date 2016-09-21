<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        #themelist {
            width: 600px;
            height: 600px;
            margin: 20px auto;
            margin-bottom: 0px;
        }
        
        #pag {
            width: 600px;
            height: 50px;
            margin: 10px auto;
            margin-bottom: 0px;
        }
        
        .pp {
            text-align: center;
            line-height: 30px;
            width: 25px;
            height: 30px;
            border: 1px solid #ccc;
            float: left;
            margin-left: 10px;
            margin-top: 10px;
        }
        
        .ppp {
            text-align: center;
            line-height: 30px;
            width: 60px;
            height: 30px;
            border: 1px solid #ccc;
            float: left;
            margin-left: 80px;
            margin-top: 10px;
        }
        
        .list {
            width: 600px;
            height: 60px;
            border: 1px solid #ccc;
            margin: 15px auto;
            margin-bottom: 0px;
        }
        
        .title {
            width: 550px;
            height: 40px;
            margin-left: 30px;
            line-height: 40px;
        }
        
        .title a {
            font-size: 16px;
            color: #000;
        }
        
        .themeinfo {
            width: 550px;
            height: 20px;
            margin-left: 30px;
            line-height: 20px;
            text-align: right;
            font-size: 12px;
            color: #ccc;
        }
        
        #next {
            margin-left: 10px;
        }
    </style>
    <script type="text/javascript" src="/tp/Public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var name = $("#name").text();
            var max = $("#nn").text();
            var p = 0;
            $("#themelist").load("/tp/index.php/Home/User/page/name/" + name + "/p/" + p);
            $("#last").click(function() {
                if (p >= 8) {

                    $(".pp").css("color", "#000");
                    p = p - 8;
                    var i = p / 8 + 1;
                    var str = "#" + i;
                    $("#themelist").load("/tp/index.php/Home/User/page/name/" + name + "/p/" + p);
                    $(str).css("color", "red");
                }
            })

            $("#next").click(function() {
                if (p < max - 8) {
                    $(".pp").css("color", "#000");
                    p = p + 8;
                    var i = p / 8 + 1;
                    var str = "#" + i;
                    $("#themelist").load("/tp/index.php/Home/User/page/name/" + name + "/p/" + p);
                    $(str).css("color", "red");
                }
            })
            $(".pp").click(function() {
                $(".pp").css("color", "#000");
                p = ($(this).attr("id") - 1) * 8;
                $("#themelist").load("/tp/index.php/Home/User/page/name/" + name + "/p/" + p);
                $(this).css("color", "red");
            })
        })
    </script>
</head>

<body>
    <div id="themelist"></div>
    <div id="pag">
        <div class="ppp" id="last">上一页</div>
        <?php $__FOR_START_9659__=1;$__FOR_END_9659__=(ceil($num/8)+1);for($i=$__FOR_START_9659__;$i < $__FOR_END_9659__;$i+=1){ ?><div class="pp" id="<?php echo ($i); ?>"><?php echo ($i); ?></div><?php } ?>
        <div class="ppp" id="next">下一页</div>
    </div>
    <div style="float:right;font-size: 10px;">共
        <mm id="nn"><?php echo ($num); ?></mm>帖</div>
</body>

</html>