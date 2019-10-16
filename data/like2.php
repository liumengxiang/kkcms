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
?>
