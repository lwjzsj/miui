<?php
session_start();
@$_SESSION[login] = false;
@$_SESSION[name] = "";
include "conn.php";
$name = @$_POST["name"];
$pwd = @$_POST["pwd"];
$tm = date("Y-m-d H:i:s");
//登陆
if (@$_POST["sub"] == "登陆") {
    $str = "SELECT * FROM user WHERE name='$name'";
    $result = query($str);
    $row = mysql_fetch_assoc($result);
    //var_dump($row);
    if ($row["pwd"] == $pwd) {
        echo "<script language='javascript'>alert('登陆成功！');</script>";
        @$_SESSION[login] = true;
        @$_SESSION[name] = "$name";
        @$_SESSION[tm] = @$row["tm"];
    } else {
        echo "<script language='javascript'>
 alert('用户名或密码不正确！');
        </script>
";
    }
    echo "<script language='javascript'>
 window.location.href='index.php';
</script>
";
}
//注册
else if (@$_POST["sub"] == "注册") {
    $str = "INSERT INTO user(name,pwd,tm)VALUES('$name','$pwd','$tm')";
    $result = query($str);
    if ($result != false) {
        echo "<script language='javascript'>
 alert(";
        echo '请牢记你的密码' . $pwd;
        echo ")
</script>
";
        @$_SESSION[login] = true;
        @$_SESSION[name] = "$name";
        @$_SESSION[tm] = $tm;
    } else {
        echo "<script language='javascript'>
 alert('注册失败，请输入其他用户名');
</script>
";
    }
    echo "<script language='javascript'>
 window.location.href='index.php';
</script>
";
}
//注销
else if (@$_POST["sub"] == "注销") {
    session_destroy();
    echo "<script language='javascript'>
 window.location.href='index.php';
</script>
";
}
