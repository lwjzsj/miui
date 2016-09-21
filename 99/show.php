<?php
include "conn.php";
?>
<link href="./style.css" rel="stylesheet" type="text/css">
  <table width="554" border="0" cellspacing="0" cellpadding="0" style="margin:0px auto;">
    <tr height="50">
      <td colspan="2" background="images/tuijian.gif">&nbsp;</td>
    </tr>
    <tr height="160">

      <td width="50%">
      <!--推荐商品-->
        <?php
$str="SELECT * FROM goods WHERE tuijian=1 order by tm desc limit 0,1";
$row=mysql_fetch_assoc(query($str));
$arr=explode('@',@$row[img]);
?>
          <div class="sold">
            <img src="<?php echo @$arr[0].@$arr[1]; ?>" class="sold_img">
          </div>

          <div class="sold_show">
            <pre>市场价：<?php echo @$row[normal];?></pre>
            <pre>会员价：<?php echo @$row[vip];?></pre>
            <pre>数&nbsp;&nbsp;量：<?php echo @$row[num];?></pre>
            <a href="xianxi.php?id=<?php echo @$row[ID];?>"><img src="./images/xiangxi_btn.gif" /></a>
            <a href="goumai.php?id=<?php echo @$row[ID];?>"><img src="./images/goumai_btn.gif" /></a>
          </div>
      </td>

      <td width="50%">
        <?php
$str="SELECT * FROM goods WHERE tuijian=1 order by tm desc limit 1,1";
$row=mysql_fetch_assoc(query($str));
$arr=explode('@',@$row[img]);
?>
          <div class="sold">
            <img src="<?php echo @$arr[0].@$arr[1]; ?>" class="sold_img">
          </div>

          <div class="sold_show">
            <pre>市场价：<?php echo @$row[normal];?></pre>
            <pre>会员价：<?php echo @$row[vip];?></pre>
            <pre>数&nbsp;&nbsp;量：<?php echo @$row[num];?></pre>
            <a href="xianxi.php?id=<?php echo @$row[ID];?>"><img src="images/xiangxi_btn.gif" /></a>
            <a href="goumai.php?id=<?php echo @$row[ID];?>"><img src="images/goumai_btn.gif" /></a>
          </div>
      </td>

    </tr>

<!--热门商品-->
    <tr height="50">
      <td colspan="2" background="images/hot.gif">&nbsp;</td>
    </tr>
    <tr height="160">
      <td><?php
$str="SELECT * FROM goods order by sold desc limit 0,1";
$row=mysql_fetch_assoc(query($str));
$arr=explode('@',@$row[img]);
?>
          <div class="sold">
            <img src="<?php echo @$arr[0].@$arr[1]; ?>" class="sold_img">
          </div>

          <div class="sold_show">
            <pre>市场价：<?php echo @$row[normal];?></pre>
            <pre>会员价：<?php echo @$row[vip];?></pre>
            <pre>数&nbsp;&nbsp;量：<?php echo @$row[num];?></pre>
            <a href="xianxi.php?id=<?php echo @$row[ID];?>"><img src="images/xiangxi_btn.gif" /></a>
            <a href="goumai.php?id=<?php echo @$row[ID];?>"><img src="images/goumai_btn.gif" /></a>
          </div>
      </td>
      
      <td width="50%">
        <?php
$str="SELECT * FROM goods order by sold desc limit 1,1";
$row=mysql_fetch_assoc(query($str));
$arr=explode('@',@$row[img]);
?>
          <div class="sold">
            <img src="<?php echo @$arr[0].@$arr[1]; ?>" class="sold_img">
          </div>

          <div class="sold_show">
            <pre>市场价：<?php echo @$row[normal];?></pre>
            <pre>会员价：<?php echo @$row[vip];?></pre>
            <pre>数&nbsp;&nbsp;量：<?php echo @$row[num];?></pre>
            <a href="xianxi.php?id=<?php echo @$row[ID];?>"><img src="images/xiangxi_btn.gif" /></a>
            <a href="goumai.php?id=<?php echo @$row[ID];?>"><img src="images/goumai_btn.gif" /></a>
          </div>
      </td>
    </tr>
    <!--最新商品-->
    <tr height="50">
      <td colspan="2" background="images/new.gif">&nbsp;</td>
    </tr>
    <tr height="160">
      <td><?php
$str="SELECT * FROM goods order by tm desc limit 0,1";
$row=mysql_fetch_assoc(query($str));
$arr=explode('@',@$row[img]);
?>
          <div class="sold">
            <img src="<?php echo @$arr[0].@$arr[1]; ?>" class="sold_img">
          </div>

          <div class="sold_show">
            <pre>市场价：<?php echo @$row[normal];?></pre>
            <pre>会员价：<?php echo @$row[vip];?></pre>
            <pre>数&nbsp;&nbsp;量：<?php echo @$row[num];?></pre>
            <a href="xianxi.php?id=<?php echo @$row[ID];?>"><img src="images/xiangxi_btn.gif" /></a>
            <a href="goumai.php?id=<?php echo @$row[ID];?>"><img src="images/goumai_btn.gif" /></a>
          </div>
      </td>
      
      <td width="50%">
        <?php
$str="SELECT * FROM goods order by tm desc limit 1,1";
$row=mysql_fetch_assoc(query($str));
$arr=explode('@',@$row[img]);
?>
          <div class="sold">
            <img src="<?php echo @$arr[0].@$arr[1]; ?>" class="sold_img">
          </div>

          <div class="sold_show">
            <pre>市场价：<?php echo @$row[normal];?></pre>
            <pre>会员价：<?php echo @$row[vip];?></pre>
            <pre>数&nbsp;&nbsp;量：<?php echo @$row[num];?></pre>
            <a href="xianxi.php?id=<?php echo @$row[ID];?>"><img src="images/xiangxi_btn.gif" /></a>
            <a href="goumai.php?id=<?php echo @$row[ID];?>"><img src="images/goumai_btn.gif" /></a>
          </div>
      </td>
    </tr>
  </table>