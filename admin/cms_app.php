<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/app.php');
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
							<h2>APP设置</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>APP设置</h6>
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
													<label for="name-w1">二维码</label>
									<div class="input-group">
									<input id="s_appewm" class="form-control" name="s_appewm" type="text" size="60" value="<?php echo $row['s_appewm']?>" />
													<span class="input-group-btn">
													<button type="button" class="btn btn-success" id="appewm">UP</button>
													</span>
												</div>
													</div>
												</div>
<div class="row">
													<div class="col-md-12">
													<label for="name-w1">标题图片</label>
									<div class="input-group">
									<input id="s_appbt" class="form-control" name="s_appbt" type="text" size="60" value="<?php echo $row['s_appbt']?>" />
													<span class="input-group-btn">
													<button type="button" class="btn btn-success" id="appbt">UP</button>
													</span>
												</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
													<label for="name-w1">手机演示图</label>
									<div class="input-group">
									<input id="s_apppic" class="form-control" name="s_apppic" type="text" size="60" value="<?php echo $row['s_apppic']?>" />
													<span class="input-group-btn">
													<button type="button" class="btn btn-success" id="apppic">UP</button>
													</span>
												</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
													<label for="name-w1">app下载地址</label>
														<div class="form-group has-feedback">
															<input id="s_appkey" class="form-control" name="s_appurl" type="text" size="60" value="<?php echo $row['s_appurl']?>" />
														</div>
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
