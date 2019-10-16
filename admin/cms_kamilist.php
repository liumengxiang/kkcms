<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);

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
									<div class="panel-actions">
										<a href="#" class="btn-setting"><i class="fa fa-rotate-right black"></i></a>
										<a href="#" class="btn-minimize"><i class="fa fa-chevron-up black"></i></a>
										<a href="#" class="btn-close"><i class="fa fa-times black"></i></a>
									</div>
								</div>
								<div class="panel-body">
									<div class="table-responsive">	
									<form method="get" class="form-inline" ><div class="fl">
							筛选：
							<select class="form-control" onchange="location.href='cms_kamilist.php?c_used='+this.options[this.selectedIndex].value;">
								<option value="">使用情况</option>
								<option value="1" >已使用</option>	<option value="0">未使用</option>						</select>
								<input id="c_pass" class="form-control" type="text" name="c_number" placeholder="卡密"/>
									<input id="id" class="input" type="hidden" name="id" value="<?php echo $_GET["id"] ?>"/>
							<input type="submit" id="search" class="btn btn-info" name="search" value="查找" />
<a class="btn btn-info" href="cms_dao.php<?php if (isset($_GET['id'])) { echo '?cpass='.$_GET["id"];}?>"><span class="icon-plus-square">导出</span></a>
						</div>

					</form>
										<form method="post" class="form-auto"><table class="table table-striped table-bordered bootstrap-datatable datatable">
											<thead>
												<tr>
													<th>编号</th>
								<th>充值卡密</th>
								<th>卡密天数</th>
								<th>点卡标识</th>
								<th>使用情况</th>
								<th>使用者</th>
								<th>充值时间</th>
								<th>会员组</th>
												</tr>
											</thead>   
											<tbody>								
<?php

									$sql = 'select * from xtcms_user_card order by c_id desc';
									$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
									$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
						if (isset($_GET['id'])) {
								$sql = 'select * from xtcms_user_card where c_pass="'.$_GET['id'].'" order by c_id desc';
								$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							}
				
							if (isset($_GET['c_used'])) {
								$sql = 'select * from xtcms_user_card where c_used="'.$_GET['c_used'].'" order by c_id desc';
								$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							}
							if (isset($_GET['c_number'])) {
								$sql = 'select * from xtcms_user_card where c_number like "%'.$_GET['c_number'].'%" and c_pass="'.$_GET['id'].'" order by c_id desc';
								$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							}
							while($row= mysql_fetch_array($result)){
							?>
							<tr>
								<td><?php echo $row['c_id'] ?></td>
								<td><?php echo $row['c_number'] ?></td>
								<td><?php echo $row['c_money'] ?></td>
								<td><?php echo $row['c_pass'] ?></td>
								<td>
<?php
									echo ($row['c_used'] == 1 ? '<span class="badge bg-dot">已使用</span> ':'');
									echo ($row['c_used'] == 0 ? '<span class="badge bg-main">未使用</span> ':'');
									
									?>
								</td>
								<td>
<?php echo $row['c_user'] ?>
								</td>
								<td><?php if ($row['c_usetime']>0){echo date('Y-m-d H:i:s',$row['c_usetime']);}else{echo"未使用";}?></td>
<td><?php
							$result1 = mysql_query('select * from xtcms_user_group where ug_id="'.$row['c_userid'].'"');
							while($row1 = mysql_fetch_array($result1)){
						?>
						<?php echo $row1['ug_name']?>
<?php
							}
						?></td>
							</tr>
							<?php } ?>
											</tbody>
										</table>
										</form>
					<div class="page_show"><?php echo page_show($pager[2],$pager[3],$pager[4],2);?> </div>
									</div>
								</div>
							</div>
						</div>					
					</div>
					
				</div>
				<!-- End Main Page -->			
		
<?php include('inc_footer.php') ?>
