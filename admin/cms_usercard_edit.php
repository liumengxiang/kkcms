<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/usercard_edit.php');
?>
<?php include('inc_header.php') ?>
<script type="text/javascript">
KindEditor.ready(function(K) {
	K.create('#s_copyright');
	var editor = K.editor();
	K('#picture').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
			imageUrl : K('#s_picture').val(),
			clickFn : function(url, title, width, height, border, align) {
				K('#s_picture').val(url);
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
							<h2>会员套餐管理</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>修改会员套餐</h6>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									
<?php
					$result = mysql_query('select * from xtcms_userka where id = '.$_GET['id'].'');
					if($row = mysql_fetch_array($result)){
					?>
					<form method="post"><div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">名称</label>
															<input id="name" class="form-control" name="name" type="text" size="60" value="<?php echo $row['name'];?>" />
														</div>
													</div>
												</div>
<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">天数</label>
															<div class="form-group has-feedback">
<input id="day" class="form-control" name="day" type="text" size="60" value="<?php echo $row['day'];?>" />
												</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">价格</label>
									<input id="money" class="form-control" name="money" type="text" size="60" value="<?php echo $row['money'];?>"/>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">积分</label>
			<input id="jifen" class="form-control" name="jifen" type="text" size="60" value="<?php echo $row['jifen'];?>" />
			</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">会员级别</label>
															<select id="userid" class="form-control" name="userid">
				<?php
							$result = mysql_query('select * from xtcms_user_group where ug_id>1');
							while($row1 = mysql_fetch_array($result)){
						?>
						<option value="<?php echo $row1['ug_id']?>" <?php echo ($row['userid'] ==$row1['ug_id'] ? 'selected="selected"':'');?>><?php echo $row1['ug_name']?></option>
<?php
							}
						?>
									</select>
														</div>
													</div>
												</div>
											</div>
											
											
										</div>
										<div class="actions">								
											<input type="submit" class="btn btn-info button-previous" name="save" value="提交" />

										</div>
										</form>
					<?php
						}
					?>
									</div>
								</div>
							</div>
						</div>
					</div>

					
				</div>
				<!-- End Main Page -->			
		
<?php include('inc_footer.php') ?>
