<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href=/tp/Public/css/style.css />
    <style>
        #content {
            height: auto;
            width: 960px;
            margin: 5px auto;
            border: 0px solid #ccc;
            border-radius: 4px;
            font-size: 13px;
        }
        
        #id {
            opacity: 0;
        }
        
        .list {
            background-color: #fff;
            min-height: 420px;
            width: 958px;
            margin: 8px auto;
            border: 1px solid #ccc;
            border-radius: 4px;
            clear: both;
        }
        
        .userhead {
            min-height: 420px;
            width: 200px;
            margin: 0px auto;
            border: 0px solid #ccc;
            border-radius: 4px 0px 0px 4px;
            text-align: center;
            float: left;
        }
        
        .img {
            width: 150px;
            height: 180px;
            border-radius: 4px;
            display: block;
            margin: 20px auto;
        }
        
        .usercontent {
            height: auto;
            width: 736px;
            border-radius: 0px 4px 4px 0px;
            border-left: 1px dashed #ccc;
            padding: 10px;
            float: left;
            font-size: 12px;
        }
        
        .time {
            height: 20px;
            width: 734px;
            border-bottom: 1px dashed #ccc;
            font-size: 12px;
            color: #999;
        }
        
        .textcont {
            height: auto;
            width: 734px;
        }
        
        .image {
            display: block;
            width: 400px;
            height: auto;
        }
        
        #replyform {
            height: 240px;
            width: 958px;
            margin: 3px auto;
            border: 1px solid #ccc;
            border-radius: 4px 4px 4px 4px;
        }
        
        #dontreply {
            font-size: 18px;
            height: 240px;
            width: 958px;
            line-height: 240px;
            text-align: center;
            background-color: #f0f0f0;
            border-radius: 4px 4px 4px 4px;
        }
        
        #dontreply a {
            font-size: 18px;
            color: red;
        }
        
        #selfhead {
            height: 240px;
            width: 200px;
            float: left;
            border-radius: 4px 4px 4px 4px;
        }
        
        #retext {
            height: 150px;
            width: 650px;
            display: block;
            float: left;
            margin-top: 20px;
            margin-left: 50px;
            border: 1px solid #ccc;
            border-radius: 4px 4px 4px 4px;
        }
        
        #subbtn {
            display: block;
            height: 29px;
            width: 80px;
            float: left;
            margin-top: 5px;
            margin-left: 50px;
            background-color: #FD6440;
            border: 1px solid #eee;
            border-radius: 4px 4px 4px 4px;
        }
        
        #error {
            height: 29px;
            width: 200px;
            float: left;
            margin-left: 50px;
            line-height: 29px;
        }
        
        #previous {
            height: 25px;
            width: 60px;
            float: left;
            border: 1px solid #ccc;
            margin-left: 200px;
            text-align: center;
            line-height: 25px;
            font-size: 14px;
            background-color: #fff;
        }
        
        .p {
            height: 25px;
            width: 30px;
            float: left;
            border: 1px solid #ccc;
            margin-left: 10px;
            text-align: center;
            line-height: 25px;
            font-size: 14px;
            background-color: #fff;
        }
        
        #next {
            height: 25px;
            width: 60px;
            float: left;
            border: 1px solid #ccc;
            margin-left: 10px;
            text-align: center;
            line-height: 25px;
            font-size: 14px;
            background-color: #fff;
        }
    </style>
    <script type="text/javascript" src="/tp/Public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var p = 0;
            var max = $("#contnum").text();
            var id = $("#id").text();
            $("#content").load("/tp/index.php/Home/Content/replycontent/id/" + id + "/p/" + p);

            //输入框长度
            $("#retext").keyup(function(e) {
                    var str = $("#retext").val();
                    var len = 200 - str.length;
                    if (len < 0) {
                        $("#error").css("color", "red");
                        $("#error").html("输入长度过长");
                    } else {
                        $("#error").css("color", "#000");
                        $("#error").html("你还可以输入" + len + "个字符");
                    }

                })
                //翻页
            $("#previous").click(function() {
                if (p >= 10) {

                    $(".p").css("color", "#000");
                    p = p - 10;
                    var i = p / 10 + 1;
                    var str = "#" + i;
                    $("#content").load("/tp/index.php/Home/Content/replycontent/id/" + id + "/p/" + p);
                    $(str).css("color", "red");
                }
            })

            $("#next").click(function() {
                if (p < max - 10) {
                    $(".p").css("color", "#000");
                    p = p + 10;
                    var i = p / 10 + 1;
                    var str = "#" + i;
                    $("#content").load("/tp/index.php/Home/Content/replycontent/id/" + id + "/p/" + p);
                    $(str).css("color", "red");
                }
            })
            $(".p").click(function() {
                $(".p").css("color", "#000");
                p = ($(this).attr("id") - 1) * 10;
                $("#content").load("/tp/index.php/Home/Content/replycontent/id/" + id + "/p/" + p);
                $(this).css("color", "red");
            })


        })

        function chick(form) {
            var str = $("#retext").val();
            var len = str.length;
            if (len > 200) {
                $("#error").html("输入长度过长");
                $("#error").css("color", "red");
                return false;
            }
            if ($("#retext").val() == "") {
                $("#error").html("回复内容不能为空");
                $("#error").css("color", "red");
                return false;
            }

        }
    </script>


    <title><?php echo ($title); ?></title>
