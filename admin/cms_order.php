<?php
include('../system/inc.php');
include('cms_check.php');
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
							<h2>订单管理</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										

<div class="row">		
						<div class="col-lg-12">
							<div class="panel">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-table red"></i><span class="break"></span>订单管理</h6>

								</div>
								<div class="panel-body">
									<div class="table-responsive">
							
										<form method="post" class="form-auto"><table class="table table-striped table-bordered bootstrap-datatable datatable">
											<thead>
												<tr>
													<th width="40" align="center">ID</th>
								<th>订单编号</th>
								<th>会员</th>
								<th>金额</th>
								<th>时间</th>
								<th>状态</th>
								<th>会员套餐</th>
												</tr>
											</thead>   
											<tbody>								
<?php
									$sql = 'select * from xtcms_user_pay order by p_id desc';
									$pager = page_handle('page',10,mysql_num_rows(mysql_query($sql)));
									$result= mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');

							while($row= mysql_fetch_array($result)){
?>
							<tr>
								<td><?php echo $row['p_id'] ?></td>
								<td><?php echo $row['p_order'] ?></td>
								<td><?php echo $row['p_uid'] ?></td>
								<td><?php echo $row['p_price'] ?></td>
								<td><?php echo $row['p_time'] ?></td>
								<td>
								<?php
									echo ($row['p_status'] == 1 ? '<span class="label label-warning">成功</span> ':'');
									echo ($row['p_status'] == 0 ? '<span class="label label-danger">失败</span> ':'');
									?></td>
								<td><?php echo get_usergroup_name($row['p_group'])?></td>
							</tr>
							<?php } ?>

											</tbody>
										</table></form>
										<div class="page_show"><?php echo page_show($pager[2],$pager[3],$pager[4],2);?> </div>
									</div>
								</div>
							</div>
						</div>					
					</div>
					
				</div>
				<!-- End Main Page -->			
		
<?php include('inc_footer.php') ?>
