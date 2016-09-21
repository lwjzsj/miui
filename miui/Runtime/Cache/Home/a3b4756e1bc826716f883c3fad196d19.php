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
        
        #imgbox {
            width: 960px;
            height: 700px;
            margin: 0px auto;
            text-align: center;
        }
        
        #box {
            width: 400px;
            height: 600px;
            background-color: #fff;
            float: left;
            margin: 40px 278px;
            border: 1px solid #ccc;
        }
        
        #btn_regin {
            width: 200px;
            height: 60px;
            background-color: #fff;
            float: left;
            border-bottom: 1px solid #ccc;
            font-size: 20px;
            line-height: 60px;
        }
        
        #btn_regin:hover {
            background: linear-gradient(#fff, #F0F0F0);
        }
        
        #btn_login {
            width: 200px;
            height: 60px;
            background-color: #f0f0f0;
            float: left;
            border-bottom: 1px solid #ccc;
            font-size: 20px;
            line-height: 60px;
        }
        
        #btn_login:hover {
            background: linear-gradient(#fff, #F0F0F0);
        }
        
        #regin {
            position: relative;
            top: 0px;
            width: 400px;
            height: 400px;
        }
        
        #login {
            position: relative;
            top: 0px;
            width: 400px;
            height: 400px;
        }
        
        #error {
            width: 400px;
            height: 39px;
            color: red;
            font-size: 25px;
        }
        
        .textbox {
            margin: 25px auto;
            width: 302px;
        }
        
        .text {
            height: 40px;
            width: 300px;
        }
        
        .chick {
            height: 40px;
            width: 200px;
        }
        
        .sub {
            font-size: 30px;
            height: 40px;
            width: 300px;
            border: 1px solid #ccc;
            background-color: #f0f0f0;
        }
        
        .yzm {
            height: 40px;
            width: 98px;
            float: right;
            line-height: 40px;
            text-align: left;
            font-size: 35px;
        }
        
        #header {
            height: 62px;
        }
    </style>
    <script type="text/javascript" src="/tp/Public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        var yzm;
        $(document).ready(function() {
            //验证码
            var r = Math.floor(Math.random() * 9000 + 1000);
            $(".yzm").html(r);

            $("#regin").hide();
            $("#btn_regin").click(function() {
                $("#btn_regin").css("background-color", "#F0F0F0");
                $("#btn_login").css("background-color", "#fff");
                $("#regin").show();
                $("#login").hide();
                //验证码
                var r = Math.floor(Math.random() * 9000 + 1000);
                yzm = r;
                $(".yzm").html(r);
            })
            $("#btn_login").click(function() {
                $("#btn_regin").css("background-color", "#fff");
                $("#btn_login").css("background-color", "#F0F0F0");
                $("#login").show();
                $("#regin").hide();
                //验证码
                var r = Math.floor(Math.random() * 9000 + 1000);
                yzm = r;
                $(".yzm").html(r);
            })
            $(".yzm").click(function() {
                //验证码
                var r = Math.floor(Math.random() * 9000 + 1000);
                yzm = r;
                $(".yzm").html(r);
            })

            yzm = r;
        })

        function rchick() {
            if ($("#rename").val() == "") {
                $("#error").html("用户名不能为空");
                return false;
            }
            if ($("#repwd").val() == "") {
                $("#error").html("密码不能为空");
                return false;
            }
            if ($("#repwd").val() != $("#chpwd").val()) {
                $("#error").html("两次密码输入不一致");
                return false;
            }
            if ($("#rechick").val() != yzm) {
                $("#error").html("验证码输入错误");
                return false;
            }
        }

        function lchick() {
            if ($("#loname").val() == "") {
                $("#error").html("用户名不能为空");
                return false;
            }
            if ($("#lopwd").val() == "") {
                $("#error").html("密码不能为空");
                return false;
            }

            if ($("#lochick").val() != yzm) {
                $("#error").html("验证码输入错误");
                return false;
            }
        }
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
            <?php echo ($str); ?>
        </div>
        <div id="content">
            <div id="imgbox">
                <!--登录框-->
                <div id="box">
                    <!--登陆注册按钮-->
                    <div id="header">
                        <div id="btn_regin">
                            注册
                        </div>
                        <div id="btn_login">
                            登陆
                        </div>
                    </div>
                    <!--注册，默认隐藏-->
                    <div>
                        <div id="regin">
                            <form action="/tp/index.php/Home/User/userregin" method="POST" onsubmit="return rchick()">
                                <div class="textbox"><input type="text" id="rename" name="name" class="text" placeholder="用户名"></div>
                                <div class="textbox"><input type="password" id="repwd" name="pwd" class="text" placeholder="密码"> </div>
                                <div class="textbox"><input type="password" id="chpwd" name="pwdchick" class="text" placeholder="再次输入密码"> </div>
                                <div class="textbox"><input type="text" id="rechick" name="chick" class="chick" placeholder="验证码">
                                    <div class="yzm"></div>
                                </div>
                                <div class="textbox"><input type="submit" class="sub" value="注册"></div>

                            </form>

                        </div>
                        <!--登陆，默认显示-->
                        <div id="login">
                            <form action=/tp/index.php/Home/User/userlogin method="POST" onsubmit="return lchick()">
                                <div class="textbox"><input type="text" id="loname" name="name" class="text" placeholder="用户名"></div>
                                <div class="textbox"><input type="password" id="lopwd" name="pwd" class="text" placeholder="密码"> </div>
                                <div class="textbox"><input type="text" id="lochick" name="chick" class="chick" placeholder="验证码">
                                    <div class="yzm"></div>
                                </div>
                                <div class="textbox"><input type="submit" class="sub" value="登陆"></div>

                            </form>
                        </div>
                        <div id="error">
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div id="shenmin">仅供练手，无任何商业用途</div>
</body>

</html>