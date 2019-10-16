<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('model/detail_edit.php'); ?>
<?php include('inc_header.php') ?>
<script type="text/javascript">
KindEditor.ready(function(K) {
	K.create('#d_content');
	var editor = K.editor();
	K('#picture').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
			imageUrl : K('#d_picture').val(),
			clickFn : function(url, title, width, height, border, align) {
				K('#d_picture').val(url);
				editor.hideDialog();
				}
			});
		});
	});
	K('#slideshow').click(function() {
		editor.loadPlugin('multiimage', function() {
			editor.plugin.multiImageDialog({
				clickFn : function(urlList) {
					var tem_val = '';
					var tem_s = '';
					K.each(urlList, function(i, data) {
						tem_val = tem_val + tem_s + data.url;
						tem_s = '|';
					});
					K('#d_slideshow').val(tem_val);
					editor.hideDialog();
				}
			});
		});
	});
	K('#file').click(function() {
		editor.loadPlugin('insertfile', function() {
			editor.plugin.fileDialog({
				fileUrl : K('#d_file').val(),
				clickFn : function(url, title) {
					K('#d_file').val(url);
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
							<h2>修改视频</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">						
						<div class="col-lg-12">
							<div class="panel bk-bg-white">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-tags red"></i>修改视频</h6>
								</div>
								<div class="panel-body">
									<div class="wizard-type1">
									<?php
					$result = mysql_query('select * from xtcms_vod where d_id = '.$_GET['id'].'');
					if ($row = mysql_fetch_array($result)){
					?>
										<form method="post"><div class="tab-content">

											<div class="tab-pane1">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">视频名称</label>
															<input id="d_name" class="form-control" name="d_name" type="text" size="60" data-validate="required:请输入视频名称" value="<?php echo $row['d_name'];?>" />
														</div>
													</div>
												</div>
<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">图片</label>
															<div class="input-group">
									<input id="d_picture" class="form-control" name="d_picture" type="text" size="60" value="<?php echo $row['d_picture'];?>" />
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
															<label for="name-w1">主演</label>
															<input id="d_zhuyan" class="form-control" name="d_zhuyan" type="text" size="60" data-validate="required:请输入主演" value="<?php echo $row['d_zhuyan'];?>" />
														</div>
													</div>
												</div>
												<div class="form-group">

												<div class="row">
												
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<label for="name-w1">所需积分</label>
														<input id="d_jifen" class="form-control" name="d_jifen" type="text" size="60"  value="<?php echo $row['d_jifen'];?>" />
													</div>
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<label for="name-w1">可看会员级别</label>
														<select id="d_user" class="form-control" name="d_user">
										<option value="0" <?php	echo ($row['d_user']== 0 ? 'selected="selected"':'');	?>>全部</option>
<?php
							$result = mysql_query('select * from xtcms_user_group');
							while($row1 = mysql_fetch_array($result)){
						?>
						<option value="<?php echo $row1['ug_id']?>" <?php echo ($row['d_user'] ==$row1['ug_id'] ? 'selected="selected"':'');?>><?php echo $row1['ug_name']?></option>
<?php
							}
						?>
									</select>
													</div>
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<label for="name-w1">播放器选择</label>
	<select id="d_player" class="form-control" name="d_player">
			<option value="">直连无解析地址</option>
<?php
							$result = mysql_query('select * from xtcms_player');
							while($row1 = mysql_fetch_array($result)){
						?>
						<option value="<?php echo $row1['id']?>" <?php echo ($row['d_player'] ==$row1['id'] ? 'selected="selected"':'');?>><?php echo $row1['n_name']?></option>
<?php
							}
						?>

									</select>
													</div>
												</div></div>
<div class="form-group">
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<label for="name-w1">所属类别</label>
														<select id="d_parent" class="form-control" data-validate="required:请选择类别" name="d_parent">
										<option value="">请选择类别</option>
										<?php echo channel_select_list(0,0,$row['d_parent'],0); ?>
									</select>
													</div>
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<label for="name-w1">推荐</label>
													<select id="d_rec" class="form-control" name="d_rec">
			<option value="1" <?php echo ($row['d_rec'] == 1 ? 'selected="selected"' : '')?>>是</option>
			<option value="0" <?php echo ($row['d_rec'] == 0 ? 'selected="selected"' : '')?>>否</option>
			</select>

													</div>
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<label for="name-w1">热门</label>
														<select id="d_rec" class="form-control" name="d_hot">
			<option value="1" <?php echo ($row['d_hot'] == 1 ? 'selected="selected"' : '')?>>是</option>
			<option value="0" <?php echo ($row['d_hot'] == 0 ? 'selected="selected"' : '')?>>否</option>
			</select>
													</div>
												</div>
</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">视频地址</label>
															<textarea id="d_scontent" class="form-control" name="d_scontent" row="5" /><?php echo $row['d_scontent'];?></textarea>
									<span class="help-block">名称$地址</span>

														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group has-feedback">
															<label for="name-w1">详细内容</label>
															<textarea class="form-control" name="d_content" /><?php echo htmlspecialchars($row['d_content']);?></textarea>
														</div>
													</div>
												</div>
												<div class="form-group">
												<div class="row">
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<label for="name-w1">关键字</label>
														<input id="d_keywords" class="form-control" name="d_keywords" type="text" size="60" value="<?php echo $row['d_keywords'];?>" />
													</div>
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<label for="name-w1">关键描述</label>
														<input id="d_description" class="form-control" name="d_description" type="text" size="60" value="<?php echo $row['d_description'];?>" />
													</div>
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
													<label for="name-w1">优化标题</label>
														<input id="d_seoname" class="form-control" name="d_seoname" type="text" size="60" value="<?php echo $row['d_seoname'];?>" />
													</div>
												</div></div>

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
