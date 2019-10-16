<?php include('system/inc.php');
include('system/playurl.php');
if ($xtcmstyle=='m'){
$movie='class="weui-state-active"';
}
if ($xtcmstyle=='tv'){
$tv='class="weui-state-active"';
}
if ($xtcmstyle=='ct'){
$dm='class="weui-state-active"';
}
if ($xtcmstyle=='va'){
$zy='class="weui-state-active"';
}
include('template/'.$xtcms_bdyun.'/play.php');?>
