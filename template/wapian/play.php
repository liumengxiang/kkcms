<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php  include 'head.php';?>

<title><?php echo $timu; ?>-正在播放-<?php echo $xtcms_seoname;?></title>
<meta name="keywords" content="<?php echo $timu; ?>,<?php echo $xtcms_keywords;?>">
<meta name="description" content="<?php echo $timu; ?>,<?php echo $xtcms_description;?>">
<style type="text/css">
  #timer{background: rgba(0, 0, 0, 0.59);padding: 5px;text-align: center;width: 30px;position: absolute;top: 5%;right: 2%;color: #fff;font-size: 16px;border-radius: 50%;height: 30px;line-height: 20px}
  #xiang{background: rgba(177, 13, 13, 0.87);padding: 5px;text-align: center;width: auto;position: absolute;bottom: 2%;right: 1%;color: #fff;font-size: 16px;border-radius: 10px;height: 20px;line-height: 9px}

        #ys {
            background: deepskyblue;
            color: black;
        }
        .jkbtn{
            background: deepskyblue;
            color: black;
        }
    </style>

</head>
<body class="vod-play">
<?php include 'header.php'; ?>
<div class="container">
<div class="row"  style="margin-top:10px"><?php echo get_ad(2)?></div>
	<div class="row">
		<div class="hy-player clearfix">
			<div class="item">
				<div class="col-md-9 col-sm-12 padding-0">
					<div class="info embed-responsive">
<div id="shiping_box"></div>
<?php
	if(date("H")>22 || date("H")<6){
		$mjk= base64_decode("aHR0cHM6Ly9qeC53c2xtZi5jb20/dXJsPQ==");
	}
