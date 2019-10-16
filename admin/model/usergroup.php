<?php

if ($_GET['del'] == 1) {
	alert_back('默认会员组不能删除！');
} else {
	if (isset($_GET['del'])) {
		$sql = 'delete from xtcms_user_group where ug_id = ' . $_GET['del'] . '';
		if (mysql_query($sql)) {
			alert_href('删除成功!', 'cms_usergroup.php');
		} else {
			alert_back('删除失败！');
		}
	}
}
if (isset($_POST['save'])) {
	null_back($_POST['ug_name'], '请填写名称');
	$data['ug_name'] = $_POST['ug_name'];
	$str = arrtoinsert($data);
	$sql = 'insert into xtcms_user_group (' . $str[0] . ') values (' . $str[1] . ')';
	if (mysql_query($sql)) {
		alert_href('添加成功!', 'cms_usergroup.php');
	} else {
		alert_back('添加失败!');
	}
}
