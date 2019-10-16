<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php  include 'head.php';?>
<title>视频列表-<?php echo $xtcms_seoname;?></title>
<meta name="keywords" content="视频排行,<?php echo $xtcms_keywords;?>">
<meta name="description" content="<?php echo $xtcms_description;?>">
</head>
<body >
<?php include 'header.php'; ?>
<div class="container">
<div class="row"  style="margin-top:10px"><?php echo get_ad(18)?></div>
	<div class="row">
	<div class="hy-layout clearfix">
  <div class="hy-min-screen clearfix">
    <div class="item clearfix">
      <dl class="clearfix">
        <dt class="text-muted">按剧情</dt>
        <dd class="clearfix">
<a href="./vlist.php?cid=0" class="acat" style="white-space: pre-wrap;">全部</a>
											  <?php
$result = mysql_query('select * from xtcms_vod_class where c_pid=0 order by c_id asc');
while ($row = mysql_fetch_array($result)){

			echo '<a href="./vlist.php?cid='.$row['c_id'].'" class="acat" style="white-space: pre-wrap;margin-bottom: 4px;">'.$row['c_name'].'</a>';
		}
?>
						
<?php
if ($_GET['cid'] != 0){
	?>
						
											  <?php
$result = mysql_query('select * from xtcms_vod_class where c_pid='.$_GET['cid'].' order by c_sort desc,c_id asc');
while ($row = mysql_fetch_array($result)){

			echo '<a href="./vlist.php?cid='.$row['c_id'].'" class="acat" style="white-space: pre-wrap;margin-bottom: 4px;">'.$row['c_name'].'</a>';
		}
?>
						
<?php }?>				</dd>
      </dl>

    </div>
  </div>
</div>


		<div class="hy-layout clearfix" style="margin-top: 0;">
			<div class="hy-switch-tabs active clearfix">
				<span class="text-muted pull-right hidden-xs">如果您喜欢本站请动动小手分享给您的朋友！</span>
				<ul class="nav nav-tabs">
					<li class="active"><a href="#">抢先看资源</a></li>
				</ul>
			</div>
			<div class="hy-video-list">
				<div class="item">
					<ul class="clearfix">
 							<?php
							if (isset($_GET['cid'])) {
								if ($_GET['cid'] != 0){
									$sql = 'select * from xtcms_vod where d_parent in ('.$_GET['cid'].') order by d_id desc';
									$pager = page_handle('page',24,mysql_num_rows(mysql_query($sql)));
									$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
								}else{
									$sql = 'select * from xtcms_vod order by d_id desc';
									$pager = page_handle('page',24,mysql_num_rows(mysql_query($sql)));
									$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
								}
							}
							while($row= mysql_fetch_array($result)){
								$cc="./bplay.php?play=";
								$dd="./bplay/";
if ($xtcms_wei==1){
$ccb=$dd.$row['d_id'];
}
else{
$ccb=$cc.$row['d_id'];	
}
if ($row['d_jifen']>0){
$ok="onclick=\"return confirm('此视频为收费视频，观看需要支付".$row['d_jifen']."积分，您是否观看？')\"";
}
else{
$ok="";
}
			echo '<div class="col-md-2 col-sm-3 col-xs-4">
							<a class="videopic lazy" '.$ok.' href="'.$ccb.'" title="'.$row['d_name'].'" data-original="'.$row['d_picture'].'" style="background: url(./style/load.gif) no-repeat; background-position:50% 50%; background-size: cover;"><span class="play hidden-xs"></span></a>
							<div class="title">
								<h5 class="text-overflow"><a href="'.$ccb.'" '.$ok.'>'.$row['d_name'].'</a></h5>
							</div>
							<div class="subtitle text-muted text-muted text-overflow hidden-xs">'.$row['d_zhuyan'].'</div>
						</div>';

		 } ?>

						</ul>
				</div>
			</div>
			<div class="hy-page clearfix">
				<ul class="cleafix">
<?php echo page_show($pager[2],$pager[3],$pager[4],2);?></ul>
			</div>		</div>
	</div>
</div>
<?php  include 'footer.php';?>
<?php  ?>
