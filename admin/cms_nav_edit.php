<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/nav_edit.php');
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
							<h2>导航管理</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>修改导航</h6>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									
<?php
					$result = mysql_query('select * from xtcms_nav where id = '.$_GET['id'].'');
					if($row = mysql_fetch_array($result)){
					?>
					<form method="post"><div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">名称</label>
															<input id="n_name" class="form-control" name="n_name" type="text" size="60" value="<?php echo $row['n_name'];?>" />
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">地址</label>
															<input id="n_url" class="form-control" name="n_url" type="text" size="60" value="<?php echo $row['n_url'];?>" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">排序</label>
															<input id="order" class="form-control" name="order" type="text" size="60"  value="<?php echo $row['order'];?>" />
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
