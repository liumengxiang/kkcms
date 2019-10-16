<?php
include('../system/inc.php');
include('cms_check.php');
include('model/addkami.php');
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
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>生成卡密</h6>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									
										<form method="post"><div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">卡密说明</label>
															<span class="help-block">卡密生成后，不能重新编辑，请一次性添加好，生成尽量1000以内，卡密标识唯一，不能重复，防止卡密生成后卡的密码重复</span>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">卡密名称</label>
															<input id="title" class="form-control" name="title" type="text" size="60" data-validate="required:请输入卡密名称" value="" />
<span class="help-block">请输入卡密名称</span>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">卡密标识</label>
															<input id="card_id" class="form-control" name="card_id" type="text" size="60" data-validate="required:请输入卡密标识" value="" />
<span class="help-block">作为代理商唯一标识</span>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">生成数量</label>
															<input id="num" class="form-control" name="num" type="text" size="60" data-validate="required:请输入生成数量" value="" />
<span class="help-block">请输入生成数量</span>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">所属会员组</label>
																		<select id="userid" class="form-control" name="userid">
													<?php
							$result = mysql_query('select * from xtcms_user_group where ug_id>1');
							while($row = mysql_fetch_array($result)){
						?>
						<option value="<?php echo $row['ug_id']?>"><?php echo $row['ug_name']?></option>
<?php
							}
						?>
									</select>

														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">生成位数</label>
															<input id="weishu" class="form-control" name="weishu" type="text" size="60"  data-validate="required:请输入生成位数"  value="" />
<span class="help-block">卡密的长度</span>
														</div>
													</div>
												</div>
<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">兑换天数</label>
															<input id="day" class="form-control" name="day" type="text" size="60"  data-validate="required:请输入兑换天数"  value="" />
<span class="help-block">卡密使用的时间</span>
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

					
				</div>
				<!-- End Main Page -->			
		
<?php include('inc_footer.php') ?>
