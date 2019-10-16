<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/kami.php');
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
							<h2>卡密管理</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">		
						<div class="col-lg-12">
							<div class="panel">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-table red"></i><span class="break"></span>卡密管理</h6>

								</div>
								<div class="panel-body">
									<div class="table-responsive">	
										<table class="table table-striped table-bordered bootstrap-datatable datatable">
											<thead>
												<tr>
<th>序号</th>
								<th>卡密名称</th>
								<th>卡密标识</th>
								<th>生成数量</th>
								<th>生成天数</th>
								<th>操作</th>
												</tr>
											</thead>   
											<tbody>								
<?php

									$sql = 'select * from xtcms_user_cardclass order by id desc';
									$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
									$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
							?>
							<tr>
							<td><?php echo $row['id'] ?></td>
								<td><?php echo $row['title'] ?></td>
								<td><?php echo $row['card_id'] ?></td>
								<td><?php echo $row['num'] ?></td>
								<td><?php echo $row['day'] ?></td>
								<td><a class="btn btn-info" href="cms_kamilist.php?id=<?php echo $row['card_id']?>"><span class="icon-edit">查看卡密</span></a> <a class="btn btn-danger" href="cms_kami.php?del=<?php echo $row['id']?>&id=<?php echo $row['card_id']?>" onclick="return confirm('确认要删除吗？')"><i class="fa fa-trash-o "></i></a></td>
							</tr>
							<?php } ?>
											</tbody>
										</table>
										<?php echo page_show($pager[2],$pager[3],$pager[4],2);?>
									</div>
								</div>
							</div>
						</div>					
					</div>
					
				</div>
				<!-- End Main Page -->			
		
<?php include('inc_footer.php') ?>
