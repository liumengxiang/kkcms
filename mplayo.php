<?php 
include ('data/cxini.php');
include('system/inc.php');
error_reporting(0);
$zhan = $zwcx["zhanwai"];
$url = $_SERVER["HTTP_HOST"];
$jiejie = substr($url, 0 - 7, 7);
$jia0 = base64_encode($jiejie);
$jia = md5($jia0);
$b = strpos($jia, "a");
$c = strpos($jia, "z");
$ye = substr($jia, $b, $b - $c - 1);
$jia1 = md5($jia);
$d = strpos($jia1, "s");
$e = strpos($jia1, "0");
$ye1 = substr($jia1, $d, $d - $e - 3);
$jia3 = base64_encode($ye1);
$jia2 = md5($jia3);
$f = strpos($jia2, "W");
$g = strpos($jia2, "5");
$ye2 = substr($jia2, $f, $f - $g - 5);
$jiami0 = $ye1 . $ye2 . $ye;
$jiami = base64_encode($jiami0);

if ($_GET["url"]) {
	$link = base64_decode($_GET["url"]);
	$idd = $_GET["id"];
	$timu = $_GET["name"];
	if ($idd == 2) {
		$fang = $link;
	} else {
		if ($idd == 1) {
			$play = $link;
			$fang = "/jx.php?url=" . $play;
		} else {
			$mso = substr(strrchr($link, "="), 1);
			$link = file_get_contents($zhan . "index.php/play/index/" . $mso);
			$name = "#<h3>&nbsp;&nbsp;(.*?)</h3>#";
			$jishu = "#<li><a id=\"(.*?)\" href=\"/index.php/play/index/(.*?)\">(.*?)</a></li>#";
			$bobo = "#<iframe8899 src=\"(.*?)\" marginwidth=\"0\" marginheight=\"0\" border=\"0\" scrolling=\"no\" frameborder=\"0\" topmargin=\"0\" width=\"100%\" height=\"100%\"></iframe>#";
			preg_match_all($name, $link, $nmarr);
			preg_match_all($jishu, $link, $jjarr);
			preg_match_all($bobo, $link, $bfarr);
			$timu = $nmarr[1][0];
			$iidd = $jjarr[1];
			$ljie = $jjarr[2];
			$jjshu = $jjarr[3];
			$bofang = $bfarr[1][0];
			$b = strpos($bofang, "/y");
			$c = strpos($bofang, "e/");
			$ye = substr($bofang, $b + 2, $c - 1);
			if ($ye == "unparse") {
				$fang = $zhan . $bofang;
			} else {
				$fang = $bofang;
			}
		}
	}
} else {
	$mso = $_GET["mso"];
	$link = file_get_contents($zhan . "index.php/play/index/" . $mso);
	$name = "#<h3>&nbsp;&nbsp;(.*?)</h3>#";
	$jishu = "#<li><a id=\"(.*?)\" href=\"/index.php/play/index/(.*?)\">(.*?)</a></li>#";
	$bobo = "#<iframe8899 src=\"(.*?)\" marginwidth=\"0\" marginheight=\"0\" border=\"0\" scrolling=\"no\" frameborder=\"0\" topmargin=\"0\" width=\"100%\" height=\"100%\"></iframe>#";
	preg_match_all($name, $link, $nmarr);
	preg_match_all($jishu, $link, $jjarr);
	preg_match_all($bobo, $link, $bfarr);
	$timu = $nmarr[1][0];
	$iidd = $jjarr[1];
	$ljie = $jjarr[2];
	$jjshu = $jjarr[3];
	$bofang = $bfarr[1][0];
	$b = strpos($bofang, "/y");
	$c = strpos($bofang, "e/");
	$ye = substr($bofang, $b + 2, $c - 1);
	if ($ye == "unparse") {
		$fang = $zhan . $bofang;
	} else {
		$fang = $bofang;
	}
}
$result1 = mysql_query('select * from xtcms_vod_class where c_id='.$d_parent.' order by c_id asc');
while ($row1 = mysql_fetch_array($result1)){
$c_hide=$row1['c_hide'];
}
if($c_hide>0){
if(!isset($_SESSION['user_name'])){
		alert_href('请注册会员登录后观看',''.$xtcms_domain.'ucenter');
	};
    $result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');//查询会员积分
     if($row = mysql_fetch_array($result)){
	 $u_group=$row['u_group'];//到期时间
     }
 if($u_group<=1){//如果会员组
 alert_href('对不起,您不能观看会员视频，请升级会员！',''.$xtcms_domain.'ucenter/mingxi.php');
 } 
}
include('system/shoufei.php');
if($d_jifen>0){//积分大于0,普通会员收费
	if(!isset($_SESSION['user_name'])){
		alert_href('请注册会员登录后观看',''.$xtcms_domain.'ucenter');
	};
    $result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');//查询会员积分
     if($row = mysql_fetch_array($result)){
     $u_points=$row['u_points'];//会员积分
     $u_plays=$row['u_plays'];//会员观看记录
     $u_end=$row['u_end'];//到期时间
	 $u_group=$row['u_group'];//到期时间
     }	

	     if($u_group<=1){//如果会员组
     if($d_jifen>$u_points){
	 alert_href('对不起,您的积分不够，无法观看收费数据，请推荐本站给您的好友、赚取更多积分',''.$xtcms_domain.'ucenter/yaoqing.php');
    }  else{

    if (strpos(",".$u_plays,$d_id) > 0){ 

	}	
	//有观看记录不扣点
else{

   $uplays = ",".$u_plays.$d_id;
   $uplays = str_replace(",,",",",$uplays);
   $_data['u_points'] =$u_points-$d_jifen;
   $_data['u_plays'] =$uplays;
   $sql = 'update xtcms_user set '.arrtoupdate($_data).' where u_name="'.$_SESSION['user_name'].'"';
if (mysql_query($sql)) {

alert_href('您成功支付'.$d_jifen.'积分,请重新打开视频观看!',''.$xtcms_domain.'bplay.php?play='.$d_id.'');
}
}
	
}
}
}
if($d_user>0){	
if(!isset($_SESSION['user_name'])){
		alert_href('请注册会员登录后观看',''.$xtcms_domain.'ucenter');
	};
    $result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');//查询会员积分
     if($row = mysql_fetch_array($result)){
     $u_points=$row['u_points'];//会员积分
     $u_plays=$row['u_plays'];//会员观看记录
     $u_end=$row['u_end'];//到期时间
	 $u_group=$row['u_group'];//到期时间
     }		 
if($u_group<$d_user){
	alert_href('您的会员组不支持观看此视频!',''.$xtcms_domain.'ucenter/mingxi.php');
}
}
function get_play($t0){
	$result = mysql_query('select * from xtcms_player where id ='.$t0.'');
	if (!!$row = mysql_fetch_array($result)){
return $row['n_url'];
	}else{
		return $t0;
	};
}
include('template/'.$xtcms_bdyun.'/mplayo.php');
?>