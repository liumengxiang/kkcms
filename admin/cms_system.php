<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/system.php'); ?>
<?php include('inc_header.php') ?>
<script type='text/javascript'>
	KindEditor.ready(function(K) {
		K.create('#s_copyright');
		var editor = K.editor();
		K('#picture').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					imageUrl: K('#s_logo').val(),
					clickFn: function(url, title, width, height, border, align) {
						K('#s_logo').val(url);
						editor.hideDialog();
					}
				});
			});
		});
		K('#weixin').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					imageUrl: K('#s_weixin').val(),
					clickFn: function(url, title, width, height, border, align) {
						K('#s_weixin').val(url);
						editor.hideDialog();
					}
				});
			});
		});
		K('#dashang').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					imageUrl: K('#s_dashang').val(),
					clickFn: function(url, title, width, height, border, align) {
						K('#s_dashang').val(url);
						editor.hideDialog();
					}
				});
			});
		});
		K('#beijing').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					imageUrl: K('#s_beijing').val(),
					clickFn: function(url, title, width, height, border, align) {
						K('#s_beijing').val(url);
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
					<h2>系统设置</h2>
				</div>
			</div>
			<!-- End Page Header -->

			<div class="row">
				<div class="col-lg-12">
					<div class="panel bk-bg-white">
						<div class="panel-heading bk-bg-primary">
							<h6><i class="fa fa-tags red"></i>系统设置</h6>
						</div>
						<div class="panel-body">
							<div class="wizard-type1">
								<?php
								$result = mysql_query('select * from xtcms_system where id = 1');
								if ($row = mysql_fetch_array($result)) {
									?>
								<form method="post">
									<div class="tab-content">

										<div class="tab-pane1">
											<div class="form-group">
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

														<div class="form-group has-feedback">
															<label for="name-w1">网站名称</label>
															<?php echo '<input id="s_name" class="form-control" name="s_name" type="text" size="60" value="' . $row['s_name'] . '" />'; ?>
														</div>
													</div>

													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

														<div class="form-group has-feedback">
															<label for="name-w1">域名</label>
															<div class="form-group has-feedback">
																<?php echo '<input id="s_domain" class="form-control" name="s_domain" type="text" size="60" value="' . $row['s_domain'] . '" />'; ?>
																<span class="help-block">请填写域名，例如：http://v.wslmf.com/ 一定要"/"结尾否则出错</span>

															</div>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<div class="form-group has-feedback">
																<label for="name-w1">优化标题</label>
																<?php echo '<input id="s_seoname" class="form-control" name="s_seoname" type="text" size="60" value="' . $row['s_seoname'] . '" />'; ?>
															</div>
														</div>

														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<div class="form-group has-feedback">
																<label for="name-w1">关键字</label>
																<?php echo '<input id="s_keywords" class="form-control" name="s_keywords" type="text" size="60" value="' . $row['s_keywords'] . '" />'; ?>
															</div>
														</div>

														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<div class="form-group has-feedback">
																<label for="name-w1">关键描述</label>
																<?php echo '<input id="s_description" class="form-control" name="s_description" type="text" size="60" value="' . $row['s_description'] . '" />'; ?>
															</div>
														</div>
													</div>
												</div>

												<div class="form-group">

													<div class="row">

														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<label for="name-w1">是否开启自动尝鲜</label><br>
															<?php
																echo '<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio13" name="s_dianshi" value="1"';
																if ($row['s_dianshi'] == 1) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio13">开启自动尝鲜</label>
			</div>
			<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio14" name="s_dianshi" value="0"';
																if ($row['s_dianshi'] == 0) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio14">关闭自动尝鲜</label>
			</div>';
																?>
														</div>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<label for="name-w1">伪静态</label><br>
															<?php
																echo '<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio3" name="s_wei" value="1"';
																if ($row['s_wei'] == 1) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio3">开启</label>
			</div>
			<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio4" name="s_wei" value="0"';
																if ($row['s_wei'] == 0) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio4">关闭</label>
			</div>';
																?>
														</div>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<label for="name-w1">域名防红</label><br>
															<?php
																echo '<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio5" name="s_hong" value="1"';
																if ($row['s_hong'] == 1) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio5">开启</label>
			</div>
			<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio6" name="s_hong" value="0"';
																if ($row['s_hong'] == 0) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio6">关闭</label>
			</div>';
																?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<label for="name-w1" alt="缓存时间"></label>
															<?php //echo '<input id="s_seoname" class="form-control" name="s_hctime" type="text" size="60" value="' . $row['s_hctime'] . '" />'; ?>
														</div>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<label for="name-w1">播放前倒计时（秒）</label>
															<?php echo '<input id="s_miaoshu" class="form-control" name="s_miaoshu" type="text" size="60" value="' . $row['s_miaoshu'] . '" />'; ?>
															<span class="help-block">不可填“0”，如不希望倒计时，默认填写0.5即可</span>
														</div>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<label for="name-w1">ICP备案号</label>
															<?php echo '<input id="s_icp" class="form-control" name="s_icp" type="text" size="60" value="' . $row['s_icp'] . '" />'; ?>

														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<label for="name-w1">网站logo</label>
															<?php echo '<div class="input-group">
									<input id="s_logo" class="form-control" name="s_logo" type="text" size="40" value="' . $row['s_logo'] . '" />
													<span class="input-group-btn">
													<button type="button" class="btn btn-success" id="picture">UP</button>
													</span>
												</div>'; ?>
														</div>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<label for="name-w1">微信二维码</label>
															<?php echo '<div class="input-group">
									<input id="s_weixin" class="form-control" name="s_weixin" type="text" size="40" value="' . $row['s_weixin'] . '" />
													<span class="input-group-btn">
													<button type="button" class="btn btn-success" id="weixin">UP</button>
													</span>
												</div>'; ?>

														</div>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<label for="name-w1">微信打赏图片</label>
															<?php echo '<div class="input-group">
									<input id="s_dashang" class="form-control" name="s_dashang" type="text" size="40" value="' . $row['s_dashang'] . '" />
													<span class="input-group-btn">
													<button type="button" class="btn btn-success" id="dashang">UP</button>
													</span>
												</div>'; ?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<label for="name-w1">是否显示手动采集视频</label><br>
															<?php
																echo '<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio7" name="s_qianxian" value="1"';
																if ($row['s_qianxian'] == 1) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio7">开启</label>
			</div>
			<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio8" name="s_qianxian" value="0"';
																if ($row['s_qianxian'] == 0) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio8">关闭</label>
			</div>';
																?>
														</div>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<label for="name-w1">是否开启电影</label><br>
															<?php
																echo '<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio9" name="s_dianying" value="1"';
																if ($row['s_dianying'] == 1) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio9">开启</label>
			</div>
			<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio10" name="s_dianying" value="0"';
																if ($row['s_dianying'] == 0) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio10">关闭</label>
			</div>
			<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio11" name="s_dianyingnew" value="0"';
																if ($row['s_dianyingnew'] == 0) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio11">最新</label>
			</div>
			<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio12" name="s_dianyingnew" value="1"';
																if ($row['s_dianyingnew'] == 1) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio12">最热</label>
			</div>';
																?>

														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<label for="name-w1">是否开启综艺</label><br>
															<?php
																echo '<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio15" name="s_zongyi" value="1"';
																if ($row['s_zongyi'] == 1) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio15">开启</label>
			</div>
			<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio16" name="s_zongyi" value="0"';
																if ($row['s_zongyi'] == 0) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio16">关闭</label>
			</div>
			<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio17" name="s_zongyinew" value="0"';
																if ($row['s_zongyinew'] == 0) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio17">最新</label>
			</div>
			<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio18" name="s_zongyinew" value="1"';
																if ($row['s_zongyinew'] == 1) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio18">最热</label>
			</div>';
																?>
														</div>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<label for="name-w1">是否开启动漫</label><br>
															<?php
																echo '<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio19" name="s_dongman" value="1"';
																if ($row['s_dongman'] == 1) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio19">开启</label>
			</div>
			<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio20" name="s_dongman" value="0"';
																if ($row['s_dongman'] == 0) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio20">关闭</label>
			</div>
			<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio21" name="s_dongmannew" value="0"';
																if ($row['s_dongmannew'] == 0) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio21">最新</label>
			</div>
			<div class="radio-custom radio-inline" style="float:left">
             <input type="radio" id="inline-radio22" name="s_dongmannew" value="1"';
																if ($row['s_dongmannew'] == 1) {
																	echo 'checked="checked"';
																}
																echo '>
			<label for="inline-radio22">最热</label>
			</div>';
																?>
														</div>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															<label for="name-w1" alt="是否开启手机版"></label><br>
															<?php
																// echo'<div class="radio-custom radio-inline" style="float:left">
																//              <input type="radio" id="inline-radio23" name="s_pc" value="1"'; if( $row['s_pc'] == 1 ){ echo'checked="checked"' ;} echo'>
																// 			<label for="inline-radio23">开启</label>
																// 			</div>
																// 			<div class="radio-custom radio-inline" style="float:left">
																//              <input type="radio" id="inline-radio24" name="s_pc" value="0"'; if( $row['s_pc'] == 0 ){echo'checked="checked"';}  echo'>
																// 			<label for="inline-radio24">关闭</label>
																// 			</div>';
																?>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">默认接口</label>
															<?php echo '<input id="s_mjk" class="form-control" name="s_mjk" type="text" size="60" value="' . $row['s_mjk'] . '" />
										<span class="help-block">默认自动播放时的接口！<font color="#value">【推荐使用】https://jx.wslmf.com/?url= （360kan资源全能解析接口）</font></span>'; ?>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">备用线路接口</label>
															<?php echo '<textarea class="form-control" name="s_jiekou" />' . $row['s_jiekou'] . '</textarea>
										<span class="help-block">多个解析请用“回车”分开，请一定要按照格式添加。'; ?>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">侵权视频下架</label>
															<?php echo '<textarea class="form-control" name="s_shoufei" />' . $row['s_shoufei'] . '</textarea>
										<span class="help-block">这里输入全名称即可，多个请用英文逗号隔开 比如现在的战狼2 无法观看，输入战狼2
提交保存。</span>'; ?>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">公告设置</label>
															<?php echo '<textarea id="s_gonggao" class="form-control" name="s_gonggao" />' . htmlspecialchars($row['s_gonggao']) . '</textarea>'; ?>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">版权信息</label>
															<?php echo '<textarea class="form-control" name="s_copyright" />' . htmlspecialchars($row['s_copyright']) . '</textarea>'; ?>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">统计代码</label>
															<?php echo '<textarea  class="form-control" name="s_tongji" size="60"/>' . $row['s_tongji'] . '</textarea>'; ?>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">畅言代码</label>
															<?php echo '<textarea  class="form-control" name="s_changyan" size="60"/>' . $row['s_changyan'] . '</textarea>
<span class="help-block">目前数据库默认的是畅言表情评论代码，因为畅言有域名限制，你必须替换成自己的代码，否则会造成评论框处空白！</span>
'; ?>
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
