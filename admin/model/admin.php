<?php

if ($_GET['del'] == 1) {
	alert_back('默认账户不能删除！');
} else {
	if (isset($_GET['del'])) {
		$sql = 'delete from xtcms_manager where m_id= ' . $_GET['del'] . '';
		if (mysql_query($sql)) {
			alert_href('删除成功!', 'cms_admin.php');
		} else {
			alert_back('删除失败！');
		}
	}
}
if (isset($_POST['save'])) {
	null_back($_POST['a_name'], '请填写登录帐号');
	null_back($_POST['a_password'], '请填写登录密码');
	null_back($_POST['a_cpassword'], '请重复输入登录密码');
	if ($_POST['a_password'] != $_POST['a_cpassword']) {
		alert_back('两次输入的密码不一致');
	}
	$result = mysql_query('select * from xtcms_manager where m_name = "' . $_POST['a_name'] . '"');
	if (mysql_fetch_array($result)) {
		alert_back('登录帐号重复，请更换登录帐号。');
	}
	$_data['m_name'] = $_POST['a_name'];
	$_data['m_password'] = md5($_POST['a_password']);
	$str = arrtoinsert($_data);
	$sql = 'insert into xtcms_manager (' . $str[0] . ') values (' . $str[1] . ')';
	if (mysql_query($sql)) {
		alert_href('管理员添加成功!', 'cms_admin.php');
	} else {
		alert_back('添加失败!');
	}
}
