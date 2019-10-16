<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/player.php');
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
							<h2>播放器设置</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>添加播放器</h6>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									
										<form method="post"><div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">名称</label>
															<input id="n_name" class="form-control" name="n_name" type="text" size="60" value="" />
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">解析地址</label>
														<input id="n_url" class="form-control" name="n_url" type="text" size="60" value="http://" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">排序</label>
															<input id="order" class="form-control" name="order" type="text" size="60" data-validate="required:必填,plusinteger:请输入排序数字" value="0" />
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
									<h6><i class="fa fa-table red"></i><span class="break"></span>播放器管理</h6>

								</div>
								<div class="panel-body">
									<div class="table-responsive">	
										<table class="table table-striped table-bordered bootstrap-datatable datatable">
											<thead>
												<tr>
													<th>排序</th>
							<th>名称</th>
							<th>解析地址</th>
							<th>操作</th>
												</tr>
											</thead>   
											<tbody>								
												<?php
						$result = mysql_query('select * from xtcms_player');
						while($row = mysql_fetch_array($result)){
						?>
						<tr>
							<td><?php echo $row['order']?></td>
											<td><?php echo $row['n_name']?></td>
							<td><?php echo $row['n_url']?></td>
							<td><a class="btn btn-info" href="cms_player_edit.php?id=<?php echo $row['id']?>"><span class="icon-edit"> 修改</span></a> <a class="btn btn-danger" href="cms_player.php?del=<?php echo $row['id']?>" onclick="return confirm('确认要删除吗？')"><span class="icon-times"> 删除</span></a></td>
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
