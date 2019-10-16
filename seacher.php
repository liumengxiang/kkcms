<?php include('system/inc.php');
include('data/cxini.php');
$link=$zwcx['zhanwai'];
$q=$_POST['wd'];
$seach=file_get_contents('https://so.360kan.com/index.php?kw='.$q);
$szz='#js-playicon" title="(.*?)"\s*data-logger#';
$szz1='#a href="(.*?)" class="g-playicon js-playicon"#';
$szz2='#<img src="(.*?)" alt#';
$szz3='#(<b>(.*?)</b><span>(.*?)</span></li></ul>)?<ul class="index-(.*?)-ul g-clear">(\n\s*)?<li>(\n\s*)?<b>类型：</b>(\n\s*)?<span>(.*?)</span>#';
$szz4='#<b>类型：</b>[\s\S]*?</li>#';
$szz5='#<b>地区：</b>[\s\S]*?</li>#';
$szz6='#<div class="cont">[\s\S]*?<h3 class="title">#';//评分
$szz7='#<b>导演：</b>(.*?)</li>#';//导演
$szz8='#data-desc=\'[\s\S]+?\'>#';//简介
$mxzl="#<dl class='w-star-intro'><dt>介绍：</dt><dd>(.*?)</dd></dl>#";//简介
$mxss='#<li data-logger=(.*?) class=\'w-mfigure\'><a class=\'w-mfigure-imglink g-playicon js-playicon\' href=\'(.*?)\'> <img src=\'(.*?)\' data-src=\'(.*?)\' alt=\'(.*?)\'  /><span class=\'w-mfigure-hintbg\'>(.*?)</span><span class=\'w-mfigure-hint\'>(.*?)</span></a><h4><a class=\'w-mfigure-title\' href=\'(.*?)\'>(.*?)</a></h4></li>#';//模糊搜索结果
preg_match_all($szz,$seach,$sarr);
preg_match_all($szz8,$seach,$sarr8);
preg_match_all($szz1,$seach,$sarr1);
preg_match_all($szz2,$seach,$sarr2);
preg_match_all($szz3,$seach,$sarr3);
preg_match_all($szz4,$seach,$sarr4);
preg_match_all($szz5,$seach,$sarr5);
preg_match_all($szz6,$seach,$sarr6);
preg_match_all($szz7,$seach,$sarr7);
preg_match_all($mxss,$seach,$sarr8);
preg_match_all($mxzl,$seach,$sarr9);
$one=$sarr[1];//标题
$two=$sarr2[1];//图片
$three=$sarr3[3];//集数
$si=$sarr4[0];//类型
$wu=$sarr5[0];//年代
$liu=$sarr6[0];//评分
$qi=$sarr7[1];//导演
$ba=$sarr8[0];//简介
$nine =$sarr1[1];
$mingxing =$sarr8[2];
$mingxing1 =$sarr8[4];
$mingxing2 =$sarr8[5];
$mingxing3 =$sarr8[6];
$mingxing4 =$sarr9[1];
include('template/'.$xtcms_bdyun.'/seacher.php');?>