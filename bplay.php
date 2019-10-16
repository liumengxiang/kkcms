<?php 
include('system/inc.php');//载入全局配置文件
error_reporting(0);//关闭错误报告
$result = mysql_query('select * from xtcms_vod where d_id = '.$_GET['play'].' ');
if (!!$row = mysql_fetch_array($result)) {
	$d_id = $row['d_id'];
	$d_name = $row['d_name'];
	$d_jifen = $row['d_jifen'];
	$d_user = $row['d_user'];
	$d_parent = $row['d_parent'];
	$d_picture = $row['d_picture'];
	$d_content = $row['d_content'];
	$d_scontent = $row['d_scontent'];
	$d_seoname = $row['d_seoname'];
	$d_keywords = $row['d_keywords'];
	$d_description = $row['d_description'];
	$d_player = $row['d_player'];
	$d_title = ($d_seoname == '') ? $d_name .' - '.$xtcms_name : $d_seoname.' - '.$d_name.' - '.$xtcms_name ;
} else {
	die ('您访问的详情不存在');
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
$result = mysql_query('select * from xtcms_vod where d_id ='.$d_id.'');
	if (!!$row = mysql_fetch_array($result)){
$d_scontent=explode("\r\n",$row['d_scontent']);
//print_r($d_scontent);
for($i=0;$i<count($d_scontent);$i++)
{	$d_scontent[$i]=explode('$',$d_scontent[$i]);
		}
$playdizhi=get_play($row['d_player']).$d_scontent[0][1];
	}else{
		return '';
	};
	
include('template/'.$xtcms_bdyun.'/bplay.php');
?>