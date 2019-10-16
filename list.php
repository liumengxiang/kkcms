<?php 
include('system/inc.php');
if(empty($_GET['type']))
{$_GET['type']='movie';
}
$id= substr($_SERVER['REQUEST_URI'],strpos($_SERVER['REQUEST_URI'],'&')+1);
$type=$_GET['type'];
$ye=$_GET['rank'];
$cat=$_GET['cat'];
$area=$_GET['area'];
$act=$_GET['act'];
$year=$_GET['year'];
if ($_GET['type'] == 'movie'){
	
	$movie='active';
	$yixuanze='电影';
	$panduan='movie';
	$html='http://www.360kan.com/dianying/list?'.$id;
}else if($_GET['type'] == 'tv'){
		$tv='active';
		$yixuanze='电视剧';
		$panduan='tv';
  $html='http://www.360kan.com/dianshi/list?'.$id;

}else if($_GET['type'] == 'dm'){
		$dm='active';
		$yixuanze='动漫';
		$panduan='dm';
		  $html='http://www.360kan.com/dongman/list?'.$id;
	}else{

	$zy='active';
	$yixuanze='综艺';
	$panduan='zy';
  $html='http://www.360kan.com/zongyi/list?'.$id;}
//初始化
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $html);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 1);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    //执行命令
    $response = curl_exec($curl);
    $response0 = curl_exec($curl);
    $response1 = curl_exec($curl);
    $response2 = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
    //显示获得的数据
$response0 = strstr($response0, '<dt class="type">类型:</dt>') ;
$response0 = strstr($response0, '</dd>',TRUE) ;
$response0 = str_replace('<a class="js-tongjip"',"<a ",$response0);
$response0 = str_replace('</a>',"</a> ",$response0);
$response0 = str_replace('<dt class="type">类型:</dt>',"",$response0);
$response0 = str_replace('<b class="on">','<a class="active">',$response0);
$response0 = str_replace('</b>','</a>',$response0);
$response0 = str_replace('<dd class="item g-clear js-filter-content">',"",$response0);
$response0 = str_replace('http://www.360kan.com/dianying/list?',"list.php?type=$panduan&",$response0);
$response0 = str_replace('http://www.360kan.com/dianshi/list?',"list.php?type=$panduan&",$response0);
$response0 = str_replace('http://www.360kan.com/zongyi/list?',"list.php?type=$panduan&",$response0);
$response0 = str_replace('http://www.360kan.com/dongman/list?',"list.php?type=$panduan&",$response0);


$response = strstr($response, '<dt class="type">年代:</dt>') ;
$response = strstr($response, '</dd>',TRUE) ;
$response = str_replace('<a class="js-tongjip"',"<a ",$response);
$response = str_replace('</a>',"</a> ",$response);
$response = str_replace('<dt class="type">年代:</dt>',"",$response);
$response = str_replace('<b class="on">','<a class="active">',$response);
$response = str_replace('</b>','</a>',$response);
$response = str_replace('<dd class="item g-clear js-filter-content">',"",$response);
$response = str_replace('http://www.360kan.com/dianying/list?',"list.php?type=$panduan&",$response);
$response = str_replace('http://www.360kan.com/dianshi/list?',"list.php?type=$panduan&",$response);
$response = str_replace('http://www.360kan.com/dongman/list?',"list.php?type=$panduan&",$response);


$response1 = strstr($response1, '<dt class="type">地区:</dt>') ;
$response1 = strstr($response1, '</dd>',TRUE) ;
$response1 = str_replace('<a class="js-tongjip"',"<a ",$response1);
$response1 = str_replace('</a>',"</a> ",$response1);
$response1 = str_replace('<dt class="type">地区:</dt>',"",$response1);
$response1 = str_replace('<b class="on">','<a class="active">',$response1);
$response1 = str_replace('</b>','</a>',$response1);
$response1 = str_replace('<dd class="item g-clear js-filter-content">',"",$response1);
$response1 = str_replace('http://www.360kan.com/dianying/list?',"list.php?type=$panduan&",$response1);
$response1 = str_replace('http://www.360kan.com/dianshi/list?',"list.php?type=$panduan&",$response1);
$response1 = str_replace('http://www.360kan.com/zongyi/list?',"list.php?type=$panduan&",$response1);
$response1 = str_replace('http://www.360kan.com/dongman/list?',"list.php?type=$panduan&",$response1);;

$response2 = strstr($response2, '<dt class="type">明星:</dt>') ;
$response2 = strstr($response2, '</dd>',TRUE) ;
$response2 = str_replace('<a class="js-tongjip"',"<a ",$response2);
$response2 = str_replace('</a>',"</a> ",$response2);
$response2 = str_replace('<dt class="type">明星:</dt>',"",$response2);
$response2 = str_replace('<b class="on">','<a class="active">',$response2);
$response2 = str_replace('</b>','</a>',$response2);
$response2 = str_replace('<dd class="item g-clear js-filter-content">',"",$response2);
$response2 = str_replace('http://www.360kan.com/dianying/list?',"list.php?type=$panduan&",$response2);
$response2 = str_replace('http://www.360kan.com/dianshi/list?',"list.php?type=$panduan&",$response2);
$response2 = str_replace('http://www.360kan.com/zongyi/list?',"list.php?type=$panduan&",$response2);
include('system/360.php');
include('system/fenye.php'); 	
include('system/360n.php');
include('system/fenyen.php'); 
include('template/'.$xtcms_bdyun.'/list.php');
?>