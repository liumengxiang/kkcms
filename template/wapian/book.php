<!DOCTYPE HTML>
<html>
<head>
<?php  include 'head.php';?>
<title>留言求片,留言板-<?php echo $xtcms_seoname;?></title>
<meta name="keywords" content="留言板,留言求片">
<meta name="description" content="留言求片:把你想看的大片留言给我们。我们会争取第一时间更新上！">
<!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->
<style type="text/css">
.gbook-form li{ margin-top: 15px;}
.gbook-form li:first-child{ margin-top: 0;}
.text-muted {color: #999999;}
.font-12 {font-size: 12px;}
</style>
</head>
<body class="vod-type apptop">
<?php include 'header.php'; ?>
<div class="container">
<div class="row">
<div style="margin-top:20px;"></div>
<?php echo get_ad(9)?>
<div class="col-md-4 col-sm-12 hy-main-content">
<div class="hy-layout clearfix" style="margin-top:0px">
<div class="hy-switch-tabs">
<ul class="nav nav-tabs">
<li class="active"><a href="#">求片留言</a></li>
</ul>
</div>			
<form method="post" class="messages">
<div class="tab-content">
<div class="hy-play-list tab-pane fade in active" id="list3">
<div class="item">
<div class="plot">
<ul class="gbook-form">
<li><input class="form-control" type="text" placeholder="昵称" id="input1" onblur="jieshou()" name="userid"></li>
<li><textarea cols="40" rows="5" class="form-control" placeholder="例如：我想看《太阳的后裔》" id="input4" onblur="content()" name="content"></textarea></li>
<li><input id="verifycode" class="form-control" name="verifycode" type="text" size="10" placeholder="验证码" style="width: 80px; display: inline-block; margin-right: 10px;" class="text" tabindex="3" />
<img style="height: 28px; cursor:pointer;" src="../system/verifycode.php" onclick="javascript:this.src='../system/verifycode.php?'+Math.random()" style="cursor:pointer;" title="看不清？点击更换" align="absmiddle" /></li>
<li><input type="submit" value="提交" name="submit" class="btn btn-primary pull-right" /><input type="reset" value="重填" class="btn btn-default" /></li>
</ul>
</div>
</div>
</div>
</div>
</form>
</div>
</div>

<div class="col-md-8 col-sm-12 hy-main-side">
<?php
$sql = 'select * from xtcms_book order by id desc';
$pager = page_handle('page',10,mysql_num_rows(mysql_query($sql)));
$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
while($row= mysql_fetch_array($result)){?>
<?php
$zhStr = $row['Reply'];
?>
<div class="hy-layout clearfix" style="margin-top:0px">
<div class="hy-switch-tabs"><span class="text-muted pull-right">第<?php echo $row['id'] ?>楼</span>
<ul class="nav nav-tabs"><li><strong><?php echo $row['userid'] ?></strong></li></ul>
</div>
<div class="tab-content">
<div class="hy-play-list tab-pane fade in active" id="list3">
<div class="item">
<div class="plot">
<li><?php echo $row['content'] ?><br/>
<font color=red><?php if(0 < strlen($zhStr)){echo '管理员回复：';echo $row['Reply'];}?></font>
</li><span class="font-10 text-muted">发表于: <?php echo $row['time'] ?></span>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
<ul class="stui-page text-center">
<?php echo page_show($pager[2],$pager[3],$pager[4],2);?></a></ul>
</div>	     
</div>
</div>
</div>
<?php include 'footer.php'; ?>