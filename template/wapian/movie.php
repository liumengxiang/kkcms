<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <?php include 'head.php';
  $movie = 'class="active"' ?>
  <title>看电影-2018最新好看的最新电影-<?php echo $xtcms_seoname; ?></title>
  <meta name="keywords" content="看电影,<?php echo $xtcms_keywords; ?>">
  <meta name="description" content="<?php echo $xtcms_description; ?>">
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="container">

    <div class="row" style="margin-top:10px"><?php echo get_ad(9) ?></div>
    <div class="row">
      <div class="hy-layout clearfix">
        <div class="hy-min-screen clearfix">
          <div class="item clearfix">
            <dl class="clearfix">
              <dt class="text-muted">按剧情</dt>
              <dd class="clearfix">
                <a href="?m=/dianying/list.php?cat=all&page=1">全部</a>


                <a href="?m=/dianying/list.php?cat=100&">爱情</a>

                <a href="?m=/dianying/list.php?cat=106&">动作</a>

                <a href="?m=/dianying/list.php?cat=103&">喜剧</a>

                <a href="?m=/dianying/list.php?cat=104&">科幻</a>

                <a href="?m=/dianying/list.php?cat=115&">悬疑</a>

                <a href="?m=/dianying/list.php?cat=112&">剧情</a>

                <a href="?m=/dianying/list.php?cat=105&">犯罪</a>

                <a href="?m=/dianying/list.php?cat=108&">战争</a>

                <a href="?m=/dianying/list.php?cat=113&">奇幻</a>

                <a href="?m=/dianying/list.php?cat=121&">古装</a>
                <a href="?m=/dianying/list.php?cat=102&">恐怖</a>
                <a href="?m=/dianying/list.php?cat=other&">其他</a>
              </dd>
            </dl>
            <dl class="cleafix">
              <dt class="text-muted">按年份</dt>
              <dd class="clearfix">
                <a href="?m=/dianying/list.php?area=all&pageno=1">全部</a>

                <a href="?m=/dianying/list.php?year=2018&">2018</a>

                <a href="?m=/dianying/list.php?year=2017&">2017</a>

                <a href="?m=/dianying/list.php?year=2016&">2016</a>

                <a href="?m=/dianying/list.php?year=2015&">2015</a>

                <a href="?m=/dianying/list.php?year=2014&">2014</a>

                <a href="?m=/dianying/list.php?year=other&">更早</a>

                <a href="?m=/dianying/list.php?year=2013&">2013</a>

                <a href="?m=/dianying/list.php?year=2012&">2012</a>

                <a href="?m=/dianying/list.php?year=2011&">2011</a>

                <a href="?m=/dianying/list.php?year=2010&">2010</a>

                <a href="?m=/dianying/list.php?year=2009&">2009</a>
              </dd>
            </dl>
            </dl>
            <dl class="cleafix hidden-sm">
              <dt class="text-muted">按地区</dt>
              <dd class="clearfix">
                <a href="?m=/dianying/list.php?area=all&page=1">全部</a>
                <a href="?m=/dianying/list.php?area=10&">大陆</a>

                <a href="?m=/dianying/list.php?area=15&">香港&nbsp;&nbsp;&nbsp;</a>

                <a href="?m=/dianying/list.php?area=18&">台湾</a>

                <a href="?m=/dianying/list.php?area=11&">美国</a>

                <a href="?m=/dianying/list.php?area=13&">韩国</a>

                <a href="?m=/dianying/list.php?area=14&">日本</a>

                <a href="?m=/dianying/list.php?area=21&">泰国</a>

                <a href="?m=/dianying/list.php?area=12&">新加坡</a>

                <a href="?m=/dianying/list.php?area=16&">英国</a>

                <a href="?m=/dianying/list.php?area=17&">德国</a>

                <a href="?m=/dianying/list.php?area=other&">其他</a></dd>
            </dl>
          </div>
        </div>
      </div>


      <div class="container">
        <div class="row" style="margin-top:0px"><?php echo get_ad(9) ?></div>
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
                } elseif ($ye == "createtime" or $ye == "rankpoint") { } else {
                  echo 'class="active"';
                }; ?>><a href="?m=/dianying/list.php?rank=rankhot&page=1">按最热</a></li>
            <li <?php if ($ye == "createtime") {
                  echo 'class="active"';
                } else { }; ?>><a href="?m=/dianying/list.php?rank=createtime&page=1">按最新</a></li>
            <li <?php if ($ye == "rankpoint") {
                  echo 'class="active"';
                } else { }; ?>><a href="?m=/dianying/list.php?rank=rankpoint&page=1">按好评</a></li>

          </ul>
        </div>
        <div class="hy-video-list">
          <div class="item">
            <ul class="clearfix">
              <?php
              $flid1 = $_GET['m'];
              if ($flid1 == "") {
                $flid1 = '/dianying/list.php?rank=rankhot&pageno=1';
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
							<a class="videopic lazy" href="' . $ccb . '" title="' . $xvau . '" data-original="' . $ximg[$key] . '" style="background: url(./style/load.gif) no-repeat; background-position:50% 50%; background-size: cover;">
							<span class="play hidden-xs"></span></a>
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
          <ul class="stui-page text-center cleafix">
            <?php echo getPageHtml($page, $fenye, 'movie.php?m=' . $yourneed . '&page='); ?><li><a>共<?php echo $fenye; ?>页</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row" style="margin-top:0px"><?php echo get_ad(8) ?></div>
  </div>
  <?php include 'footer.php'; ?>
