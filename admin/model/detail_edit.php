<?php

if (isset($_POST['save'])) {
	null_back($_POST['d_name'], '请填写视频名称');
	$_data['d_name'] = $_POST['d_name'];
	$_data['d_zhuyan'] = $_POST['d_zhuyan'];
	$_data['d_picture'] = $_POST['d_picture'];
	$_data['d_parent'] = $_POST['d_parent'];
	$_data['d_rec'] = $_POST['d_rec'];
	$_data['d_hot'] = $_POST['d_hot'];
	$_data['d_content'] = $_POST['d_content'];
	$_data['d_scontent'] = $_POST['d_scontent'];
	$_data['d_jifen'] = $_POST['d_jifen'];
	$_data['d_keywords'] = $_POST['d_keywords'];
	$_data['d_description'] = $_POST['d_description'];
	$_data['d_seoname'] = $_POST['d_seoname'];
	$_data['d_user'] = $_POST['d_user'];
	$_data['d_player'] = $_POST['d_player'];
	$sql = 'update xtcms_vod set ' . arrtoupdate($_data) . ' where d_id = ' . $_GET['id'] . '';
	if (mysql_query($sql)) {
		alert_href('视频修改成功!', 'cms_detail.php?cid=0');
	} else {
		alert_back('修改失败!');
	}
}
