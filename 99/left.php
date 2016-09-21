
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="type.css" rel="stylesheet" type="text/css" />
<title>left</title>

<script language="javascript">
    function run(form)
    {
        if(form.name.value=="")
        {
            alert("用户名不能为空");
            return false;
        }
        if(form.yzm.value=="")
        {
            alert("验证码不能为空");
            return false;
        }
        if(form.pwd.value=="")
        {
            alert("密码不能为空");
            return false;
        }
        if (form.yz.value!=form.yzm.value) {
            alert("验证码不正确");
            return false;
        }
        return true;
    }
</script>
</head>

<body>
<form action="login.php" method="POST" name="fm1" onsubmit="return run(this)">
    	<?php

            if(@$_SESSION["login"]!=true)
            {
            ?>

                <table  border="0" cellpadding="0" cellspacing="1" id="left_top">
                    <tr><td rowspan="5" width="8"></td><td colspan="2" height="35"></td></tr>
                        <tr height="24">
                        <td width="60" align="left" >用&nbsp;&nbsp;户：</td>

                        <td width="120"><input type="text" name="name" class="input"></td>
                    </tr>
                    <tr height="24">
                        <td align="left">密&nbsp;&nbsp;码：</td>

                        <td><input type="password" name="pwd" class="input"></td>
                    </tr>
                    <tr height="24">
                        <td align="left">验证码：</td>

                        <td><input type="text" name="yzm" style="width:60px;"><?php
                        $num=intval(mt_rand(1000,9999));
                        for($i=0;$i<4;$i++){
                            echo "<img src=images/code/".substr(strval($num),$i,1).".gif>";
                        }?>
                        <input type="hidden" name="yz" value="<?php echo $num;?>"></td>
                    </tr>
                    <tr  >
                        <td colspan="2" ><input type="submit" value="登陆" name="sub"  style="width:60px;">
                        <input type="submit" value="注册" name="sub" style="width:60px;"></td>
                    </tr>
                </table>
            <?php }
            else {
                ?>
                <table  border="0" cellpadding="0" cellspacing="1" id="left_top">
                    <tr><td rowspan="5" width="8"></td><td colspan="2" height="35"></td></tr>
                        <tr height="24">
                            <td width="18" align="left" >用&nbsp;&nbsp;户：</td>

                            <td width="160"><?php echo @$_SESSION["name"];?></td>
                        </tr>
                        <tr height="24">
                            <td align="left">注册时间：</td>

                            <td><?php echo @$_SESSION["tm"];?></td>
                        </tr>

                        <tr >
                            <td colspan="2" >
                                <input type="submit" name="sub" value="注销" style="width:60px;">
                            </td>
                        </tr>

                </table>

                <?php

            }
            ?>
</form>
</body>
</html>
