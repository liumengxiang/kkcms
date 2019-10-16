<?php

if (isset($_POST['save'])) {
	$_data['s_bdyun'] = $_POST['s_bdyun'];
	$_data['s_pc'] = $_POST['s_pc'];
	$sql = 'update xtcms_system set ' . arrtoupdate($_data) . ' where id = 1';
	if (mysql_query($sql)) {
		alert_href('模版设置成功!请完成在【清除缓存】中选择清除首页静态缓存操作后，新模版才可立即生效！', 'cms_template.php');
	} else {
		alert_back('模版设置失败!');
	}
}
