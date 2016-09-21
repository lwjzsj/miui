<html >
<head>
    <?php
    session_start();
    $u_name=@$_SESSION["name"];
    if(@$_SESSION["login"]!=true)
    {
        echo"
        <script type='text/javascript'>
            alert('请登录后再进行后续操作');
            window.location.href='index.php';
        </script>
        ";
        exit;
    }
    include "conn.php";
    $id=@$_GET["id"];
    $tm=date("Y-m-d H-i-s");
    $str="SELECT * FROM goods WHERE ID='$id'";
    $result=query($str);
    $row=mysql_fetch_assoc($result);
    if(@$row["num"]<1)
    {
        echo"
        <script type='text/javascript'>
            alert('商品已售完');
            window.location.href='index.php';
        </script>
        ";
    }
    else
    {
        $str_shop="SELECT * FROM shop WHERE userName='$u_name'";
        $shop=query($str_shop);
        $bl=true;
        while($rows=mysql_fetch_assoc($shop))
        {
            if(@$rows["shopId"]==$id)
            {
                echo"
        <script type='text/javascript'>
            alert('该商品已在购物车中');
        </script>
        ";
                $i=$rows["num"];
                $i++;
                $str_shop="update shop set num='$i' WHERE shopId='$id'";
                query($str_shop);
                $bl=false;
                //echo $i;
                break;
            }
        }
        if($bl)
        {
            $str_shop="INSERT INTO shop(userName,shopId,time,num)values('$u_name','$id','$tm',1)";
            $shop=query($str_shop);
        }
        //消费者购物车查询
        $str_shop="SELECT * FROM shop WHERE userName='$u_name'";
        $shop=query($str_shop);

    }?>
    <script type="text/javascript" src="jquery-2.2.3.js"></script>
    <script type="text/javascript">

    </script>
</head>
<body>
    <table border="1" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <td colspan="4" height="120">用户信息</td>
        </tr>
        <tr align="center">
            <td width="440" height="20" bgcolor="#f0f8ff">商品</td>
            <td width="180" height="20" bgcolor="#f0f8ff">下单时间</td>
            <td width="100" height="20" bgcolor="#f0f8ff">数量</td>
            <td width="60" height="20" bgcolor="#f0f8ff">金额</td>
        </tr>
        <?php
        while($r=mysql_fetch_assoc($shop)) {
            ?>
            <tr>
                <td height="20"><?php $rowss=mysql_fetch_assoc(query("select * from goods where ID='$r[shopId]'"));echo $rowss["name"];?></td>
                <td height="20"><?php echo $r["time"];?></td>
                <td height="20" align="center">
                    <input   type="text" style="border:1px; width:30px; height:18px;background-color:#f0f8ff" value="<?php echo $r['num'];?>">
                <td height="20" class="zj"><?php echo @$rowss["normal"]*$r['num'];?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>

