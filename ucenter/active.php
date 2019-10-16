<?php
include('../system/inc.php');
$verify = stripslashes(trim($_GET['verify']));
$nowtime = time();
$query = mysql_query("select u_id from xtcms_user where u_question='$verify'");
$row = mysql_fetch_array($query);
if($row){
	echo $row['u_id'];


$sql = 'update xtcms_user set u_status=1 where u_id="'.$row['u_id'].'"';
if (mysql_query($sql)) {
	
alert_href('激活成功!','login.php');
}

}else{
$msg = 'error.';
}
echo $msg;

?>
