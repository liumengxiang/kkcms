<?php

if (isset($_POST['save'])) {
	null_back($_POST['c_name'], '请填写栏目名称');
	null_back($_POST['c_pid'], '请选择上级栏目');
	non_numeric_back($_POST['c_sort'], '排序必须是数字');
	$_data['c_name'] = $_POST['c_name'];
	$_data['c_pid'] = $_POST['c_pid'];
	$_data['c_sort'] = $_POST['c_sort'];
	$_data['c_hide'] = $_POST['c_hide'];
	if ($_POST['c_pid'] == $_GET['id']) {
		alert_back('上级栏目不能修改!');
	}
	$sql = 'update xtcms_vod_class set ' . arrtoupdate($_data) . ' where c_id = ' . $_GET['id'] . '';
	if (mysql_query($sql)) {
		alert_href('频道修改成功!', 'cms_channel.php');
	} else {
		alert_back('修改失败!');
	}
}
