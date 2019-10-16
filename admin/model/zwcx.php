<?php
if (isset($_POST['save'])) {
	$_data['s_tixing'] = $_POST['s_tixing'];
	$_data['s_dianshi'] = $_POST['s_dianshi'];
	$sql = 'update xtcms_system set ' . arrtoupdate($_data) . ' where id = 1';
	if (mysql_query($sql)) {
		alert_href('自动尝鲜设置修改成功!', 'cms_zwcx.php');
	} else {
		alert_back('修改失败!');
	}
}
