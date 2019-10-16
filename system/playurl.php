<?php
error_reporting(0);
function unicode_decode($name){

  $json = '{"str":"'.$name.'"}';
  $arr = json_decode($json,true);
  if(empty($arr)) return '';
  return $arr['str'];
}
$yuming='http://www.360kan.com';
$player = $yuming.$_GET['play'];
$tvinfo = curl_get($player);
$tvzz='#(?<=<div class="num-tab-main g-clear js-tab" style="display:none;">|<div class="num-tab-main g-clear js-tab">|<div class="site-wrap" id="js-site-wrap">)[\s\S]+<div class="c-body g-clear">#';
$tvzz1 = '#<a data-num="(.*?)"\s*data-daochu="to=(.*?)" href="(.*?)">#';
$dyzz= '#<span class="txt">站点排序 ：</span>[\s\S]+?<div style=\' visibility:hidden\'#';
$bflist = '#<a data-daochu=(.*?) class="btn js-site ea-site (.*?)" href="(.*?)">(.*?)</a>#';
$jianjie = '#<div class="item-desc-wrap g-clear js-close-wrap" style="display:none;"><span>(.*?)</span>(.*?)<a#';
$biaoti = '#<h1>(.*?)</h1>#';
$pan = '#<h2 class="title g-clear">(.*?)</h2>#';
$pan1 =' #<div id="js-juji" class="juji g-clear p-mod" monitor-desc="(.*?)"(.*?)data-site="(.*?)">#';
$str=$_GET['play'];
$arr = explode('/', $str);
$xtcmsid=str_replace('.html', '', "$arr[2]");
$xtcmstyle=$arr[1];
$laiyuan = '#{"ensite":"(.*?)","cnsite":"(.*?)","vip":(.*?)}#';
$daoyan = '#<p class="ite(.*?)"><span>导演(.*?)</span>(.*?)</p>#';
$leixing = '#<p class="ite(.*?)</span>(.*?)</a>#';
$niandai = '#<p class="ite(.*?)"><span>年代(.*?)</span>(.*?)</p>#';
$diqu = '#<p class="ite(.*?)"><span>地区(.*?)</span>(.*?)</p>#';
$zhuyan = '#<p class="item item-actor">(.*?)</p>#';
preg_match_all($jianjie, $tvinfo, $jjarr);
preg_match_all($tvzz, $tvinfo, $tvarr);
preg_match_all($dyzz, $tvinfo, $dyarr);
preg_match_all($pan, $tvinfo, $ptvarr);
preg_match_all($pan1, $tvinfo, $ptvarr1);
preg_match_all($dyzz, $tvinfo, $tvlist);
preg_match_all($biaoti, $tvinfo, $btarr);
preg_match_all($daoyan, $tvinfo, $daoyano);
preg_match_all($leixing, $tvinfo, $leixingo);
preg_match_all($niandai, $tvinfo, $niandaio);
preg_match_all($diqu, $tvinfo, $diquo);
preg_match_all($zhuyan, $tvinfo, $zhuyano);
$mvsrc = implode($glue, $tvlist[0]);
preg_match_all($bflist, $mvsrc, $dyarr1);

//电视剧动漫多来源判断
preg_match_all($laiyuan, $tvinfo, $laiyuanarr);
$yuan=$laiyuanarr[1];//来源英文
$yuanname=$laiyuanarr[2];//来源中文
//电影链接
$dysrc=$dyarr1[0];
$c=$dyarr1[3];//电影的播放链接
$d=$dyarr1[4];//电影来源
$e=$daoyano[3][0];
$f=$leixingo[1][0];
$g=$niandaio[3][0];
$h=$diquo[3][0];
$hi=$zhuyano[1][0];
$jian = $jjarr[2][0];//简介
$timu = $btarr[1][0];//标题
$panduan = $ptvarr[1][0];
$panduan1 = $ptvarr1[1][0];
$zyv="#<em class='top-new'>\s*(monitor-desc=\"收起往期更多\">)?[\s\S]+?<div monitor-desc#";
$qi="#<span class='w-newfigure-hint'>(.*?)</span>#";
$zyimg="#data-src='(.*?)' alt='(.*?)'#";
preg_match_all($zyv, $tvinfo,$zyvarr);
$zylist = implode($glue, $zyvarr[0]);
$ztlizz="#<a href='(.*?)' data-daochu=to=(.*?) class='js-link'><div class='w-newfigure-imglink g-playicon js-playicon'>#";
preg_match_all($ztlizz, $zylist,$zyliarr);
preg_match_all($qi, $zylist,$qiarr);
preg_match_all($zyimg, $zylist,$imgarr);
$zyvi=$zyliarr[1];
$noqi=$qiarr[1];
$zypic=$imgarr[1];
$zyname=$imgarr[2];
//print_r($zyvi);

$zcf = implode($glue, $tvarr[0]);
preg_match_all($tvzz1, $zcf, $tvarr1);

$b = $tvarr1[3];
$much = 1;
$mjk=$xtcms_mjk;

if (empty($c[0])){
$result = mysql_query('select * from xtcms_vod order by d_id asc');
		while ($row = mysql_fetch_array($result))
		{
if($timu==$row['d_name']){
	echo '<meta http-equiv = "refresh" content = "0;url='.$xtcms_domain.'bplay.php?bf='.$row['d_id'].'">';
}
else{
if (empty($b[0]) and empty($zyvi[0]))	{
	alert_href('视频暂时不能观看!',''.$xtcms_domain.'');
}
}
}
}
$d_scontent=explode(',',$xtcms_shoufei);
for($i=0;$i<count($d_scontent);$i++)
{
if($timu==$d_scontent[$i]){
//提示错误值
alert_href('对不起,您的观看的视频已经下架,请到官网观看.谢谢!',''.$xtcms_domain.'');
     }

}
if($xtcms_user==1){//开启收费模式
//判定会员是否登录
if(!isset($_SESSION['user_name'])){
		alert_href('请注册会员登录后观看',''.$xtcms_domain.'ucenter/login.php');
	};
//获取会员信息
 $result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');//查询会员积分
     if($row = mysql_fetch_array($result)){
     $u_points=$row['u_points'];//会员积分
     $u_plays=$row['u_plays'];//会员观看记录
     $u_end=$row['u_end'];//到期时间
	 $u_group=$row['u_group'];//会员组
     }
//判断会员组
if ($u_group==1){
$d_cishu=explode(',',$u_plays);
for($i=0;$i<count($d_cishu);$i++)
{
$cishu=$i;
}
if ($cishu>=$xtcms_cishu){
	//大于免费观看次数出现此信息
	 alert_href('对不起,您的观看次数已经用完，请推荐本站给您的好友、赚取更多积分',''.$xtcms_domain.'ucenter/yaoqing.php');
}
else
//写入观看记录
{
 $uplays = $u_plays.",".$xtcmsid;
 $uplays = str_replace(",,",",",$uplays);
 $_data['u_plays'] =$uplays;
 $sql = 'update xtcms_user set '.arrtoupdate($_data).' where u_name="'.$_SESSION['user_name'].'"';
if (mysql_query($sql)) {
}
}


}
//视频收费

}
 ?>
