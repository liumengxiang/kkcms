<?php

if (isset($_POST['save'])) {
	null_back($_POST['name'], '请输入名称');
	$_data['name'] = $_POST['name'];
	$_data['day'] = $_POST['day'];
	$_data['money'] = $_POST['money'];
	$_data['jifen'] = $_POST['jifen'];
	$_data['userid'] = $_POST['userid'];
	$sql = 'update xtcms_userka set ' . arrtoupdate($_data) . ' where id = ' . $_GET['id'] . '';
	if (mysql_query($sql)) {
		alert_href('修改成功!', 'cms_usercard.php');
	} else {
		alert_back('修改失败!');
	}
}
?>

