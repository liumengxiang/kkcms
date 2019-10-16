<?php
$tvurllist='http://www.360kan.com/dianshi/list.php?rank=rankhot&pageno=1';
$tvinfo= curl_get($tvurllist);
$vname='#<span class="s1">(.*?)</span>#';//影片名称
$fname='#<span class="s2">(.*?)</span>#';//评分
$nname='#<span class="hint">(.*?)</span>#';//年份
$vlist='#<a class="js-tongjic" href="(.*?)">#';//链接
$vstar='# <p class="star">(.*?)</p>#';//主演
$vvlist='#<div class="s-tab-main">[\s\S]+?<div monitor-desc#';//获取图片区域
$vimg='#<img src="(.*?)">#'; //图片
$array = array();
preg_match_all($vname, $tvinfo,$tvnamearr); //影片名称
preg_match_all($vlist, $tvinfo,$tvlinkarr);//链接
preg_match_all($vstar, $tvinfo,$tvzhuyanarr);//主演
preg_match_all($vvlist, $tvinfo,$imglist);
$zcf=implode($glue, $imglist[0]);
preg_match_all($vimg, $zcf,$tvimgarr); //图片
preg_match_all($fname, $tvinfo,$tvpingfenarr); //评分
preg_match_all($nname, $tvinfo,$tvyeararr);// 年份

?>
