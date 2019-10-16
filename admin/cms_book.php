<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/book.php');
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
							<h2>求片留言</h2>
						</div>					
					</div>
					<!-- End Page Header -->								

<div class="row">		
						<div class="col-lg-12">
							<div class="panel">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-table red"></i><span class="break"></span>留言列表</h6>

								</div>
								<div class="panel-body">
									<div class="table-responsive">	
										<form method="post" class="form-auto">
										<table class="table table-striped table-bordered bootstrap-datatable datatable">
											<thead>
												<tr>
													<th width="50">选择</th>
								<th>留言内容</th>
								<th>用户</th>
								<th>时间</th>
								<th>操作</th>
												</tr>
											</thead>   
											<tbody>								
												<?php

									$sql = 'select * from xtcms_book order by id desc';
									$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
									$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
							?>
							<tr>
								<td><div class="checkbox-custom checkbox-default">
															<input type="checkbox" name="id[]" value="<?php echo $row['id'] ?>" />
															<label for="checkboxExample2"></label>
														</div></td>
								<td><?php echo $row['content'] ?></td>
								<td><?php echo $row['userid'] ?></td>
								<td>
<?php echo $row['time'] ?>
								</td>
								<td><a class="btn btn-danger" href="cms_book_edit.php?id=<?php echo $row['id']?>"><span class="icon-edit">回复</span></a></td>
							</tr>
							<?php } ?>
							<tr><td><span class="bk-margin-5 btn btn-primary" onclick="check_all('id[]')">选</span></td>
								<td colspan="4">
									<select id="execute_method" class="btn btn-default dropdown-toggle" name="execute_method">
										<option value="">请选择操作</option>
								
										<option value="delete">删除选中</option>
									</select>
									<input type="submit" id="execute" class="bk-margin-5 btn btn-primary" name="execute" onclick="return confirm('确定要执行吗')" value="执行" /></td>

							</tr>
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
