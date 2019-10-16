<?php
if (!defined('PCFINAL')) {
	exit('Request Error!');
}
function channel_select_list($_var_0, $_var_1, $_var_2, $_var_3)
{
	$_var_4 = '';
	$_var_5 = '';
	$_var_6 = $_var_1;
	$_var_7 = '';
	for ($_var_8 = 0; $_var_8 < $_var_6; $_var_8++) {
		$_var_5 = $_var_5 . '　';
	}
	$_var_7 = $_var_0 == 0 ? '' : '├';
	$_var_6 = $_var_6 + 1;
	$_var_9 = 'select * from xtcms_vod_class where c_pid = ' . $_var_0 . ' and c_id <> ' . $_var_3 . ' order by c_sort asc , c_id asc';
	$_var_10 = mysql_query($_var_9);
	while ($_var_11 = mysql_fetch_array($_var_10)) {
		$_var_12 = $_var_11['c_id'] == $_var_2 ? 'selected="selected"' : '';
		$_var_4 .= '<option value="' . $_var_11['c_id'] . '" ' . $_var_12 . '>' . $_var_5 . $_var_7 . $_var_11['c_name'] . '</option>' . channel_select_list($_var_11['c_id'], $_var_6, $_var_2, $_var_3);
	}
	return $_var_4;
}
function get_channel_level($_var_13, $_var_14 = 1)
{
	$_var_15 = $_var_14;
	$_var_16 = 'select * from xtcms_vod_class where c_id =' . $_var_13 . '';
	$_var_17 = mysql_query($_var_16);
	$_var_18 = mysql_fetch_array($_var_17);
	if ($_var_18['c_pid'] == 0) {
		return $_var_15;
	} else {
		return get_channel_level($_var_18['c_pid'], $_var_15 + 1);
	}
}
function get_channel_sub($_var_19, $_var_20)
{
	$_var_21 = '';
	$_var_22 = ',';
	$_var_23 = 'select * from cms_channel where c_parent = ' . $_var_19 . ' order by c_order asc , id asc ';
	$_var_24 = mysql_query($_var_23);
	while (!!($_var_25 = mysql_fetch_array($_var_24))) {
		$_var_21 .= $_var_22 . $_var_25['id'] . get_channel_sub($_var_25['id'], '');
	}
	return $_var_20 . $_var_21;
}
function get_channel_main($_var_26)
{
	$_var_27 = 'select * from cms_channel where id =' . $_var_26 . '';
	$_var_28 = mysql_query($_var_27);
	$_var_29 = mysql_fetch_array($_var_28);
	if ($_var_29['c_parent'] == 0) {
		return $_var_29['id'];
	} else {
		return get_channel_main($_var_29['c_parent']);
	}
}
function get_channel_ifsub($_var_30)
{
	$_var_31 = mysql_query('select * from cms_channel where c_parent = ' . $_var_30 . ' ');
	if (mysql_fetch_array($_var_31)) {
		return 1;
	} else {
		return 0;
	}
}
function channel_manage($_var_32, $_var_33)
{
	$_var_34 = '';
	$_var_35 = $_var_33;
	$_var_36 = '';
	$_var_37 = mysql_query('select * from xtcms_vod_class where c_pid= ' . $_var_32 . ' order by c_sort asc , c_id asc ');
	for ($_var_38 = 0; $_var_38 < $_var_35; $_var_38++) {
		$_var_36 = $_var_36 . '　';
	}
	$_var_39 = $_var_32 == 0 ? '' : '├';
	$_var_35 = $_var_35 + 1;
	while (!!($_var_40 = mysql_fetch_array($_var_37))) {
		$_var_34 .= '<tr>
					<td>' . $_var_40['c_id'] . '</td>
					<td>' . $_var_40['c_sort'] . '</td>
					<td>' . $_var_40['c_name'] . '</td>

					<td><a class="btn btn-default" href="cms_detail_add.php?cid=' . $_var_40['c_id'] . '"><span class="glyphicon glyphicon-plus"> 添加</span></a>&nbsp<a class="btn btn-primary" href="cms_detail.php?cid=' . $_var_40['c_id'] . '"><span class="glyphicon glyphicon-film"> 管理</span></a></td>
					<td><a class="btn btn-success" href="cms_channel_edit.php?id=' . $_var_40['c_id'] . '"><span class="icon-edit"> 修改</span></a>&nbsp<a class="btn bg-dot" href="cms_channel.php?del=' . $_var_40['c_id'] . '" onclick="return confirm(\'确定要删除吗？\')"><span class="icon-times"> 删除</span></a></td>
				</tr>' . channel_manage($_var_40['c_id'], $_var_35);
	}
	return $_var_34;
}
function get_channel_name($_var_41)
{
	$_var_42 = mysql_query('select * from xtcms_vod_class where c_id=' . $_var_41 . '');
	if (!!($_var_43 = mysql_fetch_array($_var_42))) {
		return $_var_43['c_name'];
	} else {
		return '';
	}
}
function get_usergroup_name($_var_44)
{
	$_var_45 = mysql_query('select * from xtcms_user_group where ug_id=' . $_var_44 . '');
	if (!!($_var_46 = mysql_fetch_array($_var_45))) {
		return $_var_46['ug_name'];
	} else {
		return '';
	}
}
function get_player($_var_47)
{
	$_var_48 = mysql_query('select * from xtcms_vod where d_id =' . $_var_47 . '');
	if (!!($_var_49 = mysql_fetch_array($_var_48))) {
		return $_var_49['d_player'];
	} else {
		return '';
	}
}
function get_vodurllist($_var_50)
{
	$_var_51 = mysql_query('select * from xtcms_vod where d_id =' . $_var_50 . '');
	if (!!($_var_52 = mysql_fetch_array($_var_51))) {
		$_var_53 = explode('
', $_var_52['d_scontent']);
		for ($_var_54 = 0; $_var_54 < count($_var_53); $_var_54++) {
			$_var_53[$_var_54] = explode('$', $_var_53[$_var_54]);
			echo '<li><a href="./jx.php?url=' . $_var_52['d_player'] . '' . $_var_53[$_var_54][1] . '" class="am-btn am-btn-default lipbtn" target="ajax" id="">' . $_var_53[$_var_54][0] . '</a></li>';
		}
	} else {
		return '';
	}
}
function get_vodurl($_var_55)
{
	$_var_56 = mysql_query('select * from xtcms_vod where d_id =' . $_var_55 . '');
	if (!!($_var_57 = mysql_fetch_array($_var_56))) {
		$_var_58 = explode('
', $_var_57['d_scontent']);
		for ($_var_59 = 0; $_var_59 < count($_var_58); $_var_59++) {
			$_var_58[$_var_59] = explode('$', $_var_58[$_var_59]);
		}
		echo $_var_57['d_player'] . $_var_58[0][1];
	} else {
		return '';
	}
}
function getPageHtml($_var_60, $_var_61, $_var_62)
{
	$_var_63 = 5;
	$_var_60 = $_var_60 < 1 ? 1 : $_var_60;
	$_var_60 = $_var_60 > $_var_61 ? $_var_61 : $_var_60;
	$_var_61 = $_var_61 < $_var_60 ? $_var_60 : $_var_61;
	$_var_64 = $_var_60 - floor($_var_63 / 2);
	$_var_64 = $_var_64 < 1 ? 1 : $_var_64;
	$_var_65 = $_var_60 + floor($_var_63 / 2);
	$_var_65 = $_var_65 > $_var_61 ? $_var_61 : $_var_65;
	$_var_66 = $_var_65 - $_var_64 + 1;
	if ($_var_66 < $_var_63 && $_var_64 > 1) {
		$_var_64 = $_var_64 - ($_var_63 - $_var_66);
		$_var_64 = $_var_64 < 1 ? 1 : $_var_64;
		$_var_66 = $_var_65 - $_var_64 + 1;
	}
	if ($_var_66 < $_var_63 && $_var_65 < $_var_61) {
		$_var_65 = $_var_65 + ($_var_63 - $_var_66);
		$_var_65 = $_var_65 > $_var_61 ? $_var_61 : $_var_65;
	}
	if ($_var_60 > 1) {
		$_var_67 .= '<li><a  title="上一页" href="' . $_var_62 . ($_var_60 - 1) . '"">上一页</a></li>';
	}
	for ($_var_68 = $_var_64; $_var_68 <= $_var_65; $_var_68++) {
		if ($_var_68 == $_var_60) {
			$_var_67 .= '<li><a style="background:#FF9900;"><font color="#fff">' . $_var_68 . '</font></a></li>';
		} else {
			$_var_67 .= '<li><a href="' . $_var_62 . $_var_68 . '">' . $_var_68 . '</a></li>';
		}
	}
	if ($_var_60 < $_var_65) {
		$_var_67 .= '<li><a  title="下一页" href="' . $_var_62 . ($_var_60 + 1) . '"">下一页</a></li>';
	}
	return $_var_67;
}

function curl_get($url)
{
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 4.4.1; zh-cn; R815T Build/JOP40D) AppleWebKit/533.1 (KHTML, like Gecko)Version/4.0 MQQBrowser/4.5 Mobile Safari/533.1');
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	$content = curl_exec($ch);
	curl_close($ch);
	return ($content);
}
