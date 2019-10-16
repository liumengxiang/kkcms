<?php
if (isset($_POST['save'])) {
	$_data['s_token'] = $_POST['s_token'];
	$_data['s_wappid'] = $_POST['s_wappid'];
	$_data['s_wkey'] = $_POST['s_wkey'];
	$_data['s_guanzhu'] = $_POST['s_guanzhu'];
	$_data['s_fengmian'] = $_POST['s_fengmian'];
	$sql = 'update xtcms_system set ' . arrtoupdate($_data) . ' where id = 1';
	if (mysql_query($sql)) {
		alert_href('修改成功!', 'cms_weixin.php');
	} else {
		alert_back('修改失败!');
	}
}
