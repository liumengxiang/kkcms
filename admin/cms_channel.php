<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/channel.php');
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
							<h2>栏目管理</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										

<div class="row">		
						<div class="col-lg-12">
							<div class="panel">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-table red"></i><span class="break"></span>栏目管理</h6>

								</div>
								<div class="panel-body">
									<div class="table-responsive">	
										<form method="post" class="form-auto"><table class="table table-striped table-bordered bootstrap-datatable datatable">
											<thead>
												<tr>
<th>ID</th>
								<th>排序</th>
								<th>频道名称</th>
								<th>内容操作</th>
								<th>频道操作</th>
												</tr>
											</thead>   
											<tbody>								
												<?php echo channel_manage(0,0); ?>
											</tbody>
										</table>
										</form>
									</div>
								</div>
							</div>
						</div>					
					</div>
					
				</div>
				<!-- End Main Page -->			
		
<?php include('inc_footer.php') ?>