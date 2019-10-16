<?php
$arr=explode('pageno',$flid1);
$yourneed=$arr[0];
$yema=$yourneed;
$arr=explode('pageno',$yema);
$yemama=$arr[0];
$mama='&pageno=';
$wangzhi="http://www.360kan.com";
$flid2=''.$wangzhi.$yemama.$mama.$page.'';
$b=(strpos($flid2,'cat='));
$c=(strpos($flid2,'&p'));
$ye=substr($flid2,$b+4,$b-$c-1);
if($ye==133){$fenye=('11');}
elseif($ye==101){$fenye=('23');}
elseif($ye==102){$fenye=('22');}
elseif($ye==124||$ye==103){$fenye=('5');}
elseif($ye==116||$ye==108){$fenye=('9');}
elseif($ye==110){$fenye=('12');}
elseif($ye==112){$fenye=('15');}
elseif($ye==132||$ye==122||$ye==118||$ye==117||$ye==113){$fenye=('4');}
elseif($ye==127||$ye==119||$ye==115){$fenye=('10');}
elseif($ye==125||$ye==120){$fenye=('2');}
elseif($ye==121){$fenye=('16');}
elseif($ye==123){$fenye=('14');}
elseif($ye==126){$fenye=('13');}
elseif($ye==130||$ye==129||$ye==128){$fenye=('3');}
else{$fenye=('24');}

$fcon=curl_get($flid2);
$rurl=$fcon;
$vname='#<span class="s1">(?!\{title\})(.*?)</span>#';
$fname='#<span class="s2">(.*?)</span>#';
$vlist='#<a class="js-tongjic" href="(.*?)">#';
$vstar='# <p class="star">(.*?)</p>#';
$vvlist='#<div class="s-tab-main">[\s\S]+?<div monitor-desc#';
$vimg='#<img src="(.*?)">#';
$bflist='#<a data-daochu(.*?) href="(.*?)" class="js-site-btn btn btn-play"></a>#';
$jishu='#<span class="hint">(.*?)</span>#';
$fufei='#<span class="pay">(.*?)</span>#';
$yuming='http://www.360kan.com';
preg_match_all($vname, $rurl,$xarr);
preg_match_all($fname, $rurl,$xarrf);
preg_match_all($vlist, $rurl,$xarr1);
preg_match_all($vstar, $rurl,$xarr2);
preg_match_all($vvlist, $rurl,$imglist);
$zcf=implode($glue, $imglist[0]);
preg_match_all($vimg, $zcf,$xarr3);
preg_match_all($bflist, $rurl,$xarr4);
preg_match_all($jishu, $rurl,$xarr5);
preg_match_all($fufei, $rurl,$xarrff);
$xname=$xarr[1];$lname=$xarrf[1];
$xlist=$xarr1[1];$xstar=$xarr2[1];
$ximg=$xarr3[1];$xbflist=$xarr4[1];
$xjishu=$xarr5[1];
$xfufei=$xarrff[1];
?>
