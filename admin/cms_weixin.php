<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/weixin.php');
?>
<?php include('inc_header.php') ?>
<script type="text/javascript">
KindEditor.ready(function(K) {
	K.create('#s_copyright');
	var editor = K.editor();
	K('#appewm').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
			imageUrl : K('#s_fengmian').val(),
			clickFn : function(url, title, width, height, border, align) {
				K('#s_fengmian').val(url);
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
							<h2>微信对接配置</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>微信对接配置</h6>
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
													<label for="name-w1">微信对接地址</label>
													<div class="form-group has-feedback">
<?php echo 'http://'.$_SERVER['SERVER_NAME'];?>/wx_api.php
													</div></div>
												</div>
<div class="row">
													<div class="col-md-12">
													<label for="name-w1">AppId</label>
<div class="input-group">
<input id="s_wappid" class="form-control" name="s_wappid" type="text" size="60" data-validate="required:请填写账号" value="<?php echo $row['s_wappid']?>" />

													</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
													<label for="name-w1">AppSecret</label>
									<div class="input-group">
								<input id="s_wkey" class="form-control" name="s_wkey" type="text" size="60" data-validate="required:请填写账号" value="<?php echo $row['s_wkey']?>" />
													</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
													<label for="name-w1">token值</label>
														<div class="input-group">
<input id="s_token" class="form-control" name="s_token" type="text" size="60" data-validate="required:请填写账号" value="<?php echo $row['s_token']?>" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
													<label for="name-w1">自动回复默认图片</label>
														<div class="input-group">
<input id="s_fengmian" class="form-control" name="s_fengmian" type="text" size="60" data-validate="required:消息默认封面图片地址" value="<?php echo $row['s_fengmian']?>" />
<span class="help-block">这里仅支持填写图片链接形式，例如：http://v.wslmf.com/images/wx_ss.png </span>

														</div>
													</div>
												</div><div class="row">
													<div class="col-md-12">
													<label for="name-w1">关注回复</label>
														<div class="form-group has-feedback">
<input id="s_guanzhu" class="form-control" name="s_guanzhu" type="text" size="60" data-validate="required:请填写关注回复内容" value="<?php echo $row['s_guanzhu']?>" />
														</div>
													</div>
												</div><div class="row">
													<div class="col-md-12">
													<label for="name-w1">* 微信公众平台说明：进入微信公众平台，请在微信公众平台中正确填写开发者选项。<br>
* 注意：token：weixin,token值与微信公众平台通讯的令牌(token)值必须一致，服务器地址：http://你的网址/wx_api.php。
<br>* 还有什么不懂，点击左下角【使用帮助】3.9章内容《微信对接》中查看学习。</label>

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
