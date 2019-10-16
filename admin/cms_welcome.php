<?php
include('../system/inc.php');
include('cms_check.php');
$seach=file_get_contents('https://www.360kan.com/dianshi/list.php');
$szz='#安装360影视大全APP，免费观看<span>(.*?)</span>部热门大片#';
preg_match_all($szz,$seach,$sarr);
$one=$sarr[1];//标题
?>
<?php include('inc_header.php') ?>
		<!-- Start: Content -->
		<div class="container-fluid content">
			<div class="row">
<?php include('inc_left.php') ?>
				<!-- Main Page -->
				<div class="main ">
					<!-- Page Header -->
					<div class="page-header">
						<div class="pull-left">
							<ol class="breadcrumb visible-sm visible-md visible-lg">
								<li><a href="cms_welcome.php"><i class="icon fa fa-home"></i>首页</a></li>
							</ol>
						</div>
						<div class="pull-right">
							<h2>&#75;&#75;&#67;&#77;&#x53;&#31995;&#32479;&#27010;&#20917;</h2>
						</div>
					</div>
					<!-- End Page Header -->

					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel bk-widget bk-border-off bk-noradius">
								<div class="bk-border-danger bk-bg-white bk-fg-danger bk-ltr bk-padding-15">
									<div class="row">
										<div class="col-xs-4 text-left bk-vcenter bk-padding-off">
											<span class="bk-round bk-icon bk-icon-3x bk-bg-danger bk-border-off">
												<i class="fa fa-users fa-3x"></i>
											</span>
										</div>
										<div class="col-xs-8 text-center bk-vcenter">
											<h6 class="bk-margin-off">会员数量</h6>
											<h4 class="bk-margin-off"><?php $sql="SELECT COUNT(*) AS count FROM xtcms_user";
$result=mysql_fetch_array(mysql_query($sql));
$count=$result['count']; echo $count;?></h4>
										</div>
									</div>
									<div class="progress bk-margin-off-bottom bk-margin-top-10 bk-noradius" style="height: 6px;">
										<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: <?php $sql="SELECT COUNT(*) AS count FROM xtcms_user";
$result=mysql_fetch_array(mysql_query($sql));
$count=$result['count']; echo round($count/1000);?>%;">
											<span class="sr-only">90% Complete</span>
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel bk-widget bk-border-off">
								<div class="bk-border-primary bk-bg-white bk-fg-primary bk-ltr bk-padding-15">
									<div class="row">
										<div class="col-xs-4 text-left bk-vcenter bk-padding-off">
											<span class="bk-round bk-border-off bk-icon bk-icon-3x bk-bg-primary">
												<i class="fa fa-globe fa-3x"></i>
											</span>
										</div>
										<div class="col-xs-8 text-center bk-vcenter">
											<h6 class="bk-margin-off">今日更新</h6>
											<h4 class="bk-margin-off">null
</h4>
										</div>
									</div>
									<div class="progress bk-margin-off-bottom bk-margin-top-10 bk-noradius" style="height: 6px;">
										<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
											<span class="sr-only">0% Complete</span>
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel bk-widget bk-border-off bk-noradius">
								<div class="bk-border-success bk-bg-white bk-fg-success bk-ltr bk-padding-15">
									<div class="row">
										<div class="col-xs-4 text-left bk-vcenter bk-padding-off">
											<span class="bk-round bk-border-off bk-icon bk-icon-3x bk-bg-success">
												<i class="fa fa-download fa-3x"></i>
											</span>
										</div>
										<div class="col-xs-8 text-center bk-vcenter">
											<h6 class="bk-margin-off">视频数量</h6>
											<h4 class="bk-margin-off"><?php $sql="SELECT COUNT(*) AS count FROM xtcms_vod";
$result=mysql_fetch_array(mysql_query($sql));
$count=$result['count'];
foreach ($one as $ni=>$cs){
echo $cs+$count;
}?></h4>
										</div>
									</div>
									<div class="progress bk-margin-off-bottom bk-margin-top-10 bk-noradius" style="height: 6px;">
										<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php $sql="SELECT COUNT(*) AS count FROM xtcms_vod";
