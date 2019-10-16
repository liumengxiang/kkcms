<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/usergroup.php');
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
							<h2>会员级别管理</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>添加会员级别</h6>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									
										<form method="post"><div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">名称</label>
															<input id="ug_name" class="form-control" name="ug_name" type="text" size="60" data-validate="required:请填写会员组名称" value="" />
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
									<h6><i class="fa fa-table red"></i><span class="break"></span>会员级别管理</h6>

								</div>
								<div class="panel-body">
									<div class="table-responsive">	
										<table class="table table-striped table-bordered bootstrap-datatable datatable">
											<thead>
												<tr>
													<th>ID</th>
							<th>名称</th>
							<th>操作</th>
												</tr>
											</thead>   
											<tbody>								
<?php
						$result = mysql_query('select * from xtcms_user_group');
						while($row = mysql_fetch_array($result)){
						?>
						<tr>
							<td><?php echo $row['ug_id']?></td>

							<td><?php echo $row['ug_name']?></td>
							<td><a class="btn btn-info" href="cms_usergroup_edit.php?id=<?php echo $row['ug_id']?>"><span class="icon-edit"> 修改</span></a>&nbsp <a class="btn btn-danger" href="cms_usergroup.php?del=<?php echo $row['ug_id']?>" onclick="return confirm('确认要删除吗？')"><span class="icon-times"> 删除</span></a></td>
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
