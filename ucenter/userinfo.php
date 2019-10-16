<?php include('../system/inc.php');
if(!isset($_SESSION['user_name'])){
		alert_href('请登陆后进入','login.php');
	};
if ( isset($_POST['save']) ) {
	null_back($_POST['u_password'],'请填写登录密码');
	$result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');
    if($row = mysql_fetch_array($result)){
if ($_POST['u_password'] != $row['u_password']) {
$_data['u_password'] = md5($_POST['u_password']);
	}
	else{
$_data['u_password'] = $_POST['u_password'];	
	}
	}

	$_data['u_email'] = $_POST['u_email'];
	$_data['u_phone'] = $_POST['u_phone'];
	$_data['u_qq'] = $_POST['u_qq'];
$sql = 'update xtcms_user set '.arrtoupdate($_data).' where u_name="'.$_SESSION['user_name'].'"';
	if (mysql_query($sql)) {
		alert_href('修改成功!','userinfo.php');
	} else {
		alert_back('修改失败!');
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
<title>会员中心-<?php echo $xtcms_seoname;?></title>
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
	<script src="js/html5shiv.js"></script>   
	<script src="js/respond.min.js"></script>  
<![endif]-->
</head>
<body>
<?php include('head.php');?>

<div id="content-container" class="container">

      <div class="row row-3-9">
<?php include('left.php');?>
        <div class="col-md-9">	
          <div class="panel panel-default panel-col">
	        <div class="panel-heading">基础信息</div>
	           <?php
					$result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');
					if($row = mysql_fetch_array($result)){
					?><div class="panel-body">
			     <form class="form-horizontal" action="" method="post">
					<div class="form-group">
					  <label class="col-md-2 control-label" for="profile_truename">用户名</label>
					  <div class="col-md-7 controls radios">
              	        <input type="text"  name="u_name" class="form-control"  value="<?php echo $row['u_name'];?>">
              	        <div class="help-block" style="display:none;"></div>
            	      </div> 
            		</div>
					<div class="form-group">
						<label class="col-md-2 control-label">密码</label>
						<div class="col-md-7 controls radios">
<input name="u_password" type="password" class="form-control"  value="<?php echo $row['u_password'];?>">
              	        <div class="help-block" style="display:none;"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="profile_mobile" class="col-md-2 control-label">手机号码</label>
							<div class="col-md-7 controls">
		           	             
								  <input type="text"  name="u_phone" class="form-control" value="<?php echo $row['u_phone'];?>">

							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">QQ</label>
							<div class="col-md-7 controls">
								<input type="text" id="profile_weixin" name="u_qq" class="form-control" value="<?php echo $row['u_qq'];?>">
								<div class="help-block" style="display:none;"></div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">email</label>
							<div class="col-md-7 controls">
					<input type="text" id="profile_weixin" name="u_email" class="form-control" value="<?php echo $row['u_email'];?>">
								<div class="help-block" style="display:none;"></div>
							</div>
						</div>

					<div class="row">
						<div class="col-md-7 col-md-offset-2">
							<button id="profile-save-btn" name="save" type="submit" class="btn btn-primary js-ajax-submit">保存</button>
						</div>
					</div>
			    </form>
		       </div><?php
						}
					?>
	         </div>
          </div>
     </div>
  </div>
  <script src="public/jquery.js"></script>
<script src="public/wind.js"></script>
<script src="public/bootstrap.min.js"></script>
<script src="public/frontend.js"></script>
<script src="public/artDialog/artDialog.js"></script>
<script src="public/jquery.cityselect.js"></script>
<script type="text/javascript">
var p=document.getElementById('p').value;
var c=document.getElementById('c').value;
var d=document.getElementById('d').value;
  $(function(){
		$("#city").citySelect({
			nodata:"none",
			prov:p,
			city:c,
			dist:d,
			required:false
		}); 
	});
</script> 
<footer class="es-footer">
  <div class="copyright">
    <div class="container"><?php echo $xtcms_copyright;?>
       
    </div>
  </div>
</footer>   
</body>

</html>
