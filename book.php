<?php 
include('system/inc.php');
if(isset($_POST['submit'])){
	if ($_SESSION['verifycode'] != $_POST['verifycode']) {
		alert_href('验证码错误','book.php');
	}
    null_back($_POST['userid'],'请填写昵称');
	null_back($_POST['content'],'请填写留言内容');
	$data['userid'] = $_POST['userid'];
	$data['content'] =addslashes($_POST['content']);
	$data['time'] =date('y-m-d h:i:s',time());
	
	$str = arrtoinsert($data);
		$sql = 'insert into xtcms_book ('.$str[0].') values ('.$str[1].')';
	if(mysql_query($sql)){

alert_href('留言成功!小的马上为您准备相关资源！','book.php');
}
else{
alert_back('抱歉！服务器好像开小差了呢！');
	}
	
	
}
include('template/'.$xtcms_bdyun.'/book.php');
?>