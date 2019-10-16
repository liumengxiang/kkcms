<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="cache-control" content="no-siteapp">
<title>搜索<?php echo $q?>-<?php echo $xtcms_seoname;?></title>
<link rel="stylesheet" href="<?php echo $xtcms_domain;?>style/css/bootstrap.min.css" />
<link href="<?php echo $xtcms_domain;?>style/css/swiper.min.css" rel="stylesheet" type="text/css" >		
<link href="<?php echo $xtcms_domain;?>style/font/iconfont.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $xtcms_domain;?>style/css/blackcolor.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $xtcms_domain;?>style/css/style.min.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="<?php echo $xtcms_domain;?>style/js/swiper.min.js"></script>
<meta name="keywords" content="<?php echo $q?>,<?php echo $xtcms_keywords;?>">
<meta name="description" content="<?php echo $xtcms_description;?>">
<!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->
</head>

<body class="vod-search">
<?php  include 'header.php';?>
<div class="container">
	<div class="row">
		<div class="col-md-9 col-sm-12 hy-main-content">
			<div class="hy-layout clearfix">
				<div class="hy-video-head">
					<span class="text-muted pull-right hidden-xs"></span>
					<h4 class="margin-0">搜索到与<span class="text-color">“<?php echo $q?>”</span>相关的结果</h4>
				</div>
				<?php 

	$result = mysql_query('select * from xtcms_vod where d_name like "%'.$q.'%" order by d_id desc');
		while ($row = mysql_fetch_array($result))
{
$tupian=$row['d_picture'];
$cs=$row['d_name'];
$jianjie=$row['d_content'];
$cc="./bplay.php?play=";
$dd="./bplay/";
if ($xtcms_wei==1){
$chuandi=$dd.$row['d_id'];
}
else{
$chuandi=$cc.$row['d_id'];	
}	
?>
				<div class="hy-video-details active clearfix">
					<div class="item clearfix">
						<dl class="content">
							<dt><a class="videopic" href="<?php echo $chuandi?>" style="background: url(<?php echo $tupian?>) no-repeat; background-position:50% 50%; background-size: cover;border-radius: 6px;"><span class="play hidden-xs"></span></a></dt>
							<dd class="clearfix">
							<div class="head">
								<h3><?php echo $cs?></h3>
							</div>
							<div class="score">
								<div class="star">
									<span class="star-cur" id="score-0"></span>
								</div>
								<span class="branch"></span>
								<script type="text/javascript">
												var str = "0%" 
												document.getElementById("score-0").style.width = (str.replace(".", ""))
										    </script>
							</div>
							<ul>
								<li><span><?php echo $row['d_zhuyan']?></span></li>
								<li><span>类型：<?php echo get_channel_name($row['d_parent'])?></span></li>
<li><span class="text-muted">简介：</span><?php echo $jianjie?></li>

							</ul>
							<div class="block">
								<a class="text-muted" href="<?php echo $chuandi?>">查看详情 <i class="icon iconfont icon-right"></i></a>
							</div>
							</dd>
						</dl>
					</div>
				</div>
<?php } ?> 
<?php 
if (!empty($one)){
foreach ($one as $ni=>$cs){ 
$mvsrc1 = str_replace("http://www.360kan.com", "", "$nine[$ni]");
$pingfen = str_replace('<div class="b-tomato"><div class="rating-site yellow"><p class="value">评分：<span>', '', "$liu[$ni]");
$pingfen = str_replace('</span></p></div></div>', '', "$pingfen");
$pingfen = str_replace('    ', '', "$pingfen");
$pingfen = str_replace('<div class="cont">', '', "$pingfen");
$pingfen = str_replace('<h3 class="title">', '', "$pingfen");
$pingfen = str_replace(array("\r\n", "\r", "\n"), '', "$pingfen");
$pingfen = str_replace('<div class="b-tomato"><div class="rating-site red"><p class="value">评分：<span>', '', "$pingfen");
$pingfen = str_replace('<div class="b-tomato"><div class="rating-site green"><p class="value">评分：<span>', '', "$pingfen");
$jianjie= str_replace("data-desc='", '', "$ba[$ni]");
$jianjie= str_replace("'>", '', "$jianjie");
$tupian=$two[$ni];
if ($xtcms_wei==1){
$chuandi='../../vod'.$mvsrc1;
}
else{
$chuandi='./play.php?play='.$mvsrc1;	
}//结束
$d_scontent=explode(',',$xtcms_shoufei);
for($i=0;$i<count($d_scontent);$i++)
{
if($cs==$d_scontent[$i]){
//提示错误值
$xianshi='style="display:none"';
     }	

}
?>
<div class="hy-video-details active clearfix" <?php echo $xianshi?>>
					<div class="item clearfix">
						<dl class="content">
							<dt><a class="videopic" href="<?php echo $chuandi?>" style="background: url(<?php echo $tupian?>) no-repeat; background-position:50% 50%; background-size: cover;border-radius: 6px;"><span class="play hidden-xs"></span></a></dt>
							<dd class="clearfix">
							<div class="head">
								<h3><?php echo $cs?><?php echo $three[$ni]?></h3>
							</div>
							<div class="score">
								<div class="star">
									<span class="star-cur" id="score-<?php echo $pingfen?>"></span>
								</div>
								<span class="branch"><?php echo $pingfen?></span>
								<script type="text/javascript">
												var str = "<?php echo $pingfen?>%" 
												document.getElementById("score-<?php echo $pingfen?>").style.width = (str.replace(".", ""))
										    </script>
							</div>
							<ul>
								<li><?php echo $si[$ni]?></li>
								<li><?php echo $wu[$ni]?></li>
<li><span class="text-muted">简介：</span><?php echo $jianjie?></li>

							</ul>
							<div class="block">
								<a class="text-muted" href="<?php echo $chuandi?>">查看详情 <i class="icon iconfont icon-right"></i></a>
							</div>
							</dd>
						</dl>
					</div>
				</div>

<?php } 
}else{
	
foreach ($mingxing as $k=>$mx){ 
$mvsrc1 = str_replace("http://www.360kan.com", "", "$mingxing[$k]");
$tupian=$mingxing1[$k];
$title=$mingxing2[$k];
$jishu=$mingxing3[$k];
if ($xtcms_wei==1){
$chuandi='../../vod'.$mvsrc1;
}
else{
$chuandi='./play.php?play='.$mvsrc1;	
}//结束

?>
<div class="hy-video-details active clearfix">
					<div class="item clearfix">
						<dl class="content">
							<dt><a class="videopic" href="<?php echo $chuandi?>" style="background: url(<?php echo $tupian?>) no-repeat; background-position:50% 50%; background-size: cover;border-radius: 6px;"><span class="play hidden-xs"></span></a></dt>
							<dd class="clearfix">
							<div class="head">
								<h3><?php echo $title?><?php echo $jishu?></h3>
							</div>

							<ul>
<li><span class="text-muted">主演：</span><?php echo $q?></li>

							</ul>
							<div class="block">
								<a class="text-muted" href="<?php echo $chuandi?>">查看详情 <i class="icon iconfont icon-right"></i></a>
							</div>
							</dd>
						</dl>
					</div>
				</div>
<?php } ?> 
<?php } ?> 


 <!--判断尝鲜搜索-->
		<?php
