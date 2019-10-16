<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/shoufei.php');
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
							<h2>收费配置</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>收费配置</h6>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									
										<?php
					$result = mysql_query('select * from xtcms_system where id = 1');
					if( $row = mysql_fetch_array($result)){
					?><form method="post">
					<div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-md-12">
													<label for="name-w1">是否开启收费（默认开启会员观看）</label>
													<div class="form-group has-feedback">
<input type="radio" name="s_user" value="0" <?php echo ( $row['s_user'] == 0 ) ? 'checked="checked"' : '' ; ?> />关闭&nbsp;
		<input type="radio" name="s_user" value="1" <?php echo ( $row['s_user'] == 1 ) ? 'checked="checked"' : '' ; ?> />开启&nbsp;
													</div></div>
												</div>
<div class="row">
													<div class="col-md-12">
													<label for="name-w1">免费看视频次数</label>
<div class="form-group has-feedback">
<input id="s_cishu" class="form-control" name="s_cishu" type="text" size="40" value="<?php echo $row['s_cishu'];?>" />

													</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
													<label for="name-w1">积分充值比例</label>
									<div class="form-group has-feedback">
<input id="s_bofang" class="form-control" name="s_bofang" type="text" size="40" value="<?php echo $row['s_bofang'];?>" />
													</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
													<label for="name-w1">邀请注册获得积分</label>
														<div class="form-group has-feedback">
														<input id="s_tuiguang" class="form-control" name="s_tuiguang" type="text" size="40" value="<?php echo $row['s_tuiguang'];?>" />
														</div>
													</div>
												</div>
																								<div class="row">
													<div class="col-md-12">
													<label for="name-w1">是否开启邮箱验证</label>
														<div class="form-group has-feedback">
<input type="radio" name="s_mail" value="0" <?php echo ( $row['s_mail'] == 0 ) ? 'checked="checked"' : '' ; ?>/>关闭&nbsp;
		<input type="radio" name="s_mail" value="1" <?php echo ( $row['s_mail'] == 1 ) ? 'checked="checked"' : '' ; ?> />开启&nbsp;
														</div>
													</div>
												</div>
																								<div class="row">
													<div class="col-md-12">
													<label for="name-w1">卡密购买链接</label>
														<div class="form-group has-feedback">
													<input id="s_qqun" class="form-control" name="s_qqun" type="text" size="40" value="<?php echo $row['s_qqun'];?>" />
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
