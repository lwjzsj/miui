<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href=/tp/Public/css/style.css />
    <style>
        #content {
            height: 1440px;
            width: 960px;
            margin: 5px auto;
            border-radius: 4px;
            border: 0px solid #ccc;
        }
        
        #content1 {
            height: 1440px;
            width: 690px;
            margin: 0px auto;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            float: left;
        }
        
        #clist {
            height: 1400px;
            width: 660px;
            background-color: #F9F9F9;
            float: left;
            border-radius: 4px;
            margin-left: 14px;
            margin-top: 19px;
            border: 1px dashed #f3f3f3;
        }
        
        .list {
            height: 70px;
            width: 620px;
            margin: 0px auto;
            border-bottom: 1px dashed #ccc;
        }
        
        .headimg {
            height: 50px;
            width: 50px;
            float: left;
            margin-left: 10px;
            margin-top: 10px;
        }
        
        .cont {
            height: 50px;
            width: 550px;
            float: left;
            margin-top: 10px;
            margin-left: 10px;
        }
        
        .title {
            font-size: 16px;
            height: 30px;
            width: 520px;
            line-height: 30px;
        }
        
        .listinfo {
            font-size: 12px;
            height: 20px;
            width: 520px;
            line-height: 20px;
        }
        
        .himg {
            height: 50px;
            width: 50px;
            border-radius: 8px;
        }
        
        #hat {
            height: 1440px;
            width: 240px;
            float: left;
            margin-left: 20px;
        }
        
        #newtheme {
            height: 70px;
            width: 230px;
            border-radius: 5px;
            margin: 0px auto;
            text-align: center;
            line-height: 70px;
            font-size: 30px;
            background-color: #FB5F3A;
        }
        
        #phonehat {
            height: 300px;
            width: 230px;
            border-radius: 5px;
            margin: 20px auto;
            font-size: 14px;
            background-color: #FcFcFc;
            border: 1px solid #ccc;
        }
        
        #hathead {
            height: 30px;
            width: 230px;
            text-align: center;
            border-radius: 5px;
            border-bottom: 1px solid #ddd;
            text-align: center;
            line-height: 30px;
        }
        
        .hat1 {
            height: 30px;
            width: 115px;
            text-align: center;
            border: 1px solid #ddd;
            border-top: 0px;
            border-right: 0px;
            text-align: center;
            line-height: 30px;
            float: left;
            margin-left: -1px;
        }
        
        .hat1:hover {
            background-color: #f9f9f9;
        }
        
        #previous {
            height: 25px;
            width: 60px;
            float: left;
            border: 1px solid #ccc;
            margin-left: 50px;
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
            var name = $("#phoneclass").text();

            var p = 0;
            var max = $("#n").val();
            $("#content1").load("/tp/index.php/Home/Phone/content/name/" + name + "/p/" + p);
            //排序
            $("#all").click(function() {
                $("#content1").load("/tp/index.php/Home/Phone/recoder/recder/1/name/" + name);

            })

            $("#time").click(function() {
                $("#content1").load("/tp/index.php/Home/Phone/recoder/recder/2/name/" + name);
            })


            $("#num").click(function() {
                    $("#content1").load("/tp/index.php/Home/Phone/recoder/recder/3/name/" + name);
                })
                //翻页
            $("#previous").click(function() {
                if (p >= 10) {

                    $(".p").css("color", "#000");
                    p = p - 10;
                    var i = p / 10 + 1;
                    var str = "#" + i;
                    $("#content1").load("/tp/index.php/Home/Phone/content/name/" + name + "/p/" + p);
                    $(str).css("color", "red");
                }
            })

            $("#next").click(function() {
                if (p < max - 10) {
                    $(".p").css("color", "#000");
                    p = p + 10;
                    var i = p / 10 + 1;
                    var str = "#" + i;
                    $("#content1").load("/tp/index.php/Home/Phone/content/name/" + name + "/p/" + p);
                    $(str).css("color", "red");
                }
            })
            $(".p").click(function() {
                $(".p").css("color", "#000");
                p = ($(this).attr("id") - 1) * 10;
                $("#content1").load("/tp/index.php/Home/Phone/content/name/" + name + "/p/" + p);
                $(this).css("color", "red");
            })
        })
    </script>
    <title><?php echo ($name); ?>社区</title>
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
            <div id="gide"><a href=/tp/index.php/Home/Index/index>机型专区</a>&nbsp;>><?php echo ($name); ?></div>
            <!--机型名称-->
            <div id="phoneclass"><?php echo ($name); ?></div>
            <div id="phoneinfo">主题:
                <m id="n"><?php echo ($num); ?></m>
            </div>
            <!--版主大大-->
            <div id="banzhu">版主大大：<?php echo ($banzhu); ?></div>
            <div id="reply">
                <div id="label">筛选：</div>
                <div id="all">全部主题</div>
                <div id="time">发帖时间</div>
                <div id="num">回复数量</div>
            </div>
        </div>
        <div id="content">
            <div id="content1">


            </div>
            <!--热门机型-->
            <div id="hat">
                <a href=/tp/index.php/Home/Phone/newtheme/name/<?php echo ($name); ?>>
                    <div id="newtheme">
                        发表新帖
                    </div>
                </a>
                <div id="phonehat">
                    <div id="hathead">
                        热门机型
                    </div>
                    <?php if(is_array($hot)): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$id): $mod = ($i % 2 );++$i;?><a href="/tp/index.php/Home/Phone/Index/name/<?php echo ($id["name"]); ?>">
                            <div class="hat1">
                                <?php echo ($id["name"]); ?>
                            </div>
                        </a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>

        <div id="page">
            <div id="previous">
                前一页
            </div>
            <?php $__FOR_START_12423__=1;$__FOR_END_12423__=ceil($num/10)+1;for($i=$__FOR_START_12423__;$i < $__FOR_END_12423__;$i+=1){ ?><div class="p" id="<?php echo ($i); ?>"><?php echo ($i); ?></div><?php } ?>
            <div id="next">
                下一页
            </div>
        </div>

    </div>
    <div id="shenmin">仅供练手，无任何商业用途</div>
</body>

</html>