</head>

<body>
    <div id="head">
        <div id="h1">
            <!--logo-->
            <div id="log"></div>
            <div id="u">
                <!--用户信息，登陆，注销-->
                <div id="user">
                    <?php if($_SESSION[login] != true): ?><a href=/tp/index.php/Home/User/login/str/请登录>登陆</a>
                        <?php else: ?> <a href=/tp/index.php/Home/User/index/name/<?php echo ($_SESSION[name]); ?>><?php echo ($_SESSION["name"]); ?></a><?php endif; ?>
                </div>
                <!--form 搜索框-->
                <div id="boxsearch">
                    <form action="/tp/index.php/Home/Index/search" method="POST">
                        <input type="text" name="search" id="search"><input type="submit" value="搜索" id="searchbtn">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="top">
        <!--板块导航-->
        <div id="top_c">
            <!--板块导航1-->
            <a href=/tp/index.php/Home/Index/index>
                <div class="phoneclass">
                    机型专区
                </div>
            </a>
            <!--板块导航2.。。。在这增加-->
        </div>
    </div>
    <div id="main">
        <!--本版块信息：板块名，导航，版主 -->
        <div id="classinfo">
            <!--导航-->
            <div id="gide"><a href=/tp/index.php/Home/Index/index>机型专区</a>&nbsp;>>&nbsp;<a href=/tp/index.php/Home/Phone/index/name/<?php echo ($name); ?>><?php echo ($name); ?></a>&nbsp;>>&nbsp;<?php echo ($title); ?>
                <m id="id"><?php echo ($id); ?></m>
            </div>
            <!--机型名称-->
            <div id="phoneclass"><a href=/tp/index.php/Home/Phone/index/name/<?php echo ($name); ?>><?php echo ($name); ?></a></div>
            <!--版主大大-->
            <div id="banzhu">共
                <m id="contnum"><?php echo ($num); ?></m>帖</div>
        </div>
        <div id="content">

        </div>
        <!--页码-->
        <div id="page">

            <div id="previous">
                前一页
            </div>
            <?php $__FOR_START_10201__=1;$__FOR_END_10201__=ceil($num/10)+1;for($i=$__FOR_START_10201__;$i < $__FOR_END_10201__;$i+=1){ ?><div class="p" id="<?php echo ($i); ?>"><?php echo ($i); ?></div><?php } ?>
            <div id="next">
                下一页
            </div>
        </div>
        <div id="replyform">
            <?php if($_SESSION[login] == true): ?><div id="selfhead">
                    <?php if($selfimg != ''): ?><img class="img" src=/tp/Public/img/head/<?php echo ($selfimg); ?> />
                        <?php else: ?>
                        <img class="img" src=/tp/Public/img/head/default.jpg /><?php endif; ?>
                </div>
                <form id="form" action="/tp/index.php/Home/Content/reply/cid/<?php echo ($id); ?>" method="POST" onsubmit="return chick(this)">
                    <textarea id="retext" name="text"></textarea><br>
                    <input type="submit" value="回复" id="subbtn">
                    <div id="error"></div>
                </form>
                <?php else: ?>
                <div id="dontreply">
                    你尚未<a href=/tp/index.php/Home/User/login>登陆</a>，无法发表回复
                </div><?php endif; ?>
        </div>
    </div>
    <div id="shenmin">仅供练手，无任何商业用途</div>
</body>

</html>