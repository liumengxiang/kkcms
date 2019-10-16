<?php

if (isset($_POST['save'])) {
	null_back($_POST['n_name'], '请输入名称');
	non_numeric_back($_POST['order'], '请输入排序数字');
	$_data['n_name'] = $_POST['n_name'];
	$_data['n_url'] = $_POST['n_url'];
	$_data['order'] = $_POST['order'];
	$str = arrtoinsert($_data);
	$sql = 'insert into xtcms_player (' . $str[0] . ') values (' . $str[1] . ')';
	if (mysql_query($sql)) {
		$order = mysql_insert_id();
		if ($_POST['order'] == 0) {
			mysql_query('update xtcms_player set order = ' . $order . ' where id = ' . $order);
		}
		alert_href('播放器添加成功!', 'cms_player.php');
	} else {
		alert_back('添加失败!');
	}
}
if (isset($_GET['del'])) {
	$sql = 'delete from xtcms_player where id = ' . $_GET['del'] . '';
	if (mysql_query($sql)) {
		alert_href('删除成功!', 'cms_player.php');
	} else {
		alert_back('删除失败！');
	}
}
