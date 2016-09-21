<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        #uhd {
            width: 200px;
            height: 300px;
            float: left;
            margin-top: 20px;
            margin-left: 30px;
            overflow: hidden;
        }
        
        #headimg {
            height: 200px;
            width: auto;
            margin: 10px auto;
        }
        
        #btn {
            height: 20px;
            width: 80px;
            position: relative;
            z-index: 2;
        }
        
        #edithead {
            height: 20px;
            width: 80px;
            position: relative;
            top: -10px;
            z-index: 3;
            opacity: 0;
        }
        
        #uinfo {
            width: 200px;
            height: 300px;
            float: left;
            margin-top: 20px;
            margin-left: 30px;
        }
        
        .pwd {
            display: block;
            height: 20px;
            width: 300px;
            line-height: 20px;
            margin: 10px auto;
        }
        
        #fr {
            height: 30px;
            width: 80px;
            line-height: 30px;
            text-align: center;
            background-color: #fff;
            border: 1px solid #ccc;
            margin: 10px auto;
        }
    </style>
    <script type="text/javascript" src="/tp/Public/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#edithead").change(function() {
                if ($("#edithead").val() != "") {
                    var path = temp(this.files[0]);

                    if (path != "") {
                        $("#headimg").attr("src", path);
                    }
                }
            })
            $("#fr").click(function() {
                var str = $("#fr").text();
                var name = $("#name").text();
                if (str == "关注") {
                    $("#fr").load("/tp/index.php/Home/User/flow/name/" + name);
                }
            })
        })

        function temp(file) {
            var url = null;
            if (window.createObjectURL != undefined) {
                url = window.createObjectURL(file);
            } else if (window.URL != undefined) {
                url = window.URL.createObjectURL(file);
            } else if (window.webkit != undefined) {
                url = window.webkit.createObjectURL(file);
            }
            return url;
        }

        function chick(form) {

            if ($(".pwd").val() != "" || $("#edithead").val() != "") {
                if ($("#oldpwd").val() == "") {
                    $("#error").html("旧密码不能为空");
                    return false;
                } else if ($("#newpwd").val() == "" || $("#newpwd").val() != $("#repwd").val()) {
                    $("#error").html("新密码不一致");
                    return false;
                }

            } else {
                $("#error").html("你没有做任何修改");
                return false;
            }


        }
    </script>
</head>

<body>

    <?php if($_SESSION[name] == $info[name]): ?><form action="/tp/index.php/Home/User/edit/name/<?php echo ($info[name]); ?>" enctype="multipart/form-data" method="POST" onsubmit="return chick(this)">
            <div id="uhd">
                <?php if($info[img] == ''): ?><img id="headimg" src="/tp/Public/img/head/default.jpg">
                    <?php else: ?>
                    <img id="headimg" src="/tp/Public/img/head/<?php echo ($info[img]); ?>"><?php endif; ?>
                <div id="btn">
                    上传头像
                </div>

                <input type="file" name="files" id="edithead" accept="image/*">
            </div>
            <div id="uinfo">
                <div style="height:20px;width:300px;line-height: 20px;margin:15px auto;">
                    姓名：<?php echo ($info["name"]); ?>
                </div>
                <div style="height:20px;width:300px;line-height: 20px;margin:15px auto;">
                    注册时间：<?php echo ($info["time"]); ?>
                </div>
                <div style="height:20px;width:300px;line-height: 20px;margin:15px auto;">
                    已发表主题数：<?php echo ($info["num"]); ?>
                </div>
                <div style="height:20px;width:300px;line-height: 20px;margin:15px auto;">
                    所属用户组：
                    <?php if($info[qx] == 0): ?>普通用户组
                        <?php else: ?>管理员<?php endif; ?>
                </div>
                <input type="password" class="pwd" id="oldpwd" placeholder="原密码" name="oldpwd">
                <input type="password" class="pwd" id="newpwd" placeholder="新密码" name="newpwd">
                <input type="password" class="pwd" id="repwd" placeholder="再次输入新密码" name="repwd">
                <input type="submit" value="确认修改">
                <div id="error" style="width:200px;height:20px; float:right"></div>
            </div>
        </form>
        <?php else: ?>
        <div id="uhd">
            <?php if($info[img] == ''): ?><img id="headimg" src="/tp/Public/img/head/default.jpg">
                <?php else: ?>
                <img id="headimg" src="/tp/Public/img/head/<?php echo ($info[img]); ?>"><?php endif; ?>

        </div>
        <div id="uinfo">
            <div style="height:20px;width:300px;line-height: 20px;margin:20px auto;">
                姓名：<?php echo ($info["name"]); ?>
            </div>
            <div style="height:20px;width:300px;line-height: 20px;margin:20px auto;">
                注册时间：<?php echo ($info["time"]); ?>
            </div>
            <div style="height:20px;width:300px;line-height: 20px;margin:20px auto;">
                已发表主题数：<?php echo ($info["num"]); ?>
            </div>
            <div style="height:20px;width:300px;line-height: 20px;margin:20px auto;">
                所属用户组：
                <?php if($info[num] == 0): ?>普通用户组
                    <?php else: ?>管理员<?php endif; ?>
            </div>
        </div>
        <div style="clear:both;"></div>
        <div id="fr"><?php echo ($fr); ?></div><?php endif; ?>

</body>