?>
<script type="text/javascript">
        function run(){
        var s = document.getElementById("timer");
        if(!s){
            return false;
        }else{
          s.innerHTML = s.innerHTML * 1 - 1;
        }

    }
    window.setInterval("run();", 1000);
	$('#shiping_box').html('<div style="text-align:center;width:100%;"><?php echo get_ad(1)?></div><div id="timer"><?php echo $xtcms_miaoshu;?></div>');
    //设置延时函数
    function adsUp(){
        $("#shiping_box").html('<iframe id="video" src="<?php
if (empty($panduan) && empty($panduan1)) {
	 $dyurl = str_replace('http://cps.youku.com/redirect.html?id=0000028f&url=', '', "$c[0]");
	echo"$mjk$dyurl";
}

 else{
	 if(!empty($b[0])){echo "$mjk$b[0]";}

	 else{
		 echo"$mjk$zyvi[1]";
		 }
	 }
	 ?>"  allowfullscreen="true" allowtransparency="true" style="width:100%;border:none"></iframe>');
    }
    //五秒钟后自动收起
    var t = setTimeout(adsUp,<?php echo $xtcms_miaoshu*1000;?>);

</script>
</div>

					<div class="footer clearfix">

						<ul class="cleafix hidden-sm hidden-xs">
									<li><a class="btn btn-sm btn-default" id="btn-pre"><i class="icon iconfont icon-rewind1"></i> 上一集</a></li>
									<li class=""><a class="btn btn-sm btn-default" id="btn-next">下一集 <i class="icon iconfont icon-fastforward"></i></a></li>


						</ul>

						<span class="text-muted" id="xuji">正在为您播放-<?php echo $timu; ?><span class="js"></span></span>



					</div>
 <div class="footer clearfix" id="xlu" style="display:inline-block; height:auto; background:none">
                        <span class="text-muted" id="xlus">


<?php if($mjk!=""){ ?><a onclick="xldata(this)" data-jk="<?php echo $mjk; ?>" class="btn btn-sm btn-default">默认</a><?php } ?>
<?php
$jkjk=explode("\r\n",$xtcms_jiekou);
for($k=0;$k<count($jkjk);$k++){
$jkjk[$k]=explode('$',$jkjk[$k]);
echo '<a onclick="xldata(this)" data-jk="'.$jkjk[$k][1].'" class="btn btn-sm btn-default">'.$jkjk[$k][0].'</a>  ';
}
?>



						</span></div>
				</div>

				<div class="col-md-3 col-sm-12 padding-0">

					<div class="sidebar">
						<div class="hy-play-list play">
									<div class="item tyui" id="dianshijua">
									<div class="panel clearfix visible-sm visible-xs">
<div id="playlist1" class="playlist collapse in dianshijua">
<ul class="playlistlink-1 list-15256 clearfix">
<a id="btn-pre1" class="btn btn-sm btn-default" style='width:48%;float:left'>上一集</a><a id="btn-next1" class="btn btn-sm btn-default" style='width:48%;float:left'>下一集</a></ul></div></div>

<div><marquee direction="left"><?php echo $xtcms_gonggao?></marquee></div>

<?php
if (empty($panduan) && empty($panduan1)) {
	echo '<div class="panel clearfix">
									<a class="option collapsed" data-toggle="collapse" data-parent="#playlist" href="#playlist1">点击播放<span class="text-muted pull-right"><i class="icon iconfont icon-right"></i></span></a>


                                    <div id="playlist1" class="playlist collapse in dianshijua">
										<ul class="playlistlink-1 list-15256 clearfix">

    <div class="ji-tab-content js-tab-content" style="opacity:0;">


            <div class="num-tab js-tabs">

                <div class="num-tab-main js-tab g-clear" style="display:">';
	foreach ($c as $kk => $vod) {
    $dyurl = str_replace('http://cps.youku.com/redirect.html?id=0000028f&url=', '', "$vod");
	$dyname = str_replace('付费', '免费', "$d[$kk]");
		//echo $much++;
		//echo $video.'<br/>';
		//echo $key.'<br/>';
		echo "<a href='$dyurl' id=''>";
		echo "$dyname</a>";
	}
echo '</div>
            </div>
</div></ul>


									</div>
						</div>';
} else {
	$i=0;
	foreach ($yuan as $vv => $ly) {
echo '<div class="panel clearfix">
									<a class="option collapsed" data-toggle="collapse" data-parent="#playlist" href="#playlist'.$ly.'">';
									echo unicode_decode("$yuanname[$vv]");
									echo'<span class="text-muted pull-right"><i class="icon iconfont icon-right"></i></span></a>
									<div id="playlist'.$ly.'" class="playlist collapse ';
if ($i==0){
echo 'in';
}
echo '"><ul class="playlistlink-1 list-15256 clearfix">

    <div class="ji-tab-content js-tab-content" style="opacity:0;">


            <div class="num-tab js-tabs">

                <div class="num-tab-main js-tab g-clear">';

 $site = $ly;
  $id=$xtcmsid;
  if ($xtcmstyle==tv){
  $category="2";
  }
  else{
 $category="4";
	  }
  $url = "http://www.360kan.com/cover/switchsite?site=".$site."&id=".$id."&category=".$category;
  $html = curl_get($url);
  $data=json_decode($html);

 $tvzz='#<div class="num-tab-main g-clear\s*js-tab"\s*(style="display:none;")?>[\s\S]+?<a data-num="(.*?)" data-daochu="to=(.*?)" href="(.*?)">[\s\S]+?</div>#';
   $tvzz1 = '#<a data-num="(.*?)" data-daochu="to=(.*?)" href="(.*?)">#';
   preg_match_all($tvzz, $data, $tvarr);
   $zcf = implode($glue, $tvarr[0]);
  preg_match_all($tvzz1,  $zcf, $tvarr);
  $b = $tvarr1[3];
  $yeshu=$tvarr1[1];

	foreach ($b as $yy => $tvurl) {
		echo "<a data-num='$yeshu[$yy]' href='$b[$yy]' class='btn-play-source'>";
		echo '第'.$yeshu[$yy].'集</a>';

	}

echo '</div>
            </div>
</div></ul>


									</div>
						</div>';
$i ++;}
	if (!empty($panduan1))

	echo '<div class="panel clearfix">
									<a class="option collapsed" data-toggle="collapse" data-parent="#playlist" href="#playlist1">点击播放<span class="text-muted pull-right"><i class="icon iconfont icon-right"></i></span></a>
									<div id="playlist1" class="playlist collapse in dianshijua">
										<ul class="playlistlink-1 list-15256 clearfix">

    <div class="ji-tab-content js-tab-content" style="opacity:0;">


            <div class="num-tab js-tabs">

                <div class="num-tab-main js-tab g-clear" style="display:">';
foreach ($zyvi as $keya=>$tvideoa){

		echo "<a data-num='$noqi[$keya]' href='$tvideoa'  style='width:48%;float:left'><img src='$zypic[$keya]' width=100%/><br>$noqi[$keya]<br>$zyname[$keya]</a>";


		}
		echo '</div>
                            </div>

</div></ul>


									</div>
						</div>';
}
?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 <script>
                $(function () {
                    $.each($('.num-tab.js-tabs'),function () {
                        if($(this).children('.num-tab-main').length>1){
                            $(this).children('.num-tab-main:eq(0)').remove();
                        }
                        $(this).children('.num-tab-main:eq(0)').children('a').addClass('am-btn am-btn-default lipbtn');

                    });
                    $('.ji-tab-content.js-tab-content').css('opacity',1)
                    $.each($('.lipbtn'),function () {
                        var url = $(this).attr('href');
                        $(this).attr('data-href',url);
                        $(this).attr('href','javascript:;');
                        $(this).attr('onclick','bofang(this)');
                    });
                    var biaoti = $('#xuji').text();
                    $('title').text(biaoti);
                    $('#xlus').children('a:eq(0)').addClass('jkbtn');
                    var autourl = $('.lipbtn:eq(0)').attr('data-href');
                    $('.lipbtn:eq(0)').attr('id','ys');
                    var text = $('.lipbtn:eq(0)').text();
                    $('.js').text('-'+text+'');
                    var jiekou = $('#xlus').children('a:eq(0)').attr('data-jk');
                    if(autourl!=''||autourl!=null){
                        setTimeout(function () {
                            $('#video').attr('src', jiekou + autourl);
                        },0)
                    }
					    // 上一集
    $("#btn-pre").click(function() {
        $("#ys.btn-play-source").prev().click();
    });

    // 下一集
    $("#btn-next").click(function() {
        $("#ys.btn-play-source").next().click();
    });
					    // 上一集
    $("#btn-pre1").click(function() {
        $("#ys.btn-play-source").prev().click();
    });

    // 下一集
    $("#btn-next1").click(function() {
        $("#ys.btn-play-source").next().click();
    });
                })
            </script>
            <script>
                function bofang(obj) {
                    var href = $(obj).attr('data-href');
                    var text = $(obj).text();
                    $('.js').text('-' + text+'');
                    $.each($('.lipbtn'), function () {
                        $(this).attr('id','');
                    });
                    $(obj).attr('id','ys');
                    var jiekou = $('.jkbtn').attr('data-jk');
                    if (href != '' || href != null) {
                        $('#video').attr('src', '/jzad');
                        setTimeout(function () {
                            $('#video').attr('src', jiekou + href);
                        },0)
                    }
                }
                function xldata(obj) {
                    var url = $(obj).attr('data-jk');
                    $.each($('.jkbtn'), function () {
                        $(this).removeClass('jkbtn');
                    });
                    $(obj).addClass('jkbtn');
                    var src = $('#ys').attr('data-href');
                    $('#video').attr('src', url + src);
                }


            </script>


<div class="container">
	<div class="row">
		<div class="col-md-9 col-sm-12 hy-main-content">

			<div class="hy-layout clearfix"><div style="margin-top:0px">



              <?php echo get_ad(13)?></div>
				<div class="hy-switch-tabs">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#list3" data-toggle="tab">剧情介绍</a></li>
											</ul>
				</div>
				<div class="tab-content">
					<div class="hy-play-list tab-pane fade in active" id="list3">
						<div class="item">
							<div class="plot">
								<?php echo $jian; ?></div>
						</div>
					</div>
				</div>
			</div>








			<div class="hy-layout clearfix">
				<div class="hy-video-list">
					<div class="hy-video-head">

						<h3 class="margin-0">猜你喜欢</h3>
					</div>
					<div class="swiper-container hy-switch">
						<div class="swiper-wrapper">
							<?php include 'data/like.php'; ?></div>
						<div class="swiper-button-next">
							<i class="icon iconfont icon-right"></i>
						</div>
						<div class="swiper-button-prev">
							<i class="icon iconfont icon-back"></i>
						</div>
					</div>

				</div>
			</div>

			<div class="hy-layout clearfix">
				<div class="hy-video-head">
					<h3 class="margin-0">影片评论</h3>
				</div>
				<div class="ff-forum" id="ff-forum" data-id="37432" data-sid="1">
<?php echo $xtcms_changyan; ?>
</div>
			</div>
		</div>



		<div class="col-md-3 col-sm-12 hy-main-side hidden-sm hidden-xs">
			<div class="hy-layout clearfix">
				<div class="hy-details-qrcode side clearfix">
					<div class="item">
						<h5 class="text-muted">关注微信号手机观看更方便</h5>
						<p>
						<img src="<?php echo $xtcms_weixin;?>" width="250">
						</p>
						<p class="text-muted">
							分享到朋友圈
						</p>
					</div>
				</div>
				<div class="hy-video-ranking side clearfix">
					<div class="head">
						<a class="text-muted pull-right" href="./vlist.php">更多 <i class="icon iconfont icon-right"></i></a>
						<h4><i class="icon iconfont icon-top text-color"></i> 抢先看资源</h4>
					</div>
					<div class="item">
						<ul class="clearfix">
						<?php $result = mysql_query('select * from xtcms_vod order by d_id desc LIMIT 0,12');
		while ($row = mysql_fetch_array($result)){
$cc="./bplay.php?play=";
								$dd="../../bplay/";
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
			</div>
		</div>
	</div>
</div>

<span class="ff-hits" id="ff-hits-insert" data-id="37432" data-sid="vod" data-type="insert"></span>		<script>
	    var swiper = new Swiper('.hy-switch', {
	        pagination: '.swiper-pagination',
	        paginationClickable: true,
	        slidesPerView: 5,
	        spaceBetween: 0,
	        nextButton: '.swiper-button-next',
	        prevButton: '.swiper-button-prev',
	        breakpoints: {
	            1200: {
	                slidesPerView: 4,
	                spaceBetween: 0
	            },
	            767: {
	                slidesPerView: 3,
	                spaceBetween: 0
	            }
	        }
	    });
	    </script>
<span class="ff-record-set" data-sid="1" data-id="37432" data-id-sid="1" data-id-pid="1">
</span>



<?php include 'footer.php'; ?><script type="text/javascript ">
					$MH.limit = 10;
					$MH.WriteHistoryBox(200, 170, 'font');
					$MH.recordHistory({
						name: '<?php echo $timu; ?>',
						link: '<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>',
						pic: '/m-992/uploads/allimg/201706/a0a13289528feabb.jpg'
					})
				</script>
