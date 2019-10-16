<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/admin_edit.php');
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
							<h2>修改管理员</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>修改管理员</h6>
									<div class="panel-actions">
										<a href="#" class="btn-setting"><i class="fa fa-rotate-right black"></i></a>
										<a href="#" class="btn-minimize"><i class="fa fa-chevron-up black"></i></a>
										<a href="#" class="btn-close"><i class="fa fa-times black"></i></a>
									</div>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									<?php
					$result = mysql_query('select * from xtcms_manager where m_id = '.$_GET['id'].'');
					if($row = mysql_fetch_array($result)){
					?>
										<form method="post"><div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">登录帐号</label>
															<input id="a_name" class="form-control" name="a_name" type="text" size="60" data-validate="required:请填写登录帐号" value="<?php echo $row['m_name'];?>" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<label for="ccnumber-w1">登录密码</label>
															<input id="a_password" class="form-control" name="a_password" type="password" size="60" data-validate="required:请填写登录密码" value="" />
														</div>
													</div>
													
												</div>
												<div class="row">
													<div class="form-group col-sm-12">
														<label for="ccmonth-w1">确认密码</label>
<input id="a_cpassword" class="form-control" name="a_cpassword" type="password" size="60" data-validate="required:请填写确认密码,repeat#a_password:两次输入的密码不一致" value="" />
													</div>
						
												</div>
												
											</div>
											
											
										</div>
										<div class="actions">								
											<input type="submit" class="btn btn-info button-previous" name="save" value="提交" />

										</div>
										</form>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>

					
				</div>
				<!-- End Main Page -->			
		
<?php include('inc_footer.php') ?>
