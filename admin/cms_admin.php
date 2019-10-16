<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/admin.php');

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
							<h2>系统设置</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>添加管理员</h6>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									
										<form method="post"><div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">登录帐号</label>
															<input id="a_name" class="form-control" name="a_name" type="text" size="60" data-validate="required:请填写登录帐号" value="" />
														</div>
													</div>
												</div>
<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">登录密码</label>
															<input id="a_password" class="form-control" name="a_password" type="password" size="60" data-validate="required:请填写登录密码" value="" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">确认密码</label>
															<input id="a_cpassword" class="form-control" name="a_cpassword" type="password" size="60" data-validate="required:请填写确认密码,repeat#a_password:两次输入的密码不一致" value="" />
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
<div class="row">		
						<div class="col-lg-12">
							<div class="panel">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-table red"></i><span class="break"></span>现有管理员</h6>

								</div>
								<div class="panel-body">
									<div class="table-responsive">	
										<table class="table table-striped table-bordered bootstrap-datatable datatable">
											<thead>
												<tr>
													<th>序号</th>
													<th>登录帐号</th>
													<th>操作</th>
												</tr>
											</thead>   
											<tbody>								
												<?php
							$result = mysql_query('select * from xtcms_manager');
							while($row = mysql_fetch_array($result)){
						?><tr>
													<td><?php echo $row['m_id']?></td>
							<td><?php echo $row['m_name']?></td>
	
													<td>
<a class="btn btn-info" href="cms_admin_edit.php?id=<?php echo $row['m_id'];?>">
															<i class="fa fa-edit "></i>                                            
														</a>
														<a class="btn btn-danger" href="cms_admin.php?del=<?php echo $row['m_id'];?>">
															<i class="fa fa-trash-o "></i> 

														</a>
													</td>
												</tr>
<?php
						}
						?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>					
					</div>
					
				</div>
				<!-- End Main Page -->			
		
<?php include('inc_footer.php') ?>
