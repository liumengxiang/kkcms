<?php 
include('../system/inc.php');
if(isset($_SESSION['user_name'])){
header('location:index.php');
};
	
if(isset($_POST['submit'])){
$username = stripslashes(trim($_POST['name']));
$email = trim($_POST['email']);
// 检测用户名是否存在
$query = mysql_query("select u_id from xtcms_user where u_name='$username' and u_email='$email'");
if(!! $row = mysql_fetch_array($query)){
$_data['u_password'] = md5(123456);
$sql = 'update xtcms_user set '.arrtoupdate($_data).' where u_name="'.$username.'"';
if (mysql_query($sql)) {
	
$token =$row['u_question'];
include("emailconfig.php");
    //创建$smtp对象 这里面的一个true是表示使用身份验证,否则不使用身份验证.
    $smtp = new Smtp($MailServer, $MailPort, $smtpuser, $smtppass, true); 
    $smtp->debug = false; 
    $mailType = "HTML"; //信件类型，文本:text；网页：HTML
    $email = $email;  //收件人邮箱
    $emailTitle = "".$xtcms_name."用户找回密码"; //邮件主题
    $emailBody = "亲爱的".$username."：<br/>感谢您在我站注册帐号。<br/>您的初始密码为123456<br/>如果此次找回密码请求非你本人所发，请忽略本邮件。<br/><p style='text-align:right'>-------- ".$xtcms_name." 敬上</p>";
    
    // sendmail方法
    // 参数1是收件人邮箱
    // 参数2是发件人邮箱
    // 参数3是主题（标题）
    // 参数4是邮件主题（标题）
    // 参数4是邮件内容  参数是内容类型文本:text 网页:HTML
    $rs = $smtp->sendmail($email, $smtpMail, $emailTitle, $emailBody, $mailType);
if($rs==true){
echo '<script>alert("请登录到您的邮箱查看您的密码！");window.history.go(-1);</script>';
}else{
echo "找回密码失败";
}

}
}
}

?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<title>找回密码-<?php echo $xtcms_seoname;?></title>
<meta name="keywords" content="<?php echo $xtcms_keywords;?>">
<meta name="description" content="<?php echo $xtcms_description;?>">
<link href="css/bootstrap.css" rel="stylesheet" />
<link rel="stylesheet" media="screen" href="css/common.css" />
<link rel="stylesheet" media="screen" href="css/main.css" />
<link rel="stylesheet" media="screen" href="css/es-icon.css" />
<link rel="stylesheet" media="screen" href="css/iconfont.css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" media="screen" href="css/theme.css" />
<link href="cssdefault.css" rel="stylesheet" />
<!--[if lt IE 9]>    
	<script src="../style/js/html5shiv.js"></script>   
	<script src="../style/js/respond.min.js"></script>  
<![endif]-->
<script type="text/javascript">
function chk_form(){
var user = document.getElementById("user");
if(user.value==""){
alert("用户名不能为空！");
return false;
//user.focus();
}
var email = document.getElementById("email");
if(email.value==""){
alert("Email不能为空！");
return false;
//email.focus();
}
var preg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/; //匹配Email
if(!preg.test(email.value)){ 
alert("Email格式错误！");
return false;
//email.focus();
}
}
</script>
</head>
<body>	
<?php include('head.php');?>
<div id="wrapper" class="pad-bottom">
   <div id="content-container" class="container">
        <div class="es-section login-section">
  <div class="logon-tab clearfix">
    <a class="active">找回密码</a>
<a href="login.php">登录帐号</a>
  </div>
  <div class="login-main">
    <form class="form-horizontal js-ajax-form" method="post" onsubmit="return chk_form();">
        <label class="control-label" for="login_username">帐号</label>
        <div class="controls">
           <input type="text" name="name" id="user" placeholder="帐号" value="" class="form-control input-lg span4">
          <div class="help-block"></div>
        </div>
        <label class="control-label" for="login_password">邮箱</label>
        <div class="controls" style="margin-bottom:10px;">
          <input type="text" name="email" id="email" placeholder="邮箱" class="form-control input-lg span4">
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block js-ajax-submit" name="submit" style="margin-left: 0px;margin-top:30px;margin-bottom:10px;">找回密码</button>
    </form>

    <div class="mbl">
	  <a href="login.php">登录</a>
      <span class="text-muted mhs">|</span>
      <span class="text-muted">还没有注册帐号？</span>
      <a href="reg.php">立即注册</a>
    </div>
    <div class="social-login">
        <div class="line"></div>
    </div>
   </div>
  </div>
</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/wind.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/frontend.js"></script>
<script src="js/artDialog/artDialog.js"></script>
<footer class="es-footer">
  <div class="copyright">
    <div class="container"><?php echo $xtcms_copyright;?>
       
    </div>
  </div>
</footer>    
</body>
</html>
