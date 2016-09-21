<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href=/tp/Public/css/style.css />
    <style>
        #content {
            height: 700px;
            width: 960px;
            margin: 5px auto;
            border: 0px solid #ccc;
            border-radius: 4px;
        }
        
        #classinfo {
            height: 60px;
            width: 958px;
            line-height: 60px;
            margin: 0px auto;
        }
        
        #left {
            width: 257px;
            height: 700px;
            border: 1px solid #ccc;
            border-radius: 5px 0px 0px 5px;
            float: left;
            background-color: #f0f0f0;
        }
        
        #right {
            width: 700px;
            height: 700px;
            border: 1px solid #ccc;
            border-left: 0px;
            border-radius: 0px 5px 5px 0px;
            float: left;
            background-color: #fff;
        }
        
        .userbtn {
            width: 180px;
            height: 40px;
            text-align: center;
            line-height: 40px;
            float: right;
            margin-top: 30px;
            border: 1px solid #ccc;
            border-right: 0px;
        }
    </style>
    <script type="text/javascript" src="/tp/Public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#right").load("/tp/index.php/Home/User/userinfo/name/" + $("#name").text());
            $("#userinfo").css("background-color", "#fcfcfc");
            $("#userinfo").click(function() {
                $(".userbtn").css("background-color", "#f0f0f0");
                $("#right").load("/tp/index.php/Home/User/userinfo/name/" + $("#name").text());
                $("#userinfo").css("background-color", "#fcfcfc");
            })
            $("#theme").click(function() {
                $(".userbtn").css("background-color", "#f0f0f0");
                $("#theme").css("background-color", "#fcfcfc");
                $("#right").load("/tp/index.php/Home/User/usertheme/name/" + $("#name").text());
            })
            $("#friends").click(function() {
                $(".userbtn").css("background-color", "#f0f0f0");
                $("#friends").css("background-color", "#fcfcfc");
                $("#right").load("/tp/index.php/Home/User/userfriends/name/" + $("#name").text());
            })
            $("#talk").click(function() {
                $(".userbtn").css("background-color", "#f0f0f0");
                $("#talk").css("background-color", "#fcfcfc");
                $("#right").load("/tp/index.php/Home/User/usertalk/name/" + $("#name").text());
            })
        })
    </script>

    <title><?php echo ($name); ?>的首页</title>
</head>

<body>
    <div id="head">
        <div id="h1">
            <!--logo-->
            <div id="log"></div>
            <div id="u">
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
            <m id="name"><?php echo ($name); ?></m>的空间
        </div>
        <div id="content">
            <div id="left">
                <div id="userinfo" class="userbtn">
                    个人资料
                </div>
                <div id="theme" class="userbtn">
                    主题

                </div>
                <div id="friends" class="userbtn">
                    好友
                </div>
                <div id="talk" class="userbtn">
                    留言板
                </div>
            </div>
            <div id="right">
            </div>
        </div>
        <div style="clear:both">

        </div>

    </div>
    <div id="shenmin">仅供练手，无任何商业用途</div>
</body>

</html>