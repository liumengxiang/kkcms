<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/user.php');
?>

<?php include('inc_header.php') ?>

<script type="text/javascript">
	$(function(){
		//操作执行验证
		$('#execute').click(function(){
			if ($('#execute_method').val() == ''){
				alert('请选择一项要执行的操作！');
				return false;
			};
			if ($('input[name="id[]"]').val() = ''){
				alert('请至少选择一项！');
				return false;
			};
		});
		//频道转移验证
		$('#shift').click(function(){
			if ($('#shift_target').val() == ''){
				alert('请选择要转移到的频道！');
				return false;
			};
			if ($('input[name="id[]"]').val() = ''){
				alert('请至少选择一项！');
				return false;
			};
		});
		//搜索验证
		$('#search').click(function(){
			if ($('#key').val() == ''){
				alert('请输入要查找的关键字');
				$('#key').focus();
				return false;
			};
		});
	});
	function check_all(cname) {
	$('input[name="'+cname+'"]:checkbox').each(function(){
		this.checked = !this.checked;
	});
}
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
							<h2>会员管理</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										

<div class="row">		
						<div class="col-lg-12">
							<div class="panel">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-table red"></i><span class="break"></span>会员管理</h6>

								</div>
								<div class="panel-body">
									<div class="table-responsive">
<form method="get" class="form-auto oh mb10" >
						<div  style="float:right;margin-bottom:10px; width:50%">
						<div class="input-group">
													<input type="text" id="input2-group2" name="key" class="form-control" placeholder="按名称查找" />
													<span class="input-group-btn">
													<button type="submit" id="search" class="btn btn-success" name="search">搜</button>
													</span>
												</div>

						</div>
<div class="fl">
<a class="bk-margin-5 btn btn-primary" href="cms_user_add.php"><span class="icon-plus-square">添加会员</span></a>
						</div>
					</form>									
										<form method="post" class="form-auto"><table class="table table-striped table-bordered bootstrap-datatable datatable">
											<thead>
												<tr>
													<th width="40" align="center">选择</th>
								<th>名称</th>
								<th>会员组</th>
								<th>状态</th>
								<th>最后登录</th>
								<th>登录次数</th>
								<th>修改</th>
												</tr>
											</thead>   
											<tbody>								
<?php

									$sql = 'select * from xtcms_user order by u_id desc';
									$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
									$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
				
							if (isset($_GET['key'])) {
								$sql = 'select * from xtcms_user where u_name like "%'.$_GET['key'].'%" order by u_id desc';
								$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							}
							while($row= mysql_fetch_array($result)){
							?>
							<tr>
								<td>
								<div class="checkbox-custom checkbox-default">
															<input type="checkbox" name="id[]" value="<?php echo $row['u_id'] ?>" />
															<label for="checkboxExample2"></label>
														</div></td>
								<td><?php echo $row['u_name'] ?></td>
								<td><?php echo get_usergroup_name($row['u_group'])?></td>
								<td>
<?php
									echo ($row['u_status'] == 1 ? '<span class="badge bg-main">启用</span> ':'');
									echo ($row['u_status'] == 0 ? '<span class="badge bg-dot">禁用</span> ':'');
									
									?>
								</td>
								<td>
<?php echo $row['u_logintime'] ?>
								</td>
								<td><?php echo $row['u_loginnum'] ?></td>
								<td><a class="btn btn-info" href="cms_user_edit.php?id=<?php echo $row['u_id']?>"><span class="icon-edit"> 修改</span></a></td>
							</tr>
							<?php } ?>
							<tr>
								<td><span class="bk-margin-5 btn btn-primary" onclick="check_all('id[]')">选</span></td>
								<td colspan="2">
									<select id="execute_method" class="btn btn-default" name="execute_method">
										<option value="">请选择操作</option>
										<option value="status">启用</option>
										<option value="status1">禁用</option>
										<option value="delete">删除选中</option>
									</select>
									<input type="submit" id="execute" class="bk-margin-5 btn btn-primary" name="execute" onclick="return confirm('确定要执行吗')" value="执行" /></td>
								<td colspan="4">

								</td>
							</tr>
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
