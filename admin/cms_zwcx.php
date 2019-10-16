<?php
include('../system/inc.php');
include('cms_check.php');
include('../data/cxini.php');
error_reporting(0);
?>
<?php

if (isset($_POST['save'])) {
	$_data['s_dianshi'] = $_POST['s_dianshi'];
	$sql = 'update xtcms_system set ' . arrtoupdate($_data) . ' where id = 1';
	if (mysql_query($sql)) {
		alert_href('自动尝鲜设置修改成功!', 'cms_zwcx.php');
	} else {
		alert_back('修改失败!');
	}
} ?>
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
							<h2>自动尝鲜设置</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>自动尝鲜设置</h6>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									
										<?php
					$result = mysql_query('select * from xtcms_system where id = 1');
					if( $row = mysql_fetch_array($result)){
					?><form method="post">
					<div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-md-12">
													<label for="name-w1">是否开启首页今日推荐（自动尝鲜）</label>
													<div class="form-group has-feedback">
													<input type="radio" name="s_dianshi" value="1" <?php echo ($row['s_dianshi'] == 1 ) ? 'checked="checked"' : '' ; ?> />开启&nbsp;
<input type="radio" name="s_dianshi" value="0" <?php echo ( $row['s_dianshi'] == 0 ) ? 'checked="checked"' : '' ; ?> />关闭&nbsp;
													
													</div></div>
												</div>
<div class="row">
													<div class="col-md-12">
													<label for="name-w1">当前自动尝鲜源站地址 :<u> <?php  echo ($zwcx["zhanwai"]);?> </u></label>&nbsp;&nbsp;
													<a target="_blank" class="btn btn-warning" href="../data/cron_url.php">更新源站</a>
												<hr>	
<label for="name-w1">当尝鲜栏目中全部无图片时，请点击“更新源站” 来修复此问题！</label><p>
<label for="name-w1">更新源站5分钟后，源站地址没有改变就需要手动修改data/zwurl.txt中的尝鲜地址！</label><p>
<label for="name-w1"><a href="http://www.showdoc.cc/web/#/kkss?page_id=506403520628510" target="_blank"><font color="#FF0000"><u>!!!点击这里查看源站地址自动更新图文教程!!!</u></font></a></label>
													</div>
												</div>
												
											</div>
											
										
										</div>
										
										<div class="actions">								
											<input type="submit" class="btn btn-info button-previous" name="save" value="提交" />

										</div>
				</form><?php
						}
					?>
									</div>
								</div>
							</div>
						</div>
					</div>

					
				</div>
				<!-- End Main Page -->			
		
<?php include('inc_footer.php') ?>
