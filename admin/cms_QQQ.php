<?php

include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
?>
<?php include('inc_header.php') ?>
<script type="text/javascript">
KindEditor.ready(function(K) {
	K.create('#s_copyright');
	var editor = K.editor();
	K('#appewm').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
			imageUrl : K('#s_appewm').val(),
			clickFn : function(url, title, width, height, border, align) {
				K('#s_appewm').val(url);
				editor.hideDialog();
				}
			});
		});
	});
	K('#appbt').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
			imageUrl : K('#s_appbt').val(),
			clickFn : function(url, title, width, height, border, align) {
				K('#s_appbt').val(url);
				editor.hideDialog();
				}
			});
		});
	});
	K('#apppic').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
			imageUrl : K('#s_apppic').val(),
			clickFn : function(url, title, width, height, border, align) {
				K('#s_apppic').val(url);
				editor.hideDialog();
				}
			});
		});
	});
});
</script>
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
							<h2>QQ群对接教程</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>QQ群影视搜索对接教程</h6>
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
													<label for="name-w1"><font color="#FF0000"><h5>开源版无法提供此项服务！</h5></font></label>
													</div>
												</div>
<div class="row">


													</div>
													</div>
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
