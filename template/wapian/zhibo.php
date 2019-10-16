<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8" />
	
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    
    <link href="skin/css/app.css" rel="stylesheet" type="text/css" />
    <script src="skin/js/jquery.min.js"></script>
    <script src="skin/js/common.js"></script>
    <script>var SitePath='/',SiteAid='',SiteTid='',SiteId='';</script>
<title>电视直播-<?php echo $xtcms_seoname;?></title>

<meta name="description" content="<?php echo $xtcms_description;?>">
	<meta name="keywords" content="<?php echo $xtcms_name;?>,<?php echo $xtcms_keywords;?>">
</head>

<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
<body>
        <header class="itopbar">
        <div class="iline mhide"></div>
        <div class="container">
            <h1 class="ilogo"><a href="/" title="logo"><img src="<?php echo $xtcms_logo;?>" alt="<?php echo $xtcms_name;?>在线直播"><span><?php echo $xtcms_name;?>在线直播</span></a></h1>
            <nav class="sitenav">
			<a href="/">首页</a>
			<a href="<?=$xtcms_domain?>movie.php?m=/dianying/list.php?cat=all&pageno=1">电影</a>
			<a href="<?=$xtcms_domain?>tv.php?u=/dianshi/list.php?cat=all&pageno=1">连续剧</a>
			<a href="<?=$xtcms_domain?>zongyi.php?m=/zongyi/list.php?cat=all&pageno=1">综艺</a>
			<a href="<?=$xtcms_domain?>dongman.php?m=/dongman/list.php?cat=all&pageno=1">动漫</a>
			<?php
						$result = mysql_query('select * from xtcms_nav');
						while($row = mysql_fetch_array($result)){
						?>
<a href="<?php echo $row['n_url'];?>" target="_blank"><?php echo $row['n_name'];?></a>
<?php
						}
						?></nav>
          
          
    </header>

    <div class="icon">
        <div class="container izb">
            <nav class="zb-nav"><a href="javascript:;" class="taba cur">央视频道</a><a href="javascript:;" class="taba">卫视频道</a><a href="javascript:;" class="taba">地方频道</a></nav>
            <div class="zb-con">
                <ul class="zb-list">
                    <li><a href="javascript:;" data-url="http://t.cn/RpFPVsE"><b><img src="skin/images/c1.png" /></b><span>CCTV 1</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFPN6v"><b><img src="skin/images/c2.png"/></b><span>CCTV 2</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RXQY4TK"><b><img src="skin/images/c3.png"/></b><span>CCTV 3</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFPrgx"><b><img src="skin/images/c4.png"/></b><span>CCTV 4</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RGXxHnd"><b><img src="skin/images/c5.png"/></b><span>CCTV 5</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFhJLn"><b><img src="skin/images/c6.png"/></b><span>CCTV 6</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFhhsh"><b><img src="skin/images/c7.png"/></b><span>CCTV 7</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFhSzl"><b><img src="skin/images/c8.png"/></b><span>CCTV 8</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFhwWm"><b><img src="skin/images/c9.png"/></b><span>CCTV 9</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFh2KW"><b><img src="skin/images/c10.png"/></b><span>CCTV 10</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFhyzk"><b><img src="skin/images/c11.png"/></b><span>CCTV 11</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFhU8c"><b><img src="skin/images/c12.png"/></b><span>CCTV 12</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFhb9z"><b><img src="skin/images/c13.png"/></b><span>CCTV 13</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFhqUF"><b><img src="skin/images/c14.png"/></b><span>CCTV 14</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFhtUX"><b><img src="skin/images/c15.png"/></b><span>CCTV 15</span></a></li>
                </ul>
                <ul class="zb-list hide">
                    <li><a href="javascript:;" data-url="http://t.cn/RLQqNvg"><b><img src="skin/images/hn.png" /></b><span>湖南卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/R6Jrh0y"><b><img src="skin/images/zj.png" /></b><span>浙江卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RVylk9M"><b><img src="skin/images/js.png" /></b><span>江苏卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RLcRIHw"><b><img src="skin/images/df.png" /></b><span>东方卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFzrnr"><b><img src="skin/images/bj.png" /></b><span>北京卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFzDXB"><b><img src="skin/images/ah.png" /></b><span>安徽卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFZvZn"><b><img src="skin/images/sd.png" /></b><span>山东卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFZL4M"><b><img src="skin/images/ha.png" /></b><span>河南卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFZqm8"><b><img src="skin/images/jx.png" /></b><span>江西卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFZVXT"><b><img src="skin/images/hlj.png" /></b><span>黑龙江卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFZxtl"><b><img src="skin/images/gd.png" /></b><span>广东卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFZXVc"><b><img src="skin/images/tj.png" /></b><span>天津卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFZNi6"><b><img src="skin/images/hub.png" /></b><span>湖北卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFZWZA"><b><img src="skin/images/heb.png" /></b><span>河北卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFZYop"><b><img src="skin/images/cq.png" /></b><span>重庆卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFZQHu"><b><img src="skin/images/dn.png" /></b><span>东南卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFZEC4"><b><img src="skin/images/sx1.png" /></b><span>山西卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFZuWA"><b><img src="skin/images/gx.png" /></b><span>广西卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFZBpR"><b><img src="skin/images/gz.png" /></b><span>贵州卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFZgD6"><b><img src="skin/images/sz.png" /></b><span>深圳卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFwP3U"><b><img src="skin/images/jl.png" /></b><span>吉林卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFwZUV"><b><img src="skin/images/ln.png" /></b><span>辽宁卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFw2zU"><b><img src="skin/images/sc.png" /></b><span>四川卫视</span></a></li>
                    <li><a href="javascript:;" data-url="http://t.cn/RpFw4ZA"><b><img src="skin/images/chc.png" /></b><span>CHC电影</span></a></li>
                </ul>
                <ul class="zb-list hide">
                    <p style="text-align: center;padding: 25px">敬请期待</p>
                </ul>
            </div>
        </div>
    </div>
 
    <span style="display:none"><script src="skin/js/tj.js"></script></span>
    <script src="skin/js/lazyload.min.js"></script>
    <script src="skin/js/app.js"></script>
    <div class="zb-plays">
        <div class="mask"></div>
        <div class="zb-play"><a href="javascript:;" class="close"><i class="iconfont">&#xe622;</i></a>
            <div class="ipcon" id="ipcon">
                <iframe id="frmLive" frameborder="0" scrolling="no" width="100%" src=""></iframe>
            </div>
        </div>
    </div>
    <script>
    
    var $a = $('.zb-nav a'),
        $ul = $('.zb-con ul'),
        $alast = $('.sitenav a:last-child'),
        $abtn = $('.zb-list li a');
    $alast.addClass('cur');
    $a.click(function() {
        var $this = $(this);
        var $t = $this.index();
        $a.removeClass();
        $this.addClass('cur');
        $ul.addClass('hide').removeClass('show');
        $ul.eq($t).addClass('show');
    });
    $abtn.on('click', function(e) {
        var vurl = $(this).attr("data-url");
        var w = document.documentElement ? document.documentElement.clientWidth : document.body.clientWidth;
        $('#frmLive').attr('src', vurl);
        if (w < 767) {
            $('#frmLive').height = 260;
        } else {
            $('#frmLive').height = 600;
        };
        $('html').addClass('show');
        e.stopPropagation();
    });
    $('.zb-plays .mask,.zb-plays .close').on('click', function() {
        $('html').removeClass('show');
        document.getElementById('frmLive').src = '';
    })
    $('.izbs').addClass('cur');
    $('.iapp').removeClass('cur');
    </script>
</body>

</html>