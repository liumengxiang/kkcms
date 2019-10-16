<?php

if (isset($_GET['del'])) {
	$sql = 'select * from xtcms_vod_class where c_id = ' . $_GET['del'] . '';
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	mysql_query('delete from xtcms_vod_class where c_id = ' . $_GET['del'] . '');
	mysql_query('delete from xtcms_vod where d_class = ' . $_GET['del'] . '');
	alert_href('删除成功！', 'cms_channel.php');
}
