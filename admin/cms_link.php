<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/link.php');
?>
<?php include('inc_header.php') ?>
<script type="text/javascript">
KindEditor.ready(function(K) {
	K.create('#s_copyright');
	var editor = K.editor();
	K('#picture').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
			imageUrl : K('#l_picture').val(),
			clickFn : function(url, title, width, height, border, align) {
				K('#l_picture').val(url);
				editor.hideDialog();
				}
			});
		});
	});
});
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
							<h2>链接管理</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>添加链接</h6>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									
										<form method="post"><div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">名称</label>
															<input id="l_name" class="form-control" name="l_name" type="text" size="60" data-validate="required:请填写链接名称" value="" />
														</div>
													</div>
												</div>
<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">图片 （可以为空，目前版本还不支持图片显示）</label>
															<div class="input-group">
									<input id="l_picture" class="form-control" name="l_logo" type="text" size="60" value="" />
													<span class="input-group-btn">
													<button type="button" class="btn btn-success" id="picture">UP</button>
													</span>
												</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">地址</label>
															<input id="l_url" class="form-control" name="l_url" type="text" size="60" data-validate="required:请填写链接地址" value="http://" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">排序</label>
															<input id="l_sort" class="form-control" name="l_sort" type="text" size="60" data-validate="required:必填,plusinteger:请填写排序数字" value="0" />
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
									<h6><i class="fa fa-table red"></i><span class="break"></span>链接管理</h6>

								</div>
								<div class="panel-body">
									<div class="table-responsive">	
										<table class="table table-striped table-bordered bootstrap-datatable datatable">
											<thead>
												<tr>
													<th>排序</th>
							<th>链接图片</th>
							<th>链接名称</th>
							<th>链接地址</th>
							<th>操作</th>
												</tr>
											</thead>   
											<tbody>								
												<?php
						$result = mysql_query('select * from xtcms_link');
						while($row = mysql_fetch_array($result)){
						?>
						<tr>
							<td><?php echo $row['l_sort']?></td>
							<td>
								<?php if ($row['l_logo'] != '') { ?>
								<a href="<?php echo $row['l_logo']?>" target="_blank"><img src="<?php echo $row['l_logo']?>" width="120" height="30" /></a>
								<?php } ?>
							</td>
							<td><?php echo $row['l_name']?></td>
							<td><?php echo $row['l_url']?></td>
							<td><a class="btn btn-info" href="cms_link_edit.php?l_id=<?php echo $row['l_id']?>"><span class="icon-edit"> 修改</span></a>&nbsp <a class="btn btn-danger" href="cms_link.php?del=<?php echo $row['l_id']?>" onclick="return confirm('确认要删除吗？')"><span class="icon-times"> 删除</span></a></td>
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
