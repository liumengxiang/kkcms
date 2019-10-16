<?php

if (isset($_POST['save'])) {
	null_back($_POST['u_name'], '请填写登录帐号');
	null_back($_POST['u_password'], '请填写登录密码');
	$_data['u_name'] = $_POST['u_name'];
	$_data['u_password'] = md5($_POST['u_password']);
	$_data['u_email'] = $_POST['u_email'];
	$_data['u_status'] = $_POST['u_status'];
	$_data['u_group'] = $_POST['u_group'];
	$_data['u_points'] = $_POST['u_points'];
	$_data['u_start'] = strtotime($_POST['u_start']);
	$_data['u_end'] = strtotime($_POST['u_end']);
	$result = mysql_query('select * from xtcms_user where u_id = ' . $_GET['id'] . '');
	if ($row = mysql_fetch_array($result)) {
		if ($_POST['u_password'] != $row['u_password']) {
			$_data['u_password'] = md5($_POST['u_password']);
		} else {
			$_data['u_password'] = $_POST['u_password'];
		}
	}
	$sql = 'update xtcms_user set ' . arrtoupdate($_data) . ' where u_id = ' . $_GET['id'] . '';
	if (mysql_query($sql)) {
		alert_href('修改成功!', 'cms_user.php');
	} else {
		alert_back('修改失败!');
	}
}
