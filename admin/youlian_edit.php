<?php

if (isset($_POST['save'])) {
	$_data['content'] = $_POST['content'];
	$_data['Reply'] = $_POST['Reply'];
	$sql = 'update xtcms_youlian set ' . arrtoupdate($_data) . ' where id = ' . $_GET['id'] . '';
	if (mysql_query($sql)) {
		alert_href('修改成功!', 'cms_youlian.php');
	} else {
		alert_back('修改失败!');
	}
}
