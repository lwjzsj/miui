<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href=/tp/Public/css/style.css />
    <style>
        #classinfo {
            height: 60px;
            width: 958px;
            margin: 0px auto;
        }
        
        #content {
            height: 700px;
            min-height: 700px;
            width: 960px;
            margin: 5px auto;
            border: 0px solid #ccc;
            border-radius: 4px;
        }
        
        #hatphones {
            height: 200px;
            min-height: 200px;
            width: 960px;
            float: left;
            margin-left: -1px;
        }
        
        #allphones {
            height: 200px;
            min-height: 200px;
            width: 960px;
            float: left;
            margin-left: -1px;
            margin-top: 30px;
        }
        
        .phonehaed {
            width: 950px;
            height: 30px;
            font-size: 16px;
            line-height: 30px;
            padding-left: 10px;
            border: 1px solid #ccc;
            border-radius: 5px 5px 0px 0px;
        }
        
        .phonelist {
            width: 960px;
            height: 180px;
            min-height: 180px;
            line-height: 30px;
            border: 1px solid #ccc;
            border-top: 0px;
            border-radius: 0px 0px 5px 5px;
        }
        
        .phoneinfo {
            width: 139px;
            height: 180px;
            float: left;
            margin-left: -1px;
            border: 1px solid #ccc;
            border-top: 0px;
            border-right: 0px;
        }
        
        .phoneimg {
            width: 139px;
            height: 135px;
        }
        
        .img {
            width: 71px;
            height: 121px;
            display: block;
            margin: 10px auto;
        }
        
        .phonetext {
            width: 80px;
            height: 20px;
            font-size: 13px;
            margin: 0px auto;
            line-height: 20px;
            text-align: center;
            border-radius: 5px;
        }
        
        .phonetext:hover {
            background-color: #FD6440;
        }
    </style>
    <script type="text/javascript" src="/tp/Public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

        })
    </script>
    <title>机型专区</title>
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
                        <?php else: ?> <a href=/tp/index.php/Home/User/index/name/<?php echo ($_SESSION[name]); ?>><?php echo ($_SESSION["name"]); ?></a>
                        <div id="out">

                        </div><?php endif; ?>
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
                    机型列表
                </div>
            </a>
            <!--板块导航2.。。。在这增加-->
        </div>
    </div>
    <div id="main">
        <!--本版块信息：板块名，导航，版主 -->
        <div id="classinfo"> </div>
        <div id="content">
            <div id="hatphones">
                <div class="phonehaed">
                    热门机型
                </div>
                <div class="phonelist">
                    <?php if(is_array($hatphone)): $i = 0; $__LIST__ = $hatphone;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/tp/index.php/Home/Phone/Index/name/<?php echo ($vo["name"]); ?>">
                            <div class="phoneinfo">
                                <div class="phoneimg">
                                    <img class="img" src="/tp/Public/img/phoneimg/<?php echo ($vo["img"]); ?>">
                                </div>
                                <div class="phonetext">
                                    <?php echo ($vo["name"]); ?>
                                </div>
                            </div>
                        </a><?php endforeach; endif; else: echo "" ;endif; ?>

                </div>

            </div>
            <div id="allphones">
                <div class="phonehaed">
                    所有机型
                </div>
                <div class="phonelist">
                    <?php if(is_array($allphone)): $i = 0; $__LIST__ = $allphone;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?><a href="/tp/index.php/Home/Phone/Index/name/<?php echo ($id["name"]); ?>">
                            <div class="phoneinfo">
                                <div class="phoneimg">
                                    <img class="img" src="/tp/Public/img/phoneimg/<?php echo ($id["img"]); ?>">
                                </div>
                                <div class="phonetext">
                                    <?php echo ($id["name"]); ?>
                                </div>
                            </div>
                        </a><?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
            </div>
            <div id="page"></div>

        </div>
        <div id="shenmin"></div>
</body>

</html>