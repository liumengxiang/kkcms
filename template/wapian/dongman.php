<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <?php include 'head.php';
  $dm = 'class="active"' ?>
  <title>动漫列表-<?php echo $xtcms_seoname; ?></title>
  <meta name="keywords" content="动漫排行,<?php echo $xtcms_keywords; ?>">
  <meta name="description" content="<?php echo $xtcms_description; ?>">
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="container">
    <div class="row" style="margin-top:10px"><?php echo get_ad(11) ?></div>
    <div class="row">
      <div class="hy-layout clearfix">
        <div class="hy-min-screen clearfix">
          <div class="item clearfix">
            <dl class="clearfix">
              <dt class="text-muted">按剧情</dt>
              <dd class="clearfix">

                <a href="?m=/dongman/list.php?cat=all&page=1" class="acat" style="white-space: pre-wrap;">全部</a>
                <a href="?m=/dongman/list.php?cat=100&">热血</a>

                <a href="?m=/dongman/list.php?cat=101&">恋爱</a>

                <a href="?m=/dongman/list.php?cat=102&">美少女</a>

                <a href="?m=/dongman/list.php?cat=103&">运动</a>

                <a href="?m=/dongman/list.php?cat=104&">校园</a>

                <a href="?m=/dongman/list.php?cat=105&">搞笑</a>

                <a href="?m=/dongman/list.php?cat=108&">悬疑</a>

                <a href="?m=/dongman/list.php?cat=107&">冒险</a>

                <a href="?m=/dongman/list.php?cat=109&">魔幻</a>

                <a href="?m=/dongman/list.php?cat=132&">新番动画</a>
                <a href="?m=/dongman/list.php?cat=123&">青春</a><a href="?m=/dongman/list.php?cat=119&">竞技</a>
                <a href="?m=/dongman/list.php?cat=other&">其他</a></dd>
            </dl>
            <dl class="cleafix">
              <dt class="text-muted">按年份</dt>
              <dd class="clearfix">
                <a href="?m=/dongman/list.php?area=all&pageno=1">全部</a>
                <a href="?m=/dongman/list.php?year=2018&">2018</a>

                <a href="?m=/dongman/list.php?year=2017&">2017</a>

                <a href="?m=/dongman/list.php?year=2016&">2016</a>

                <a href="?m=/dongman/list.php?year=2015&">2015</a>

                <a href="?m=/dongman/list.php?year=2014&">2014</a>

                <a href="?m=/dongman/list.php?year=other&">更早</a>

                <a href="?m=/dongman/list.php?year=2013&">2013</a>

                <a href="?m=/dongman/list.php?year=2012&">2012</a>

                <a href="?m=/dongman/list.php?year=2011&">2011</a>

                <a href="?m=/dongman/list.php?year=2010&">2010</a>

                <a href="?m=/dongman/list.php?year=2009&">2009</a></dd>
            </dl>
            <dl class="cleafix hidden-sm">
              <dt class="text-muted">按地区</dt>
              <dd class="clearfix">
                <a href="?m=/dongman/list.php?area=all&page=1">全部</a>
                <a href="?m=/dongman/list.php?area=10&">大陆</a>

                <a href="?m=/dongman/list.php?area=12&">美国</a>

                <a href="?m=/dongman/list.php?area=11&">日本</a>

            </dl>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row" style="margin-top:0px"><?php echo get_ad(11) ?></div>
      </div>
      <div class="hy-layout clearfix" style="margin-top: 10px;">
        <div class="hy-switch-tabs active clearfix">
          <span class="text-muted pull-right hidden-xs">如果您喜欢本站请动动小手分享给您的朋友！</span>
          <ul class="nav nav-tabs">
            <?php
            $b = (strpos($_GET['m'], 'rank='));
            $ye = substr($_GET['m'], $b + 5);
            ?>
            <li <?php if ($ye == "rankhot") {
                  echo 'class="active"';
                } elseif ($ye == "createtime") { } else {
                  echo 'class="active"';
                }; ?>><a href="?m=/dongman/list.php?rank=rankhot&page=1">最近热映</a></li>
            <li <?php if ($ye == "createtime") {
                  echo 'class="active"';
                } else { }; ?>><a href="?m=/dongman/list.php?rank=createtime&page=1">最近上映</a></li>
          </ul>
        </div>
        <div class="hy-video-list">
          <div class="item">
            <ul class="clearfix">
              <?php
              $flid1 = $_GET['m'];
              if ($flid1 == "") {
                $flid1 = '/dongman/list.php?rank=rankhot&page=1';
              }
              include 'system/360.php';
              foreach ($xname as $key => $xvau) {
                $do = $xlist[$key];
                $do1 = $do;
                $cc = "./play.php?play=";
                if ($xtcms_wei == 1) {
                  $ccb = vod . $do1;
                } else {
                  $ccb = $cc . $do1;
                }
                $xvau = str_replace("{title}", '广告位招租', "$xvau");
                $ccb = str_replace("./play.php?play={coverpage}", "$xtcms_domain", "$ccb");
                echo '<div class="col-md-2 col-sm-3 col-xs-4">
							<a class="videopic lazy" href="' . $ccb . '" title="' . $xvau . '" data-original="' . $ximg[$key] . '" style="background: url(./style/load.gif) no-repeat; background-position:50% 50%; background-size: cover;"><span class="play hidden-xs"></span><span class="score">' . $xjishu[$key] . '</span></a>
							<div class="title">
								<h5 class="text-overflow"><a href="' . $ccb . '">' . $xvau . '</a></h5>
							</div>
							<div class="subtitle text-muted text-muted text-overflow hidden-xs">' . $xstar[$key] . '</div>
						</div>';
              } ?>

            </ul>
          </div>
        </div>
        <div class="hy-page clearfix">
          <ul class="cleafix">
            <ul class="stui-page text-center cleafix">
              <?php echo getPageHtml($page, $fenye, 'dongman.php?m=' . $yourneed . '&page='); ?><li><a>共<?php echo $fenye; ?>页</a></li>
            </ul>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    var w = document.documentElement ? document.documentElement.clientWidth : document.body.clientWidth;
    if (w > 640) {
      $(".collapse").addClass("in");
    }
  </script>
  <div class="container">
    <div class="row" style="margin-top:0px"><?php echo get_ad(8) ?></div>
  </div>
  <?php include 'footer.php'; ?>
