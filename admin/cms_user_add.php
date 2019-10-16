<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/user_add.php');
?>
<?php include('inc_header.php') ?>
<script type="text/javascript">
KindEditor.ready(function(K) {
	K.create('#s_copyright');
	var editor = K.editor();
	K('#picture').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
			imageUrl : K('#l_picture').val(),
			clickFn : function(url, title, width, height, border, align) {
				K('#l_picture').val(url);
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
							<h2>添加会员</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>添加会员</h6>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									
										<form method="post"><div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">名称</label>
															<input id="u_name" class="form-control" name="u_name" type="text" size="60" data-validate="required:请输入名称" value="" />
														</div>
													</div>
												</div>
<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">密码</label>
															<div class="form-group has-feedback">
									<input id="u_password" class="form-control" name="u_password" type="password" size="60" data-validate="required:请输入密码" value="" />
													
												</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">状态</label>
<select id="u_status" class="form-control" name="u_status">
										
<option value="1">启用</option><option value="0">禁用</option>
									</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">会员组</label>
																		<select id="u_group" class="form-control" name="u_group">
													<?php
							$result = mysql_query('select * from xtcms_user_group');
							while($row = mysql_fetch_array($result)){
						?>
						<option value="<?php echo $row['ug_id']?>"><?php echo $row['ug_name']?></option>
<?php
							}
						?>
									</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">积分</label>
															<input id="u_points" class="form-control" name="u_points" type="text" size="60"  value="0" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">email</label>
															<input id="u_email" class="form-control" name="u_email" type="text" size="60"  value="" />
														</div>
													</div>
												</div>
											</div>
											
											
										</div>
										<div class="actions">								
											<input type="submit" class="btn btn-info button-previous" name="save" value="提交" />

										</div>
										</form>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<!-- End Main Page -->			
		
<?php include('inc_footer.php') ?>
