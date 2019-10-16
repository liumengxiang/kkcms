<?php

if (isset($_POST['save'])) {
	$weishu = $_POST['weishu'];
	$title = $_POST['title'];
	$card_id = $_POST['card_id'];
	$num = $_POST['num'];
	$userid = $_POST['userid'];
	$day = $_POST['day'];
	$uniacid = $_POST['userid'];
	$c_addtime = time();
	function getkm($_var_0 = 32)
	{
		$_var_1 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$_var_2 = strlen($_var_1);
		$_var_3 = '';
		for ($_var_4 = 0; $_var_4 < $_var_0; $_var_4++) {
			$_var_3 .= $_var_1[mt_rand(0, $_var_2 - 1)];
		}
		return $_var_3;
	}
	for ($i = 0; $i < $num; $i++) {
		$km = getkm($weishu);
		$SQL = "INSERT INTO `xtcms_user_card` (`c_id`, `c_number`, `c_money`, `c_addtime`, `c_pass`, `c_userid`) VALUES (NULL, '{$km}', '{$day}', '{$c_addtime}', '{$card_id}', '{$userid}')";
		mysql_query($SQL);
	}
	$sql = "INSERT INTO `xtcms_user_cardclass` (`uniacid`,`title`, `card_id`, `num`, `userid`, `day`) VALUES ('{$uniacid}','{$title}', '{$card_id}', '{$num}', '{$userid}', '{$day}')";
	mysql_query($sql);
	echo '<script>alert(\'生成卡密成功，一共生成 ' . $num . ' 张卡密！\');location.href=\'cms_kami.php\'</script>';
	mysql_close();
}
