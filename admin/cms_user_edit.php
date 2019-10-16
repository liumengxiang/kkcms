<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/user_edit.php');
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
							<h2>修改会员</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>修改会员</h6>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									<?php
					$result = mysql_query('select * from xtcms_user where u_id = '.$_GET['id'].'');
					if($row = mysql_fetch_array($result)){
					?>
										<form method="post"><div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">名称</label>
															<input id="u_name" class="form-control" name="u_name" type="text" size="60" data-validate="required:请输入名称" value="<?php echo $row['u_name'];?>" />
														</div>
													</div>
												</div>
<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">密码</label>
															<div class="form-group has-feedback">
									<input id="u_password" class="form-control" name="u_password" type="password" size="60" data-validate="required:请输入密码" value="<?php echo $row['u_password'];?>" />
													
												</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">状态</label>
<select id="u_status" class="form-control" name="u_status">
										
<option value="1" <?php echo ($row['u_status'] == 1 ? 'selected="selected"':'');?>>启用</option><option value="0" <?php echo ($row['u_status'] == 0 ? 'selected="selected"':'');?>>禁用</option>
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
							while($row1 = mysql_fetch_array($result)){
						?>
						<option value="<?php echo $row1['ug_id']?>" <?php echo ($row['u_group'] ==$row1['ug_id'] ? 'selected="selected"':'');?>><?php echo $row1['ug_name']?></option>
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
<input id="u_points" class="form-control" name="u_points" type="text" size="60"  value="<?php echo $row['u_points'];?>" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">email</label>
<input id="u_email" class="form-control" name="u_email" type="text" size="60"  value="<?php echo $row['u_email'];?>" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">起始时间</label>
<input id="u_start" class="form-control" name="u_start" type="text" size="60"  value="<?php echo date('Y-m-d h:i:s',$row['u_start']);?>" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">截止时间</label>
<input id="u_end" class="form-control" name="u_end" type="text" size="60"  value="<?php echo date('Y-m-d h:i:s',$row['u_end']);?>" />
														</div>
													</div>
												</div>
											</div>
											
											
										</div>
										<div class="actions">								
											<input type="submit" class="btn btn-info button-previous" name="save" value="提交" />

										</div>
										</form>
										<?php
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
