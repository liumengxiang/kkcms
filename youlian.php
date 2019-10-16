<?php 
include('system/inc.php');
if(isset($_POST['submit'])){
null_back('admin','.');
	null_back($_POST['content'],'你的链接及网站名');
	$data['userid'] = $_POST['userid'];
	$data['content'] =addslashes($_POST['content']);
	$data['time'] =date('y-m-d h:i:s',time());
	
	$str = arrtoinsert($data);
		$sql = 'insert into xtcms_youlian ('.$str[0].') values ('.$str[1].')';
	if(mysql_query($sql)){

alert_href('申请成功！请耐心等待管理员核实！谢谢！','youlian.php');
}
else{
alert_back('申请失败！请联系网站底部邮箱申请吧！');
	}
	
	
}
include('template/'.$xtcms_bdyun.'/youlian.php');
?>
