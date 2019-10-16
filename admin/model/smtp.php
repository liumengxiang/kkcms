<?php

if (isset($_POST['save'])) {
	$_data['s_smtp'] = $_POST['s_smtp'];
	$_data['s_muser'] = $_POST['s_muser'];
	$_data['s_mpwd'] = $_POST['s_mpwd'];
	$_data['s_smsname'] = $_POST['s_smsname'];
	$_data['s_smspass'] = $_POST['s_smspass'];
	$sql = 'update xtcms_system set ' . arrtoupdate($_data) . ' where id = 1';
	if (mysql_query($sql)) {
		alert_href('修改成功!', 'cms_smtp.php');
	} else {
		alert_back('修改失败!');
	}
}
