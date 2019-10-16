<?php

if (isset($_POST['save'])) {
	null_back($_POST['c_name'], '请填写栏目名称');
	null_back($_POST['c_pid'], '请选择上级栏目');
	non_numeric_back($_POST['c_sort'], '排序必须是数字');
	$_data['c_name'] = $_POST['c_name'];
	$_data['c_pid'] = $_POST['c_pid'];
	$_data['c_sort'] = $_POST['c_sort'];
	$_data['c_hide'] = $_POST['c_hide'];
	$str = arrtoinsert($_data);
	$sql = 'insert into xtcms_vod_class (' . $str[0] . ') values (' . $str[1] . ')';
	if (mysql_query($sql)) {
		$order = mysql_insert_id();
		if ($_POST['c_sort'] == 0) {
			mysql_query('update xtcms_vod_class set c_sort = ' . $order . ' where c_id = ' . $order);
		}
		alert_href('栏目添加成功!', 'cms_channel.php');
	} else {
		alert_back('添加失败!');
	}
}
