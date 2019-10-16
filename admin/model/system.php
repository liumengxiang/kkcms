<?php

if (isset($_POST['save'])) {
	$_data['s_domain'] = $_POST['s_domain'];
	$_data['s_name'] = $_POST['s_name'];
	$_data['s_seoname'] = $_POST['s_seoname'];
	$_data['s_keywords'] = $_POST['s_keywords'];
	$_data['s_description'] = $_POST['s_description'];
	$_data['s_copyright'] = $_POST['s_copyright'];
	$_data['s_cache'] = $_POST['s_cache'];
	$_data['s_wei'] = $_POST['s_wei'];
	$_data['s_hong'] = $_POST['s_hong'];
	$_data['s_icp']=$_POST['s_icp'];
	$_data['s_yulu']=$_POST['s_yulu'];
	$_data['s_logo'] = $_POST['s_logo'];
	$_data['s_weixin'] = $_POST['s_weixin'];
	$_data['s_dashang'] = $_POST['s_dashang'];
	$_data['s_jiekou'] = $_POST['s_jiekou'];
	$_data['s_changyan'] = $_POST['s_changyan'];
	$_data['s_tongji'] = $_POST['s_tongji'];
	$_data['s_qianxian'] = $_POST['s_qianxian'];
	$_data['s_dianying'] = $_POST['s_dianying'];
	$_data['s_dianshi'] = $_POST['s_dianshi'];
	$_data['s_zongyi'] = $_POST['s_zongyi'];
	$_data['s_dongman'] = $_POST['s_dongman'];
	$_data['s_pc'] = $_POST['s_pc'];
	$_data['s_mjk'] = $_POST['s_mjk'];
	$_data['s_shoufei'] = $_POST['s_shoufei'];
	$_data['s_gonggao'] = $_POST['s_gonggao'];
	$_data['s_tixing'] = $_POST['s_tixing'];
	$_data['s_hctime'] = $_POST['s_hctime'];
	$_data['s_beijing'] = $_POST['s_beijing'];
	$_data['s_dianyingnew'] = $_POST['s_dianyingnew'];
	$_data['s_dongmannew'] = $_POST['s_dongmannew'];
	$_data['s_zongyinew'] = $_POST['s_zongyinew'];
	$_data['s_shouquan'] = $_POST['s_shouquan'];
	$_data['s_miaoshu'] = $_POST['s_miaoshu'];
	$sql = 'update xtcms_system set ' . arrtoupdate($_data) . ' where id = 1';
	if (mysql_query($sql)) {
		alert_href('系统设置修改成功!', 'cms_system.php');
	} else {
		alert_back('修改失败!');
	}
}
