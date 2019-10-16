<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php  include 'head.php';?>
<title><?php if ($_GET['type']=='movie'){echo "看电影-2018最新好看的最新电影";}elseif ($_GET['type']=='tv'){echo "追热剧-最新电视剧-好看电视剧-最新电视剧排行";}elseif ($_GET['type']=='dm'){echo "动漫列表";}elseif ($_GET['type']=='zy'){echo "综艺列表";}?>-<?php echo $xtcms_seoname;?></title>
<meta name="keywords" content="<?php if ($_GET['type']=='movie'){echo "看电影-2018最新好看的最新电影";}elseif ($_GET['type']=='tv'){echo "追热剧-最新电视剧-好看电视剧-最新电视剧排行";}elseif ($_GET['type']=='dm'){echo "动漫列表";}elseif ($_GET['type']=='zy'){echo "综艺列表";}?>,<?php echo $xtcms_keywords;?>">
<meta name="description" content="<?php echo $xtcms_description;?>">
<style type="text/css">
dd.active{
           color:deepskyblue;
}
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">

<div class="row"  style="margin-top:10px"><?php echo get_ad(9)?></div>
<div class="row">
<div class="hy-layout clearfix">
  <div class="hy-min-screen clearfix">
    <div class="item clearfix">
      <dl class="clearfix">
        <dt class="text-muted">按类型</dt>
        <dd class="clearfix">
<?php echo $response0;?></dd>
      </dl>
      <dl class="cleafix">
        <dt class="text-muted"><?php if ($_GET['type']=='zy'){echo "按明星";}else{echo "按年份";}?></dt>
        <dd class="clearfix">
<?php if($_GET['type']=='zy'){echo $response2;}else{echo $response;}?></dd>
      </dl>
      <dl class="cleafix hidden-sm">
        <dt class="text-muted">按地区</dt>
        <dd class="clearfix">
<?php echo $response1?></dd>
      </dl>
    </div>
  </div>
</div>


<div class="container">
<div class="row"  style="margin-top:0px"><?php echo get_ad(9)?></div></div>
		<div class="hy-layout clearfix" style="margin-top: 10px;">
			<div class="hy-switch-tabs active clearfix">
				<span class="text-muted pull-right hidden-xs">如果您喜欢本站请动动小手分享给您的朋友！</span>
				<ul class="nav nav-tabs">
					<li <?php if ($ye=="rankhot"){echo 'class="active"';}elseif($ye=="createtime" or $ye=="rankpoint"){}else{ echo 'class="active"';};?>>
					<a href="./list.php?type=<?php echo $type?>&cat=<?php echo $cat?>&area=<?php echo $area?>&act=<?php echo $act?>&year=<?php echo $year?>&rank=rankhot">按最热</a></li>
					<li <?php if ($ye=="createtime"){echo 'class="active"';}else{};?>>
					<a href="./list.php?type=<?php echo $type?>&cat=<?php echo $cat?>&area=<?php echo $area?>&act=<?php echo $act?>&year=<?php echo $year?>&rank=createtime">按最新</a></li>
					<li <?php if ($ye=="rankpoint"){echo 'class="active"';}else{};?>>
					<a href="./list.php?type=<?php echo $type?>&cat=<?php echo $cat?>&area=<?php echo $area?>&act=<?php echo $act?>&year=<?php echo $year?>&rank=rankpoint">按好评</a></li>

				</ul>
			</div>
			<div class="hy-video-list">
				<div class="item">
					<ul class="clearfix">
 <?php
foreach ($xname as $key=>$xvau){ $do=$xlist[$key]; 
$do1=$do; 
$cc="./play.php?play="; 
if ($xtcms_wei==1){
$ccb=vod.$do1;
}
else{
$ccb=$cc.$do1;	
}

			echo '<div class="col-md-2 col-sm-3 col-xs-4">
							<a class="videopic lazy" href="'.$ccb.'" title="'.$xvau.'" data-original="'.$ximg[$key].'" style="background: url(./style/load.gif) no-repeat; background-position:50% 50%; background-size: cover;">
							<span class="play hidden-xs"></span></a>
							<div class="title">
								<h5 class="text-overflow"><a href="'.$ccb.'">'.$xvau.'</a></h5>
							</div>
							<div class="subtitle text-muted text-muted text-overflow hidden-xs">'.$xstar[$key].'</div>
						</div>';
						
 } ?>

						</ul>
				</div>
			</div>
			<div class="hy-page clearfix">
				<ul class="cleafix">
<?php echo $yeshu;?>
</ul>
			</div>		</div>
	</div>
</div>
	  <div class="container">
<div class="row"  style="margin-top:0px"><?php echo get_ad(8)?></div></div>
<?php  include 'footer.php';?>
