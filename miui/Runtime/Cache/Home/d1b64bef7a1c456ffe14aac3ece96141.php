<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href=/tp/Public/css/style.css />
    <title>搜索</title>
    <style>
        #themelist {
            clear: both;
            width: 600px;
            min-height: 400px;
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
        
        #boxsearch {
            height: 100px;
            width: 305px;
            margin: 30px auto;
        }
        
        #search {
            height: 30px;
            width: 250px;
        }
        
        #searchbtn {
            height: 34px;
            width: 50px;
        }
        
        #searchth {
            border: 1px solid $ccc;
            height: 40px;
            width: 50px;
            line-height: 40px;
            text-align: center;
            background-color: #FD6440;
            float: left;
        }
        
        #searchpeople {
            border: 1px solid $ccc;
            height: 40px;
            width: 50px;
            line-height: 40px;
            text-align: center;
            float: left;
        }
    </style>
    <script type="text/javascript" src="/tp/Public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#searchth").click(function() {
                $("#searchth").css("background-color", "#FD6440");
                $("#searchpeople").css("background-color", "#fff");
                $("#forms").attr("action", "/tp/index.php/Home/Index/search");
            })
            $("#searchpeople").click(function() {
                $("#searchpeople").css("background-color", "#FD6440");
                $("#searchth").css("background-color", "#fff");
                $("#forms").attr("action", "/tp/index.php/Home/Index/searchpeople");
            })
        })
    </script>
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
        <div id="boxsearch">
            <div>
                <div id="searchth">搜帖</div>
                <div id="searchpeople">找人</div>
            </div>
            <form id="forms" action="/tp/index.php/Home/Index/search" method="POST">
                <input type="text" name="search" id="search"><input type="submit" value="搜索" id="searchbtn">
            </form>
        </div>
        <div style="clear:both;"></div>
        <div id="themelist">
            <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="height:190px;width:140px;float:left;margin-top:10px;margin-left:10px;border:1px solid #ccc;">
                    <a href="/tp/index.php/Home/User/Index/name/<?php echo ($vo["name"]); ?>">
                        <?php if($vo["head"] != ''): ?><img style="display:block;height:140px;width:auto;margin:10px auto;" src="/tp/Public/img/head/<?php echo ($vo["head"]); ?>" />
                            <?php else: ?>
                            <img style="display:block;height:140px;width:auto;margin:10px auto;" src="/tp/Public/img/head/default.jpg" /><?php endif; ?>
                        <div style="height:30px;width:140px;text-align: center;line-height: 30px;"><?php echo ($vo["name"]); ?></div>
                    </a>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>

    </div>
</body>

</html>