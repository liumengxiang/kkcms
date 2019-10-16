<?php
require_once('../system/inc.php');
if(isset($_POST['submit'])){
    if ($_SESSION['verifycode'] != $_POST['verifycode']) {
        alert_href('验证码错误','cms_login.php');
    }
    null_back($_POST['a_name'],'请输入用户名');
    null_back($_POST['a_password'],'请输入密码');
    null_back($_POST['verifycode'],'请输入验证码');
    $a_name = $_POST['a_name'];
    $a_password = $_POST['a_password'];
    $sql = 'select * from xtcms_manager where m_name = "'.$a_name.'" and m_password = "'.md5($a_password).'"';
    $result = mysql_query($sql);
    if(!! $row = mysql_fetch_array($result)){
        setcookie('admin_name',$row['m_name']);
        setcookie('admin_password',$row['m_password']);
        header('location:cms_welcome.php');
    }else{
        alert_href('用户名或密码错误','cms_login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
	
		<!-- Basic -->
    	<meta charset="UTF-8" />

		<title>后台登录</title>
		
		<!-- Mobile Metas -->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		
		<!-- Import google fonts -->
       
		<!-- Favicon and touch icons -->
		<link rel="shortcut icon" href="assets/ico/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="assets/ico/apple-touch-icon.png" />
		<link rel="apple-touch-icon" sizes="57x57" href="assets/ico/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="assets/ico/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="76x76" href="assets/ico/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="assets/ico/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="120x120" href="assets/ico/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="assets/ico/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="152x152" href="assets/ico/apple-touch-icon-152x152.png" />
		
	    <!-- start: CSS file-->
		
		<!-- Vendor CSS-->
		<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/vendor/skycons/css/skycons.css" rel="stylesheet" />
		<link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
		
		<!-- Plugins CSS-->		
		
		<!-- Theme CSS -->
		<link href="assets/css/jquery.mmenu.css" rel="stylesheet" />
		
		<!-- Page CSS -->		
		<link href="assets/css/style.css" rel="stylesheet" />
		<link href="assets/css/add-ons.min.css" rel="stylesheet" />
		
		<style>
			footer {
				display: none;
			}
			body { background: #333333;
			}
		</style>
		
		<!-- end: CSS file-->	
	    
		
		<!-- Head Libs -->
		<script src="assets/plugins/modernizr/js/modernizr.js"></script>
	</head>

	<body>
		<!-- Start: Content -->
		<div class="container-fluid content">
			<div class="row">
				<!-- Main Page -->
				<div class="body-login">
					<div class="center-login">
						<a href="#" class="logo pull-left hidden-xs">
							<img src="assets/img/logo.png" height="45" alt="NADHIF Admin" />
						</a>

						<div class="panel panel-login">
							<div class="panel-title-login text-right">
								<h2 class="title"><i class="fa fa-user"></i> Login</h2>
							</div>
							<div class="panel-body">
								<form method="post">
									<div class="form-group">
										<label>用户名</label>
										<div class="input-group input-group-icon">
											<input name="a_name" type="text" class="form-control bk-noradius" />
											<span class="input-group-addon">
												<span class="icon">
													<i class="fa fa-user"></i>
												</span>
											</span>
										</div>
									</div>

									<div class="form-group">
										<label>密码</label>									
										<div class="input-group input-group-icon">
											<input name="a_password" type="password" class="form-control bk-noradius" />
											<span class="input-group-addon">
												<span class="icon">
													<i class="fa fa-lock"></i>
												</span>
											</span>
										</div>
									</div>
																		<div class="form-group">
										<label>验证码</label>									
										<div class="input-group input-group-icon">
											<input name="verifycode" type="text" class="form-control bk-noradius" style="width:100%"/>
											<span class="input-group-addon" style="width:15%">
<img src="../system/verifycode.php" onclick="javascript:this.src='../system/verifycode.php?'+Math.random()" style="cursor:pointer;" alt="点击更换" title="点击更换" />
											
											</span>
										</div>
									</div>
									<br />
									<div class="row">
										<div class="col-sm-4">
<button type="submit" class="btn btn-primary hidden-xs" name="submit">登录</button>
											<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs bk-margin-top-10" name="submit">登录</button>
										</div>
									</div>

								
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- End Main Page -->
		
				<!-- Usage -->
				<!-- End Usage -->					
		
			</div>
		</div><!--/container-->
		
		
		<!-- start: JavaScript-->
		
		<!-- Vendor JS-->				
		<script src="assets/vendor/js/jquery.min.js"></script>
		<script src="assets/vendor/js/jquery-2.1.1.min.js"></script>
		<script src="assets/vendor/js/jquery-migrate-1.2.1.min.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/vendor/skycons/js/skycons.js"></script>	
		
		<!-- Plugins JS-->
		
		<!-- Theme JS -->		
		<script src="assets/js/jquery.mmenu.min.js"></script>
		<script src="assets/js/core.min.js"></script>
		
		<!-- Pages JS -->
		<script src="assets/js/pages/page-login.js"></script>
		
		<!-- end: JavaScript-->
		
	</body>
	
</html>
