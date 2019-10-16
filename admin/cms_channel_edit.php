<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/channel_edit.php');
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
							<h2>修改栏目</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>修改栏目</h6>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									<?php
$result = mysql_query('select * from xtcms_vod_class where c_id = '.$_GET['id']);
					if ($row = mysql_fetch_array($result)){
					?><form method="post"><div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">栏目名称</label>
															<input id="c_name" class="form-control" name="c_name" type="text" size="60" data-validate="required:请输入频道名称" value="<?php echo $row['c_name']?>" />

														</div>
													</div>
												</div>
<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">上级栏目</label>
															<select id="c_pid" class="form-control" name="c_pid">
										<option value="0">作为主栏目</option>
										<?php echo channel_select_list(0,0,$row['c_pid'],0);?>
									</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">开启vip</label>
													<select id="c_hide" class="form-control" name="c_hide">
										<option value="0" <?php echo ($row['c_hide'] ==0 ? 'selected="selected"':'');?>>关闭</option>
										<option value="1" <?php echo ($row['c_hide'] ==1 ? 'selected="selected"':'');?>>开启</option>
									</select>


														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">排序</label>
															<input id="c_sort" class="form-control" name="c_sort" type="text" size="30" value="<?php echo $row['c_sort']?>" />
														</div>
													</div>
												</div>
											</div>
											
											
										</div>
										<div class="actions">								
											<input type="submit" class="btn btn-info button-previous" name="save" value="提交" />

										</div>
										</form><?php
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
