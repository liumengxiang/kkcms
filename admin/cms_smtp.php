<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/smtp.php');
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
							<h2>邮件短信配置</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>邮件短信配置</h6>
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
													<label for="name-w1">SMTP服务器</label>
													<div class="form-group has-feedback">
<input id="s_smtp" class="form-control" name="s_smtp" type="text" size="60" data-validate="required:请填写SMTP服务器" value="<?php echo $row['s_smtp']?>" />
													</div></div>
												</div>
<div class="row">
													<div class="col-md-12">
													<label for="name-w1">SMTP帐号</label>
<div class="form-group has-feedback">
<input id="s_muser" class="form-control" name="s_muser" type="text" size="60" data-validate="required:SMTP帐号" value="<?php echo $row['s_muser']?>" />

													</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
													<label for="name-w1">SMTP密码</label>
									<div class="form-group has-feedback">
									<input id="s_mpwd" class="form-control" name="s_mpwd" type="text" size="60" data-validate="required:请填写SMTP密码" value="<?php echo $row['s_mpwd']?>" />
													</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
													<label for="name-w1">短信帐号</label>
														<div class="form-group has-feedback">
															<input id="s_smsname" class="form-control" name="s_smsname" type="text" size="60" value="<?php echo $row['s_smsname']?>" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
													<label for="name-w1">短信密码</label>
														<div class="form-group has-feedback">
<input id="s_smspass" class="form-control" name="s_smspass" type="text" size="60"  value="<?php echo $row['s_smspass']?>" />
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
