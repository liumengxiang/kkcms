<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php  include 'head.php';?>
<title><?php echo $timu;?></title>
<meta name="keywords" content="<?php echo $d_keywords;?>">
<meta name="description" content="<?php echo $d_description;?>">

</head>
<body class="vod-play">
<?php include 'header.php'; ?>
<div class="container">
<div class="row"  style="margin-top:10px"><?php echo get_ad(2)?></div>
	<div class="row">
		<div class="hy-player clearfix">
			<div class="item">
				<div class="col-md-9 col-sm-12 padding-0">
					<div class="info embed-responsive "  id="cms_player">
					<img id="addid" src="" style="display: none;width:100%;border: 0px solid #FF6651"><div id="shiping_box"></div>
					<a style="display:none" id="videourlgo" href=""></a>
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
        $("#shiping_box").html('<iframe allowFullscreen="true" src="<?php echo $fang;?>" id="video" style="width:100%;border:none" allowtransparency="true" allowfullscreen="true" frameborder="0" scrolling="no"></iframe>');  
    }
    //五秒钟后自动收起<iframe src="<?php echo $fang;?>" marginwidth="0" marginheight="0" border="0" scrolling="no" frameborder="0" topmargin="0" width="100%" height="600px"></iframe>
    var t = setTimeout(adsUp,<?php echo $xtcms_miaoshu*1000;?>); 
    
</script>
</div>
					<div class="footer clearfix">
						
						<span class="text-muted" id="xuji"></span>
					</div>
					<div class="footer clearfix" id="xlu" style="display:none; height:auto"><span class="text-muted" ></span></div>
				</div>
									<div class="col-md-3 col-sm-12 padding-0">
					<div class="sidebar">
						<div class="hy-play-list play">
							<div class="item tyui" id="dianshijuid">
								<div class="panel clearfix">
									<a class="option collapsed" data-toggle="collapse" data-parent="#playlist" href="#playlist1">点击播放<span class="text-muted pull-right"><i class="icon iconfont icon-right"></i></span></a>
									<div id="playlist1" class="playlist collapse in dianshijua">
										<ul class="playlistlink-1 list-15256 clearfix">
<div class="top-list-ji">
    <h2 class="title g-clear"><em class="a-bigsite a-bigsite-leshi"></em></h2>
    <div class="ji-tab-content js-tab-content" style="opacity:1;">
<?php
foreach ($iidd as $key => $iddd) {
	$lianjie = "mplay.php?mso=" . $ljie[$key];
?><a class='am-btn am-btn-default lipbtn' href='<?php echo $lianjie;?>'><?php echo $jjshu[$key];?></a><?php
}
?></ul>

									</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
var tishi = ('正在为您播放<?php echo $timu;?>');
document.getElementById('xuji').innerHTML = tishi;
	function bofang(mp4url,jiid){
		var tishi = ('正在为您播放<?php echo $timu;?> '+jiid+'');
		document.getElementById('xuji').innerHTML = tishi;
		document.getElementById('video').src=''+mp4url;
		
				//点击之后
document.getElementById('xuji').style.display='block';
document.getElementById('video').style.display='none';
function test() {
			document.getElementById('video').style.display='block';
		}
		setTimeout(test, 0);
	};
</script>
<?php echo get_ad(13)?>
<div class="container">
	<div class="row">
		<div class="col-md-9 col-sm-12 hy-main-content">
			

			<div class="hy-layout clearfix">
				<div class="hy-video-head">
					<h3 class="margin-0">影片评论</h3>
				</div>
				<div class="ff-forum" id="ff-forum" data-id="37432" data-sid="1">
<?php echo $xtcms_changyan; ?>
</div>
			</div>
		</div>
		<script type='text/javascript' src='<?php echo $xtcms_domain;?>style/js/view-history.js'></script>
<script>
var store = $.AMUI.store;var lishi = $('#xuji1').html();store.set('site','<?php echo $timu;?>');      	 store.set('siteurl','<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>');store.set('li',viewji)</script>

<script type="text/javascript">
 var temp = {type: "video", name: "<?php echo $d_title;?>",url: "<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>"};			
var histemp = store.get('history')? store.get('history'): [];
       for(var i=0; i<histemp.length; i++) {
            if(histemp[i].type == "video" && histemp[i].url == "<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>") {
                histemp.splice(i, 1); 
                break;
            }
        }
histemp.unshift(temp); 
store.set('history', histemp);
//alert(JSON.stringify(store.get("history")));
var doo = store.get("history");
//$("#sc").html('"+store.get('history')+"');
function qc () {
	store.clear();
		
}
		</script>
		<div class="col-md-3 col-sm-12 hy-main-side hidden-sm hidden-xs">
			<div class="hy-layout clearfix">
				<div class="hy-details-qrcode side clearfix">
					<div class="item">
						<h5 class="text-muted">扫一扫用手机观看</h5>
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
						<a class="text-muted pull-right" href="<?php echo $xtcms_domain;?>vlist.php?cid=0">更多 <i class="icon iconfont icon-right"></i></a>
						<h4><i class="icon iconfont icon-top text-color"></i> 抢先看资源</h4>
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



<?php include 'footer.php'; ?>
<script type="text/javascript ">
					$MH.limit = 10;
					$MH.WriteHistoryBox(200, 170, 'font');
					$MH.recordHistory({
						name: '<?php echo $d_name; ?>',
						link: '<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>',
						pic: '/m-992/uploads/allimg/201706/a0a13289528feabb.jpg'
					})
				</script>