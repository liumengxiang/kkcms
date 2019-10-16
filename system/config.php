<?php
error_reporting(0); 
$movie="";
$tv="";
$dm="";
$zy="";
$result = mysql_query('select * from xtcms_system where id = 1');
$row = mysql_fetch_array($result);
$xtcms_domain = $row['s_domain'];
$xtcms_name = $row['s_name'];
$xtcms_seoname = $row['s_seoname'];
$xtcms_keywords = $row['s_keywords'];
$xtcms_description = $row['s_description'];
$xtcms_copyright = $row['s_copyright'];
$xtcms_cache = $row['s_cache'];
$xtcms_wei = $row['s_wei'];
$xtcms_user = $row['s_user'];
$xtcms_logo = $row['s_logo'];
$xtcms_weixin = $row['s_weixin'];
$xtcms_dashang = $row['s_dashang'];
$xtcms_mjk = $row['s_mjk'];
$xtcms_jiekou = $row['s_jiekou'];
$xtcms_changyan = $row['s_changyan'];
$xtcms_qqun = $row['s_qqun'];
$xtcms_token= $row['s_token'];
$xtcms_bdyun= $row['s_bdyun'];
$xtcms_tongji= $row['s_tongji'];
$xtcms_icp = $row["s_icp"];
$xtcms_yulu = $row["s_yulu"];
$xtcms_qianxian= $row['s_qianxian'];
$xtcms_dianying= $row['s_dianying'];
$xtcms_dianshi= $row['s_dianshi'];
$xtcms_zongyi= $row['s_zongyi'];
$xtcms_dongman= $row['s_dongman'];
$xtcms_tuiguang= $row['s_tuiguang'];
$xtcms_shoufei= $row['s_shoufei'];
$xtcms_cishu= $row['s_cishu'];
$xtcms_pc= $row['s_pc'];
$xtcms_hong= $row['s_hong'];
$xtcms_gonggao= $row['s_gonggao'];
$xtcms_bofang= $row['s_bofang'];
$xtcms_guanzhu= $row['s_guanzhu'];
$xtcms_fengmian= $row['s_fengmian'];
$xtcms_mail= $row['s_mail'];
$xtcms_smtp= $row['s_smtp'];
$xtcms_muser= $row['s_muser'];
$xtcms_mpwd= $row['s_mpwd'];
$xtcms_wappid= $row['s_wappid'];
$xtcms_wkey= $row['s_wkey'];
$xtcms_alipay= $row['s_alipay'];
$xtcms_appid= $row['s_appid'];
$xtcms_appkey= $row['s_appkey'];
$xtcms_tixing= $row['s_tixing'];
$xtcms_appewm= $row['s_appewm'];
$xtcms_appbt= $row['s_appbt'];
$xtcms_apppic= $row['s_apppic'];
$xtcms_appurl= $row['s_appurl'];
$xtcms_gg= $row['s_gg'];
$xtcms_hctime= $row['s_hctime'];
$xtcms_beijing= $row['s_beijing'];
$xtcms_dianyingnew= $row['s_dianyingnew'];
$xtcms_dongmannew= $row['s_dongmannew'];
$xtcms_zongyinew= $row['s_zongyinew'];
$xtcms_zhifu= $row['s_zhifu'];
$xtcms_tuijian= $row['s_tuijian'];
$xtcms_wxguanzhu= $row['s_wxguanzhu'];
$xtcms_smsname= $row['s_smsname'];
$xtcms_smspass= $row['s_smspass'];
$xtcms_miaoshu= $row['s_miaoshu'];
$xtcms_ggkk= $row['s_ggkk'];//公告控制
$xtcms_ggtc= $row['s_ggtc'];//公告弹出内容
$xtcms_pict= $row['s_pict'];//备用图片
$xtcms_picc= $row['s_picc'];//备用图片2
$xtcms_sdkmo= $row['s_sdkmo'];//解析相关
$xtcms_rtyc= $row['s_rtyc'];//评论备用
$xtcms_zkl= $row['s_zkl'];//自动复制内容
$real_domain= $row['s_shouquan'];
//广告获取
function get_ad($t0){
	$result = mysql_query('select * from xtcms_ad where catid ='.$t0.'');
	if (!!$row = mysql_fetch_array($result)){
return $row['pic'];
	}else{
		return '';
	};
}

function curl_file_get_contents($durl){
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $durl);
   curl_setopt($ch, CURLOPT_TIMEOUT, 5);
   curl_setopt($ch, CURLOPT_USERAGENT, _USERAGENT_);
   curl_setopt($ch, CURLOPT_REFERER,_REFERER_);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $r = curl_exec($ch);
   curl_close($ch);
    return $r;
 }

?>
