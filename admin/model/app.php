<?php

if (isset($_POST['save'])) {
	$_data['s_appewm'] = $_POST['s_appewm'];
	$_data['s_appbt'] = $_POST['s_appbt'];
	$_data['s_apppic'] = $_POST['s_apppic'];
	$_data['s_appurl'] = $_POST['s_appurl'];
	$sql = 'update xtcms_system set ' . arrtoupdate($_data) . ' where id = 1';
	if (mysql_query($sql)) {
		alert_href('修改成功!', 'cms_app.php');
	} else {
		alert_back('修改失败!');
	}
}