$result=mysql_fetch_array(mysql_query($sql));
$count=$result['count'];
foreach ($one as $ni=>$cs){
echo round(100000000/$cs);
}?>%;">
											<span class="sr-only">80% Complete</span>
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel bk-widget bk-border-off bk-noradius">
								<div class="bk-border-warning bk-bg-white bk-fg-warning bk-ltr bk-padding-15">
									<div class="row">
										<div class="col-xs-4 text-left bk-vcenter bk-padding-off">
											<span class="bk-round bk-border-off bk-icon bk-icon-3x bk-bg-warning">
												<i class="fa fa-shopping-cart fa-3x"></i>
											</span>
										</div>
										<div class="col-xs-8 text-center bk-vcenter">
											<h6 class="bk-margin-off">订单数量</h6>
											<h4 class="bk-margin-off"><?php $sql="SELECT COUNT(*) AS count FROM xtcms_user_pay";
$result=mysql_fetch_array(mysql_query($sql));
$count=$result['count']; echo $count;?></h4>
										</div>
									</div>
									<div class="progress bk-margin-off-bottom bk-margin-top-10 bk-noradius" style="height: 6px;">
										<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: <?php $sql="SELECT COUNT(*) AS count FROM xtcms_user_pay";
$result=mysql_fetch_array(mysql_query($sql));
$count=$result['count']; echo round($count/1000);?>%;">
											<span class="sr-only">80% Complete</span>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

<div class="row">

						<div class="col-sm-12 col-xs-12">
							<div class="panel bk-widget bk-border-off bk-noradius">
								<div class="panel-body bk-bg-white text-center bk-fg-info bk-padding-top-15 bk-padding-bottom-15">
									<div class="row">
										<div class="col-xs-8 text-left bk-vcenter">
											<div class="">
												<h4 class="bk-margin-off">服务器信息</h4>
												Server information
											</div>
										</div>
										<div class="col-xs-4 bk-vcenter text-right">
											<i class="fa fa-globe fa-4x"></i>
										</div>
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row">
											<div class="col-xs-6">
												服务器操作系统
											</div>
											<div class="col-xs-6 text-right">
												<span class="label label-success bk-noradius"><?PHP echo PHP_OS; ?></span>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row">
											<div class="col-xs-6">
												服务器端信息：
											</div>
											<div class="col-xs-6 text-right">
												<span class="label label-warning bk-noradius"><?PHP echo $_SERVER ['SERVER_SOFTWARE']; ?>
</span>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row">
											<div class="col-xs-6">
												最大上传限制：
											</div>
											<div class="col-xs-6 text-right">
												<span class="label label-danger bk-noradius"><?PHP
echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件";
?>
</span>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row">
											<div class="col-xs-6">
												最大执行时间：
											</div>
											<div class="col-xs-6 text-right">
												<span class="label label-success bk-noradius"><?PHP echo get_cfg_var("max_execution_time")."秒 "; ?>
</span>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row">
											<div class="col-xs-6">
												脚本运行占用最大内存：
											</div>
											<div class="col-xs-6 text-right">
												<span class="label label-warning bk-noradius"><?PHP
echo get_cfg_var ("memory_limit")?get_cfg_var("memory_limit"):"无"
?>
</span>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row">
											<div class="col-xs-6">
												PHP程式版本：
											</div>
											<div class="col-xs-6 text-right">
												<span class="label label-danger bk-noradius"><?PHP echo PHP_VERSION; ?>
</span>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row">
											<div class="col-xs-6">
												ZEND版本：
											</div>
											<div class="col-xs-6 text-right">
												<span class="label label-success bk-noradius"><?PHP echo zend_version(); ?>
</span>
											</div>
										</div>
									</a>


<a href="//wslmf.com" target="_blank" class="list-group-item">
										<div class="row">
											<div class="col-xs-6">
												当前程序版本：
											</div>
											<div class="col-xs-6 text-right">
												<span class="label label-warning bk-noradius">
												V1.34
</span>
											</div>
										</div>
									</a>




  <a href="//wslmf.com" target="_blank" class="list-group-item">
										<div class="row">
											<div class="col-xs-6">

											</div>
											<div  style="text-align: center;" class="col-xs-12">
												&#24555;&#30475;&#67;&#77;&#x53;&#24433;&#x89c6;&#31995;&#32479;  <div class="desc">&#12304;&#x514d;&#36153;&#29256;&#12305;</div>
											</div>
										</div>
									</a>


								</div>
							</div>

						</div>
					</div>


				</div>
				<!-- End Main Page -->


<?php include('inc_footer.php') ?>
