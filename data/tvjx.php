<?php
error_reporting(0);
header('Content-type:text/html;charset=utf-8');
$urllist='http://www.360kan.com/dianshi/list.php?rank=rankhot&pageno=1';
$info= curl_get($urllist);
$vname='#<span class="s1">(.*?)</span>#';$vlist='#<a class="js-tongjic" href="(.*?)">#';
$vvlist='#<div class="s-tab-main">[\s\S]+?<div monitor-desc#';
$vstar='# <p class="star">(.*?)</p>#';$nname='#<span class="hint">(.*?)</span>#';
$vvlist='#<div class="s-tab-main">[\s\S]+?<div monitor-desc#';
$vimg='#<img src="(.*?)">#';
$bflist='#<a data-daochu(.*?) href="(.*?)" class="js-site-btn btn btn-play"></a>#';
$jishu='#<span class="hint">(.*?)</span>#';//集数
$array = array();
preg_match_all($vname, $info,$namearr); //名称
preg_match_all($vlist, $info,$listarr);
preg_match_all($vstar, $info,$stararr);
preg_match_all($vvlist, $info,$imglist);
preg_match_all($jishu, $info,$xjishu);
$zcf=implode($glue, $imglist[0]);
preg_match_all($vimg, $zcf,$imgarr);
preg_match_all($nname, $info,$nnamearr);

?>
