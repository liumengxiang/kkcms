<?php
include('../system/inc.php');
include('cms_check.php');
include('model/ad_edit.php');
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
							<h2>广告管理</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>修改广告</h6>
									<div class="panel-actions">
										<a href="#" class="btn-setting"><i class="fa fa-rotate-right black"></i></a>
										<a href="#" class="btn-minimize"><i class="fa fa-chevron-up black"></i></a>
										<a href="#" class="btn-close"><i class="fa fa-times black"></i></a>
									</div>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									<?php
					$result = mysql_query('select * from xtcms_ad where id = '.$_GET['id'].' ');
					if ($row = mysql_fetch_array($result)){
					?>
										<form method="post"><div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">名称</label>
															<input id="l_name" class="form-control" name="title" type="text" size="60" data-validate="required:请填写广告名称"  value="<?php echo $row['title'];?>" />
<span class="help-block">请输入广告名称</span>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<label for="ccnumber-w1">内容</label>
															
															<textarea id="l_picture" class="form-control" name="pic" /><?php echo htmlspecialchars($row['pic']);?></textarea>
<span class="help-block">请输入广告的内容&lt;a href="网址" target="_blank"&gt;&lt;img src="图片地址" style="width:100%"&gt;&lt;/a&gt;</span>
														</div>
													</div>
													
												</div>
												<div class="row">
													<div class="form-group col-sm-12">
														<label for="ccmonth-w1">广告位置</label>
<select id="catid" class="form-control" name="catid">
<?php
							$result = mysql_query('select * from xtcms_adclass');
							while($row1 = mysql_fetch_array($result)){
						?>
						<option value="<?php echo $row1['id']?>" <?php echo ($row['catid'] ==$row1['id'] ? 'selected="selected"':'');?>><?php echo $row1['name']?></option>
<?php
							}
						?>

									</select>
													</div>
						
												</div>
												
											</div>
											
											
										</div>
										<div class="actions">								
											<input type="submit" class="btn btn-info button-previous" name="save" value="提交" />

										</div>
										</form>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>

					
				</div>
				<!-- End Main Page -->			
		
<?php include('inc_footer.php') ?>
