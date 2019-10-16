<?php
if ($xtcms_dianyingnew==0){
$urllist='http://www.360kan.com/dianying/list.php?rank=createtime&cat=all&area=all&act=all&year=all&pageno=1';
}
elseif($xtcms_dianyingnew==1){
$urllist='http://www.360kan.com/dianying/list.php?rank=rankhot&cat=all&area=all&act=all&year=all&pageno=1';
}
$info= curl_get($urllist);
$vname='#<span class="s1">(.*?)</span>#';//影片名称
$fname='#<span class="s2">(.*?)</span>#';//评分
$nname='#<span class="hint">(.*?)</span>#';//年份
$vlist='#<a class="js-tongjic" href="(.*?)">#';//链接
$vstar='# <p class="star">(.*?)</p>#';//主演
$vvlist='#<div class="s-tab-main">[\s\S]+?<div monitor-desc#';//获取图片区域
$vimg='#<img src="(.*?)">#'; //图片
$array = array();
preg_match_all($vname, $info,$namearr); //影片名称
preg_match_all($vlist, $info,$linkarr);//链接
preg_match_all($vstar, $info,$zhuyanarr);//主演
preg_match_all($vvlist, $info,$imglist);
$zcf=implode($glue, $imglist[0]);
preg_match_all($vimg, $zcf,$imgarr); //图片
preg_match_all($fname, $info,$pingfenarr); //评分
preg_match_all($nname, $info,$yeararr);// 年份
?>
