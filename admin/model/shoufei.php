<?php

if (isset($_POST['save'])) {
	$_data['s_user'] = $_POST['s_user'];
	$_data['s_qqun'] = $_POST['s_qqun'];
	$_data['s_tuiguang'] = $_POST['s_tuiguang'];
	$_data['s_bofang'] = $_POST['s_bofang'];
	$_data['s_cishu'] = $_POST['s_cishu'];
	$_data['s_mail'] = $_POST['s_mail'];
	$sql = 'update xtcms_system set ' . arrtoupdate($_data) . ' where id = 1';
	if (mysql_query($sql)) {
		alert_href('收费设置修改成功!', 'cms_shoufei.php');
	} else {
		alert_back('修改失败!');
	}
}
