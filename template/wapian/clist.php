<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php  include 'head.php';
$movie='class="active"'?>
<title>电影尝鲜，最新热门电影大全-<?php echo $xtcms_seoname;?></title>
<meta name="keywords" content="电影尝鲜,<?php echo $xtcms_keywords;?>">
<meta name="description" content="<?php echo $xtcms_description;?>">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">

<div class="row"  style="margin-top:10px"><?php echo get_ad(9)?></div>
<div class="row">



<div class="container">
<div class="row"  style="margin-top:0px"><?php echo get_ad(9)?></div></div>
		<div class="hy-layout clearfix" style="margin-top: 10px;">
			<div class="hy-switch-tabs active clearfix">
				<span class="text-muted pull-right hidden-xs">本页面全部来源至外站，如有侵权请联系底部邮箱！</span>
				<ul class="nav nav-tabs">
<?php
$b=(strpos($_GET['m'],'rank='));
$ye=substr($_GET['m'],$b+5);
?>

				</ul>
			</div>
			<div class="hy-video-list">
				<div class="item">
					<ul class="clearfix">
<?php if ($_GET['type'] == 'mj'){
	if(empty($_GET['cx'])){$flid1='3~~~~~~~0~id~~1';}

		$mj='active';
		$yixuanze='美剧';
		$panduan='mj';
  $html=$link.'index.php/whole/index/'.$flid1;
}else {
if(empty($_GET['cx'])){$flid1='1~~~~~~~0~id~~1';}
	$new='active';
	$yixuanze='最近更新';
	$panduan='new';
	$html=$link.'index.php/whole/index/'.$flid1;
}



$a=
    //初始化
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $html);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 1);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    //执行命令
    $response = curl_exec($curl);
    $response0 = curl_exec($curl);
    $info = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
    //显示获得的数据
$response = strstr($response, '<div class="header-tag">') ;
$response = strstr($response, '</ul>',TRUE) ;
$response = str_replace('<div class="header-tag">', "", $response);
$response = str_replace("<ul>", "", $response);
$response = str_replace('"><a', '"><a class="active"', $response);
$response = str_replace('class="on"', "", $response);
$response = str_replace("/index.php/whole/index/", "?type=$panduan&cx=", $response);

?>
<!--导航结束-->

 <?php
$szz1='#<li><a href="/index.php/show/index/(.*?)"><b>(.*?)</b><img src="(.*?)" /><span>(.*?)</span></a></li>#';
preg_match_all($szz1, $info,$sarr1);
       for($i =0;$i<12;$i++){
           $zname=$sarr1[4][$i];//名字
           $two=$sarr1[1][$i];//ID
           $gq=$sarr1[2][$i];//ID
		   $zimg=$sarr1[3][$i];//图片


			echo "<div class='col-md-2 col-sm-3 col-xs-4'>
							<a class='videopic lazy' href='$xtcms_domain/mplay.php?mso=$two' title='$zname' data-original='$zimg' style='background: url(./style/load.gif) no-repeat; background-position:50% 50%; background-size: cover;border-radius: 6px;'>
							<span class='play hidden-xs'></span></a>
							<div class='title'>
								<h5 class='text-overflow'><a href='$xtcms_domain/mplay.php?mso=$two'>$zname</a></h5>
							</div>
							<div class='subtitle text-muted text-muted text-overflow hidden-xs'></div>
						</div>";

 } ?>

						</ul>
				</div>
			</div>
			<div class="hy-page clearfix">
				<ul class="cleafix">
<div monitor-desc='分页' id='js-ew-page' data-block='js-ew-page'  class='ew-page'>
<?php
$response0 = strstr($response0, '<div class="page-list">') ;
$response0 = strstr($response0, '</ul>',TRUE) ;

$response0 = str_replace("<li on", "<li><a on", $response0);
$response0 = str_replace("</li>", "</a></li>", $response0);
$response0 = str_replace("/index.php/whole/index/", "?cx=", $response0);
echo $response0;
?>
</div>
</ul>
			</div>		</div>
	</div>
</div>
	  <div class="container">
<div class="row"  style="margin-top:0px"><?php echo get_ad(8)?></div></div>
<?php  include 'footer.php';?>
