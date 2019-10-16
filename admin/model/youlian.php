<?php
if (isset($_POST['execute'])) {
	null_back($_POST['id'], '请至少选中一项！');
	$s = '';
	$id = '';
	foreach ($_POST['id'] as $value) {
		$id .= $s . $value;
		$s = ',';
	}
	switch ($_POST['execute_method']) {
		case 'delete':
			$sql = 'delete from xtcms_youlian where id in (' . $id . ')';
			break;
		default:
			alert_back('请选择要执行的操作');
	}
	mysql_query($sql);
	alert_href('执行成功!', 'cms_youlian.php');
}
if (isset($_POST['shift'])) {
	null_back($_POST['id'], '请至少选中一项！');
	$s = '';
	$id = '';
	foreach ($_POST['id'] as $value) {
		$id .= $s . $value;
		$s = ',';
	}
	null_back($_POST['shift_target'], '请选择要转移到的频道');
	mysql_query('update xtcms_vod set d_parent = ' . $_POST['shift_target'] . ' where d_id in (' . $id . ')');
	alert_href('转移成功!', 'cms_detail.php?cid=0');
}