$link=$zwcx['zhanwai'];
$a = $link.'index.php/search?wd='.rawurlencode($q);

    //初始化
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $a);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 1);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    //执行命令
    $response = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
    //显示获得的数据
//print_r($sarr2);
$zhanw1='#<li><a href="/index.php/show/index/(.*?)">(.*?)<img src="(.*?)" /><span>(.*?)</span></a></li>#';
preg_match_all($zhanw1, $response,$zhanw1rr);
$id=$zhanw1rr[1]; //id
$img=$zhanw1rr[3];  //图片	
$title=$zhanw1rr[4];  //标题



	   foreach ($id as $key=>$cs){	
echo " <div class='hy-video-details active clearfix'>
					<div class='item clearfix'>
						<dl class='content'>
							<dt><a class='videopic' href='mplay.php?mso=$id[$key]' style='background: url($img[$key]) no-repeat; background-position:50% 50%; background-size: cover;border-radius: 6px;'><span class='play hidden-xs'></span></a></dt>
							<dd class='clearfix'>
							<div class='head'>
								<h3>$title[$key]</h3>
							</div>
							<div class='score'>
								<div class='star'>
									<span class='star-cur' id='score-0'></span>
								</div>
								<span class='branch'></span>
								
							</div>
							<ul>	
<li><span class='text-muted'><font color='#value'>(外站尝鲜搜索结果)</font></li>

							</ul>
							<div class='block'>
								<a class='text-muted' href='mplay.php?mso=$id[$key]'>查看详情 <i class='icon iconfont icon-right'></i></a>
							</div>
							</dd>
						</dl>
					</div>
				</div>
";
}
?>
<!--判断尝鲜搜索-->

				</div>
		</div>
		<div class="col-md-3 col-sm-12 hy-main-side hidden-sm hidden-xs">
			<div class="hy-layout clearfix">
				<div class="hy-video-ranking side clearfix">
					<div class="head">
						<a class="text-muted pull-right" href="<?php echo $xtcms_domain;?>vlist.php?cid=0">更多 <i class="icon iconfont icon-right"></i></a>
							<h4><i class="icon iconfont icon-top text-color"></i> 资源抢先看</h4>
					</div>
					<div class="item">
						<ul class="clearfix">
						<?php $result = mysql_query('select * from xtcms_vod order by d_id desc LIMIT 0,12');
		while ($row = mysql_fetch_array($result)){
$cc="./bplay.php?play=";
$dd="../bplay/";
if ($xtcms_wei==1){
$ccb=$dd.$row['d_id'];
}
else{
$ccb=$cc.$row['d_id'];	
}
			echo '<li class="text-overflow"><span class="pull-right text-color">->></span><a href="'.$ccb.'" title="'.$row['d_name'].'">
						<em class="number active ">抢先</em>'.$row['d_name'].'</a></li>';
		}?>		
	  </ul>
					</div>
				</div>
				<div class="hy-video-ranking side clearfix">
					<div class="head">
						<a class="text-muted pull-right" href="<?php echo $xtcms_domain;?>tv.php?u=/dianshi/list.php?cat=all%26pageno=1">更多 <i class="icon iconfont icon-right"></i></a>
						<h4><i class="icon iconfont icon-top text-color"></i> 电视剧排行榜</h4>
					</div>
					<div class="item">
						<ul class="clearfix">
	  <?php 
      include './data/bangdan.php';
      foreach ($tvbdarr[1] as $tvkurl=>$tvbd){
          //echo $bd;//name
          $bdurl2=$tvbdurl[$tvkurl];//url
		  $bdurl2= str_replace("http://www.360kan.com", "", "$bdurl2");
          $tvbdliang1=$tvbdliang[$tvkurl];
		  		   if ($xtcms_wei==1){
$chuandi1='./vod'.$bdurl2;
}
else{
$chuandi1='./play.php?play='.$bdurl2;	
}
          //echo $bdurl1;
		   echo "<li class='text-overflow '><span class='pull-right text-color'>$tvbdliang1</span><a href='$chuandi1' title='$tvbd'><em class='number active'>></em>$tvbd</a></li>";

      }
      
      
      ?>	

					</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	    var swiper = new Swiper('.hy-slide', {
	        pagination: '.swiper-pagination',
	        paginationClickable: true,
	        autoplay: 3000,
	    });	    
	    </script>

<?php  include 'footer.php';?>
<?php?>
