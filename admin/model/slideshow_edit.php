<?php

if (isset($_POST['save'])) {
	null_back($_POST['s_picture'], '请输入或上传图片');
	non_numeric_back($_POST['s_order'], '请输入排序数字');
	$_data['s_name'] = $_POST['s_name'];
	$_data['s_parent'] = 1;
	$_data['s_picture'] = $_POST['s_picture'];
	$_data['s_url'] = $_POST['s_url'];
	$_data['s_order'] = $_POST['s_order'];
	$_data['s_order'] = $_POST['s_order'];
	$sql = 'update xtcms_slideshow set ' . arrtoupdate($_data) . ' where id = ' . $_GET['id'] . '';
	if (mysql_query($sql)) {
		alert_href('幻灯修改成功!', 'cms_slideshow.php');
	} else {
		alert_back('修改失败!');
	}
}
