<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/detail.php');
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
							<h2>视频管理</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										

<div class="row">		
						<div class="col-lg-12">
							<div class="panel">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-table red"></i><span class="break"></span>视频管理</h6>

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
						<div style="float:left;margin-bottom:10px">
							按频道筛选：
							<select class="btn btn-default dropdown-toggle" onchange="location.href='cms_detail.php?cid='+this.options[this.selectedIndex].value;">
								<option value="0">全部</option>
								<?php
								echo channel_select_list(0,0,$_GET['cid'],0);
								if(isset($_GET['key'])){
									echo '<option selected="selected" >搜索结果</option>';
								}
								?>
							</select>
						</div>
					</form>
					
					<form method="post" class="form-auto">									
										<table class="table table-striped table-bordered bootstrap-datatable datatable">
											<thead>
												<tr>
								<th width="40" align="center">选择</th>
								<th>视频名称</th>
								<th>所属频道</th>
								<th>属性</th>
								<th>所需积分</th>
								<th>修改</th>
												</tr>
											</thead>   
											<tbody>								
												<?php
							if (isset($_GET['cid'])) {
								if ($_GET['cid'] != 0){
									$sql = 'select * from xtcms_vod where d_parent in ('.$_GET['cid'].') order by d_id desc';
									$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
									$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
								}else{
									$sql = 'select * from xtcms_vod order by d_id desc';
									$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
									$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
								}
							}
							if (isset($_GET['key'])) {
								$sql = 'select * from xtcms_vod where d_name like "%'.$_GET['key'].'%" order by d_id desc';
								$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							}
							while($row= mysql_fetch_array($result)){
							?>
							<tr>
								<td align="center" algin="center">
								<div class="checkbox-custom checkbox-default">
															<input type="checkbox" name="id[]" value="<?php echo $row['d_id'] ?>" />
															<label for="checkboxExample2"></label>
														</div>
</td>
								<td><?php echo '<a href="../bplay.php?play='.$row['d_id'].'" target="_blank" class="btn btn-success">'.$row['d_name'].'</a>' ?></td>
								<td><?php echo get_channel_name($row['d_parent'])?></td>
								<td>
									<?php
									echo ($row['d_rec'] == 1 ? '<span class="label label-warning">荐</span> ':'');
									echo ($row['d_hot'] == 1 ? '<span class="label label-danger">热</span> ':'');
									echo ($row['d_picture'] != '' ? '<span class="label label-success">图</span>':'');
									?>
								</td>
								<td><?php echo $row['d_jifen'] ?></td>
								<td><a class="btn btn-info" href="cms_detail_edit.php?id=<?php echo $row['d_id']?>"><span class="icon-edit"> 修改</span></a></td>
							</tr>
							<?php } ?>
							<tr>
								<td><span class="bk-margin-5 btn btn-primary" onclick="check_all('id[]')">选</span></td>
								<td colspan="2">
									<select id="execute_method" class="btn btn-default dropdown-toggle" name="execute_method">
										<option value="">请选择操作</option>
										<option value="srec">设为推荐（将会添加到首页抢先看栏目）</option>
										<option value="crec">取消推荐（取消首页抢先看推荐）</option>
										<option value="shot">设为热门</option>
										<option value="chot">取消热门</option>
										<option value="delete">删除选中</option>
									</select>
									<input type="submit" id="execute" class="bk-margin-5 btn btn-primary" name="execute" onclick="return confirm('确定要执行吗')" value="执行" /></td>
								<td colspan="4">
									<select id="shift_target" class="btn btn-default dropdown-toggle" name="shift_target">
										<option value="">请选择目标频道</option>
										<?php echo channel_select_list(0,0,0,0);?>
									</select>
									<input type="submit" id="shift" class="bk-margin-5 btn btn-primary" name="shift" onclick="return confirm('确定要转移吗')" value="转移" />
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
