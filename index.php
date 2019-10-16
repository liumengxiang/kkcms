<?php
ob_start(); //初始化,用于设置自动生成静态首页
include('system/inc.php');//载入全局配置
error_reporting(0); //关闭错误报告
if (!file_exists('./install/index.lock')) {
    header("location:install");
    die;
}
$seach=curl_get('https://www.360kan.com/');
$szz="# <a href='(.*?)' class='p0 g-playicon js-playicon' ><img src='(.*?)' alt='(.*?)' /><span class='title'>(.*?)</span><span class='desc'>(.*?)</span><b></b>#";
preg_match_all($szz,$seach,$sarr);
$one=$sarr[1];
$two=$sarr[2];
$three=$sarr[5];
include 'data/dyjx.php';
include 'data/tvjx.php';
include 'data/zyjx.php';
include 'data/dmjx.php';
include 'data/cxini.php';
include 'data/dyjx2.php';
include 'data/tvjx2.php';
include 'data/zyjx2.php';
include 'data/dmjx2.php';
include 'template/'.$xtcms_bdyun.'/index.php';
?>

