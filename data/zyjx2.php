<?php
if ($xtcms_zongyinew==0){
$zyurllist='http://www.360kan.com/zongyi/list.php?rank=createtime&pageno=1';
}
elseif($xtcms_zongyinew==1){
$zyurllist='http://www.360kan.com/zongyi/list.php?rank=rankhot&pageno=1';
}
$zyinfo= curl_get($zyurllist);
$vname='#<span class="s1">(.*?)</span>#';//影片名称
$fname='#<span class="s2">(.*?)</span>#';//评分
$nname='#<span class="hint">(.*?)</span>#';//年份
$vlist='#<a class="js-tongjic" href="(.*?)">#';//链接
$vstar='# <p class="star">(.*?)</p>#';//主演
$vvlist='#<div class="s-tab-main">[\s\S]+?<div monitor-desc#';//获取图片区域
$vimg='#<img src="(.*?)">#'; //图片
$array = array();
preg_match_all($vname, $zyinfo,$zynamearr); //影片名称
preg_match_all($vlist, $zyinfo,$zylinkarr);//链接
preg_match_all($vstar, $zyinfo,$zyzhuyanarr);//主演
preg_match_all($vvlist, $zyinfo,$imglist);
$zcf=implode($glue, $imglist[0]);
preg_match_all($vimg, $zcf,$zyimgarr); //图片
preg_match_all($fname, $zyinfo,$zypingfenarr); //评分
preg_match_all($nname, $zyinfo,$zyyeararr);// 年份
?>
