<?php 
include('../system/inc.php');
if(isset($_SESSION['user_name'])){
header('location:index.php');
};
	
if(isset($_POST['submit'])){
$username = stripslashes(trim($_POST['name']));
// 检测用户名是否存在
$query = mysql_query("select u_id from xtcms_user where u_name='$username'");
if(mysql_fetch_array($query)){
echo '<script>alert("用户名已存在，请换个其他的用户名");window.history.go(-1);</script>';
exit;
}
$result = mysql_query('select * from xtcms_user where u_email = "'.$_POST['email'].'"');
if(mysql_fetch_array($result)){
echo '<script>alert("邮箱已存在，请换个其他的邮箱");window.history.go(-1);</script>';
exit;
}
$password = md5(trim($_POST['password']));
$email = trim($_POST['email']);
$regtime = time();
$token = md5($username.$password.$regtime); //创建用于激活识别码
$token_exptime = time()+60*60*24;//过期时间为24小时后
$data['u_name'] = $username;
$data['u_password'] =$password;
$data['u_email'] = $email;
$data['u_regtime'] =$regtime;
if($xtcms_mail==1){
$data['u_status'] =0;
	}else{
$data['u_status'] =1;
	}
$data['u_group'] =1;
$data['u_fav'] =0;
$data['u_plays'] =0;
$data['u_downs'] =0;
//推广注册
if (isset($_GET['tg'])) {
	$data['u_qid'] =$_GET['tg'];
	$result = mysql_query('select * from xtcms_user where u_id="'.$_GET['tg'].'"');
if($row = mysql_fetch_array($result)){

$u_points=$row['u_points'];
}
	}
$_data['u_points'] =$u_points+$xtcms_tuiguang;
$sql = 'update xtcms_user set '.arrtoupdate($_data).' where u_id="'.$_GET['tg'].'"';
if (mysql_query($sql)) {}	
$data['u_question'] =$token;
$str = arrtoinsert($data);
$sql = 'insert into xtcms_user ('.$str[0].') values ('.$str[1].')';
if (mysql_query($sql)) {
if($xtcms_mail==1){
//写入数据库成功，发邮件
include("emailconfig.php");
    //创建$smtp对象 这里面的一个true是表示使用身份验证,否则不使用身份验证.
    $smtp = new Smtp($MailServer, $MailPort, $smtpuser, $smtppass, true); 
    $smtp->debug = false; 
    $mailType = "HTML"; //信件类型，文本:text；网页：HTML
    $email = $email;  //收件人邮箱
    $emailTitle = "".$xtcms_name."用户帐号激活"; //邮件主题
    $emailBody = "亲爱的".$username."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/><a href='".$xtcms_domain."ucenter/active.php?verify=".$token."' target='_blank'>".$xtcms_domain."ucenter/active.php?verify=".$token."</a><br/>如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。<br/>如果此次激活请求非你本人所发，请忽略本邮件。<br/><p style='text-align:right'>-------- ".$xtcms_name." 敬上</p>";
    
    // sendmail方法
    // 参数1是收件人邮箱
    // 参数2是发件人邮箱
    // 参数3是主题（标题）
    // 参数4是邮件主题（标题）
    // 参数4是邮件内容  参数是内容类型文本:text 网页:HTML
    $rs = $smtp->sendmail($email, $smtpMail, $emailTitle, $emailBody, $mailType);
if($rs==true){
echo '<script>alert("恭喜您，注册成功！请登录到您的邮箱及时激活您的帐号！");window.history.go(-1);</script>';
}
}
if($xtcms_smsname!=""){
if($_POST['txtsmscode']=="" || $_POST['txtsmscode']!=$_SESSION['mobilecode']){
echo "<script type='text/javascript'>alert('短信验证码不能为空！');history.go(-1);</script>"; 
}
else{
	echo '<script>alert("恭喜您，注册成功！");window.history.go(-1);</script>';	
}	
}
else
{
echo '<script>alert("恭喜您，注册成功！");window.history.go(-1);</script>';	
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
<title>会员登录-<?php echo $xtcms_seoname;?></title>
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
<script src="jquery-1.4a2.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>    
	<script src="../style/js/html5shiv.js"></script>   
	<script src="../style/js/respond.min.js"></script>  
<![endif]-->
<script type="text/javascript">
function chk_form(){
var tel = document.getElementById("tel");
if(tel.value==""){
alert("用户名不能为空！");
return false;
//user.focus();
}
var pass = document.getElementById("pass");
if(pass.value==""){
alert("密码不能为空！");
return false;
//pass.focus();
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
<script type="text/javascript">
				/*-------------------------------------------*/
				var InterValObj; //timer变量，控制时间
				var count = 60; //间隔函数，1秒执行
				var curCount;//当前剩余秒数
				var code = ""; //验证码
				var codeLength = 6;//验证码长度
				function sendMessage() {
							curCount = count;
							var dealType; //验证方式
				tel = $('#tel').val();
		    if(tel!=''){
			
			//验证手机有效性
			 var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(14[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
            if(!myreg.test($('#tel').val())) 
          { 
             alert('请输入有效的手机号码！'); 
             return false; 
          } 
			tel = $('#tel').val();
			   //产生验证码
				for (var i = 0; i < codeLength; i++) {
								code += parseInt(Math.random() * 9).toString();
							}
							//设置button效果，开始计时
								$("#btnSendCode").attr("disabled", "true");
								$("#btnSendCode").val("请在" + curCount + "秒内输入");
								InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
				//向后台发送处理数据
                $.ajax({
                    type: "POST", //用POST方式传输
                    dataType: "text", //数据格式:JSON
                    url: '/ucenter/yanzhengma.php', //目标地址
                    data: "&tel=" + tel + "&code=" + code,
                    error: function (XMLHttpRequest, textStatus, errorThrown) { },
                    success: function (msg){ }
                });
			
		        }else{
			alert('请填写手机号码');
		        }
				
            }
				//timer处理函数
			function SetRemainTime() {
					if (curCount == 0) {                
						window.clearInterval(InterValObj);//停止计时器
						$("#btnSendCode").removeAttr("disabled");//启用按钮
						$("#btnSendCode").val("重新发送验证码");
						code = ""; //清除验证码。如果不清除，过时间后，输入收到的验证码依然有效    
					}
					else {
						curCount--;
						$("#btnSendCode").val("请在" + curCount + "秒内输入");
					}
				}
    </script>
</head>
<body>	
<?php include('head.php');
?>
<div id="wrapper" class="pad-bottom">
   <div id="content-container" class="container">
        <div class="es-section login-section">
  <div class="logon-tab clearfix">
    <a href="login.php">登录帐号</a>
    <a class="active">注册帐号</a>
  </div>
  <div class="login-main">
      <form class="form-horizontal js-ajax-form"  method="post" onsubmit="return chk_form();">
		   <label class="control-label required">用户名</label>
	       <div class="control-group" style="margin-bottom:10px;">
			 <input type="text" name="name" id="tel" placeholder="作为登陆帐号使用" value="" class="form-control input-lg span4">
		   </div>
		   <label class="control-label required" >邮箱</label>
	       <div class="control-group" style="margin-bottom:10px;">
			 <input type="text" name="email" id="email" placeholder="邮箱" class="form-control input-lg span4">
		   </div>
<?php if($xtcms_smsname!=""){?>
<label class="control-label required" >手机验证码</label> 
<div class="control-group" style="margin-bottom:10px;"> 
<input type="text" name="txtsmscode" id="txtsmscode" placeholder="点击右侧获取" class="form-control input-lg span4" style="width:200px;float:left;margin-right:5px;">
 <input id="btnSendCode" class="form-control input-lg js-ajax-dialog-btn" type="button" value="获取验证码" onclick="sendMessage()" style="width:130px" /> </div>

<?php }?>		   
		   <label class="control-label required" >密码</label>
		   <div class="control-group" style="margin-bottom:10px;">
			 <input type="password" name="password" id="pass" placeholder="登陆密码,请牢记!" class="form-control input-lg span4">
		   </div>
			  
			  <div class="control-group">
				<button class="btn btn-primary js-ajax-submit btn-lg btn-block" type="submit" name="submit" data-wait="1500" style="margin-left: 0px;margin-top:30px;">确定注册</button>
			  </div>
		</form>
     </div>
    </div>
   </div>
  </div>

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
