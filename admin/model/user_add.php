<?php

if (isset($_POST['save'])) {
	null_back($_POST['u_name'], '请填写登录帐号');
	null_back($_POST['u_password'], '请填写登录密码');
	$result = mysql_query('select * from xtcms_user where u_name = "' . $_POST['u_name'] . '"');
	if (mysql_fetch_array($result)) {
		alert_back('帐号重复，请输入新的帐号。');
	}
	$_data['u_name'] = $_POST['u_name'];
	$_data['u_password'] = md5($_POST['u_password']);
	$_data['u_email'] = $_POST['u_email'];
	$_data['u_status'] = $_POST['u_status'];
	$_data['u_group'] = $_POST['u_group'];
	$_data['u_points'] = $_POST['u_points'];
	$_data['u_fav'] = 0;
	$_data['u_plays'] = 0;
	$_data['u_downs'] = 0;
	$_data['u_start'] = time();
	$_data['u_end'] = time();
	$_data['u_regtime'] = time();
	$str = arrtoinsert($_data);
	$sql = 'insert into xtcms_user (' . $str[0] . ') values (' . $str[1] . ')';
	if (mysql_query($sql)) {
		alert_href('添加成功!', 'cms_user.php');
	} else {
		alert_back('添加失败!');
	}
}
?>

