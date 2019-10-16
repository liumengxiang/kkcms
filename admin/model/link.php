<?php

if (isset($_GET['del'])) {
	$sql = 'delete from xtcms_link where l_id = ' . $_GET['del'] . '';
	if (mysql_query($sql)) {
		alert_href('删除成功!', 'cms_link.php');
	} else {
		alert_back('删除失败！');
	}
}
if (isset($_POST['save'])) {
	null_back($_POST['l_name'], '请填写链接名称');
	non_numeric_back($_POST['l_sort'], '排序必须是数字!');
	$data['l_name'] = $_POST['l_name'];
	$data['l_logo'] = $_POST['l_logo'];
	$data['l_url'] = $_POST['l_url'];
	$data['l_sort'] = $_POST['l_sort'];
	$str = arrtoinsert($data);
	$sql = 'insert into xtcms_link (' . $str[0] . ') values (' . $str[1] . ')';
	if (mysql_query($sql)) {
		$order = mysql_insert_id();
		if ($_POST['l_sort'] == 0) {
			mysql_query('update xtcms_link set l_sort = ' . $order . ' where l_id = ' . $order);
		}
		alert_href('链接添加成功!', 'cms_link.php');
	} else {
		alert_back('添加失败!');
	}
}
