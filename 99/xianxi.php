<?php

    include "conn.php";
    $str="SELECT * FROM goods WHERE ID=".@$_GET["id"];
    $row=mysql_fetch_assoc(query($str));
    $arr=explode("@",@$row[img]);
    //print_r($arr);
?>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<script type="text/javascript" src="./jquery-2.2.3.js">

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#1").mouseover(function(){
            $("#showimg").attr("src","<?php echo $arr[0].$arr[2];?>");
        })
        $("#2").mouseover(function(){
            $("#showimg").attr("src","<?php echo $arr[0].$arr[3];?>");
        })
        $("#3").mouseover(function(){
            $("#showimg").attr("src","<?php echo $arr[0].$arr[4];?>");
        })

    })
    function yz(form)
    {
        if(form.content.value=="")
        {
            alert("评价内容不能为空");
            return false;
        }
        return true;
    }

</script>
<mate http-equiv="content-type" content="text/html;charset=utf-8">
<link href="type.css" rel="stylesheet" type="text/css"/>
<title>首页</title>
<table width="766" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td colspan="2" align="center" bgcolor="#F5F5F5"><?php include "top.php";?></td>
  </tr>
  <tr>
    <td id="left" valign="top" bgcolor="#F5F5F5" ><?php include "left.php";?></td>
    <td id="main" >
        <div class="show_img">
            <img width="200" id="showimg" height="200" src="<?php echo $arr[0].$arr[1];?>">
            <div class="show_mini" id="1"><img width="35" height="35" src="<?php echo $arr[0].$arr[2];?>"></div>
            <div class="show_mini" id="2"><img width="35" height="35" src="<?php echo $arr[0].$arr[3];?>"></div>
            <div class="show_mini" id="3"><img width="35" height="35" src="<?php echo $arr[0].$arr[4];?>"></div>
        </div>
        <div class="show_xianxi">
            <h3><?php echo @$row[name];?></h3>
            <pre>市场价: <?php echo @$row[normal];?>￥</pre>
            <pre>会员价: <?php echo @$row[vip];?>￥</pre>
            <pre>成交量: <?php echo @$row[sold];?></pre>
            <pre>库  存: <?php echo @$row[num];?></pre>
            <pre>上架时间: <?php echo @$row[tm];?></pre>
        </div>
        <div class="class">
        <?php 
        $id=@$_GET['id'];
            $str1="SELECT count(*) as num FROM pinjia where CID=".$id;
            $row1=mysql_fetch_assoc(query($str1));
            $num=@$row1[num];
            //echo $num;
            if($num%5!=0)
                $pag=intval($num/5)+1;
                else {
                    $pag=$num/5;
                }
            $pagnum=1;
            if(@$_GET['num']=="")
            {
                $str2="SELECT * FROM pinjia WHERE CID='$id' order by tm desc limit 1, 5";
            }
            
            else {
                $pagnum=@$_GET['num']-1;
                $start=$pagnum*5;
                $str2="SELECT * FROM pinjia WHERE CID=$id order by tm desc limit $start , 5";
            }
            $result=query($str2);
            while($row2=mysql_fetch_assoc($result)){
                ?>
                    <div class="huifu">
                        用户<?php echo $row2["name"]?>&nbsp;&nbsp;于<?php echo $row2["tm"]?>评价：
                        </div><div class="huifu1">
                        <text class="p"><?php echo $row2["content"]?></text>
                    </div>
                <?php
            }
            

            if($pag>1)
            {
                ?>
                <?php for($i=$pag;$i>0;$i--)
                    {?>
                <a href="xianxi.php?id=<?php echo $id;?>&num=<?php echo $i;?>"><div class="btn">
                    <?php echo $i;?>
                </div></a>
                <?php }?>
                
                <?php
            }
            
        ?>
        </div>
        <table width="100%" border="1" >
            <tr>
                <td bgcolor="#696969" height="25" width="100%">快速评论：</td>
            </tr>
            <tr>
                <td height="100">
                    <form method="post" action="pinjia.php" onsubmit="return yz(this)">
                        <textarea name="content" style="width:550px;height:100px;"></textarea>
                        <input type="hidden" name="id" value="<?php echo $id?>">
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    if(@$_SESSION["login"]!=false)
                    {
                    ?>
                    <input type="submit" value="发表">
                    </form></td>
                    <?php }
                    else
                    {
                    ?>
                        <input type="submit" value="发表" disabled="disabled">
                        </form></td>
                <?php }?>
            </tr>
            </table>
        
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><?php include "bottom.php";?></td>
  </tr>
</table>
