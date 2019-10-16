<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/adwei.php');
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
							<h2>广告位管理</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>添加广告位</h6>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									
										<form method="post"><div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">名称</label>
															<input id="n_name" class="form-control" name="n_name" type="text" size="60" data-validate="required:请填写广告名称"  value="" />
<span class="help-block">请输入广告位名称</span>
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
									<h6><i class="fa fa-table red"></i><span class="break"></span>广告位列表</h6>

								</div>
								<div class="panel-body">
									<div class="table-responsive">	
										<table class="table table-striped table-bordered bootstrap-datatable datatable">
											<thead>
												<tr>
													<th>序号</th>
													<th>名称</th>
													<th>调用代码</th>
													<th>操作</th>
												</tr>
											</thead>   
											<tbody>								
												<?php
						$result = mysql_query('select * from xtcms_adclass');
						while($row = mysql_fetch_array($result)){
						?><tr>
													<td><?php echo $row['id']?></td>
													<td><?php echo $row['name']?></td>
													<td>get_ad(<?php echo $row['id']?>)</td>
	
													<td>
														<a class="btn btn-danger" href="cms_adwei.php?del=<?php echo $row['id'];?>">
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
