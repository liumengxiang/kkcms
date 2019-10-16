<?php

if (isset($_GET['del'])) {
	$sql = 'delete from xtcms_user_cardclass where id = ' . $_GET['del'] . '';
	$kami = 'delete from xtcms_user_card where c_pass= ' . $_GET['id'] . '';
	mysql_query($kami);
	if (mysql_query($sql)) {
		alert_href('删除成功!', 'cms_kami.php');
	} else {
		alert_back('删除失败！');
	}
}
?>

