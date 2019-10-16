<?php
$fang=$_GET['play'];
$yuming='http://www.360kan.com';
$jmfang= $yuming.$fang;
$like= curl_get($jmfang);
$likezz="#<a href='(.*?)' data-index=(.*?)>#";
$likenn="#data-index=(.*?)>(.*?)</a></p>#";
$likeimg="#<img src=\"(.*?)\" data-src='(.*?)'>#";
preg_match_all($likezz, $like,$likearr);
preg_match_all($likenn, $like,$likearrr);
preg_match_all($likeimg, $like,$likearr1);
$likename=$likearrr[2];
$likeurl=$likearr[1];
$likeimg=$likearr1[2];

foreach ($likename as $ks=>$vs){

$host1=$likeurl[$ks];
$hjiami=$host1;
if ($xtcms_wei==1){
$chuandi='../../vod'.$hjiami;
}
else{
$chuandi='./play.php?play='.$hjiami;
}
	echo "  <div class='swiper-slide'>
								<div class='item'>
									<a class='videopic lazy' href='$chuandi' title='$vs' data-original='$likeimg[$ks]' style='background: url($likeimg[$ks]) no-repeat; background-position:50% 50%; background-size: cover;border-radius: 6px;'><span class='play hidden-xs'></span><span class='score'>推荐</span></a>
									<div class='title'>
										<h5 class='text-overflow'><a href='$chuandi'>$vs</a></h5>
									</div>
									<div class='subtitle text-muted text-muted text-overflow hidden-xs'>
																			</div>
								</div>
							</div>";


 } ?>
