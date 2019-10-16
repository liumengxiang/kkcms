<?php

if (isset($_GET['del'])) {
	$sql = 'delete from xtcms_ad where id = ' . $_GET['del'] . '';
	if (mysql_query($sql)) {
		alert_href('删除成功!', 'cms_ad.php');
	} else {
		alert_back('删除失败！');
	}
}
if (isset($_POST['save'])) {
	null_back($_POST['title'], '请填写广告名称');
	$data['title'] = $_POST['title'];
	$data['pic'] = $_POST['pic'];
	$data['catid'] = $_POST['catid'];
	$str = arrtoinsert($data);
	$sql = 'insert into xtcms_ad (' . $str[0] . ') values (' . $str[1] . ')';
	if (mysql_query($sql)) {
		alert_href('广告添加成功!', 'cms_ad.php');
	} else {
		alert_back('添加失败!');
	}
}
