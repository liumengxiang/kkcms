<?php

if (isset($_POST['save'])) {
	null_back($_POST['n_name'], '请输入名称');
	non_numeric_back($_POST['order'], '请输入排序数字');
	$_data['n_name'] = $_POST['n_name'];
	$_data['n_url'] = $_POST['n_url'];
	$_data['order'] = $_POST['order'];
	$sql = 'update xtcms_player set ' . arrtoupdate($_data) . ' where id = ' . $_GET['id'] . '';
	if (mysql_query($sql)) {
		alert_href('修改成功!', 'cms_player.php');
	} else {
		alert_back('修改失败!');
	}
}
