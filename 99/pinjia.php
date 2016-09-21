<?php
session_start();
include "conn.php";
$cid=@$_POST["id"];
$name=@$_SESSION["name"];
$tm=date("Y-m-d H:i:s");
$content=@$_POST["content"];
$str="INSERT INTO pinjia(CID,name,tm,content)VALUES ('$cid','$name','$tm','$content')";
$result=query($str);
header("location:xianxi.php?id=$cid");

?>