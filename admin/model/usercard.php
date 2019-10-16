<?php

if (isset($_POST['save'])) {
	null_back($_POST['name'], '请输入名称');
	$_data['name'] = $_POST['name'];
	$_data['day'] = $_POST['day'];
	$_data['money'] = $_POST['money'];
	$_data['jifen'] = $_POST['jifen'];
	$_data['userid'] = $_POST['userid'];
	$str = arrtoinsert($_data);
	$sql = 'insert into xtcms_userka (' . $str[0] . ') values (' . $str[1] . ')';
	if (mysql_query($sql)) {
		alert_href('添加成功!', 'cms_usercard.php');
	} else {
		alert_back('添加失败!');
	}
}
if (isset($_GET['del'])) {
	$sql = 'delete from xtcms_userka where id = ' . $_GET['del'] . '';
	if (mysql_query($sql)) {
		alert_href('删除成功!', 'cms_usercard.php');
	} else {
		alert_back('删除失败！');
	}
}
