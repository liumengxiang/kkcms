<?php include('../system/inc.php');
if(!isset($_SESSION['user_name'])){
		alert_href('请登陆后进入','../login.php');
	};
if ( isset($_POST['save']) ) {
null_back($_POST['c_number'],'请填写充值卡号');

//判定卡号是否存在
$result = mysql_query('select * from xtcms_user_card where c_number = "'.$_POST['c_number'].'" and c_used=0');
if($row = mysql_fetch_array($result)){
$_data['u_points'] = $row['c_money']+$_POST['u_points'];
$sql = 'update xtcms_user set '.arrtoupdate($_data).' where u_name="'.$_SESSION['user_name'].'"';	
	if (mysql_query($sql)) {
$data['c_used'] = 1;
$data['c_user'] = $_SESSION['user_name'];
$data['c_usetime'] =time();

$sql = 'update xtcms_user_card set '.arrtoupdate($data).' where c_number = "'.$_POST['c_number'].'"';	
if (mysql_query($sql)) {
		alert_href('充值成功!','chongzhi.php');
}	} else {
		alert_back('充值失败!');
	}
		

}
else{
	alert_back('卡号不存在,或者已经使用');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>会员中心</title>
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
	        <div class="panel-heading">充值</div>
<?php
					$result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');
					if($row = mysql_fetch_array($result)){
					?><div class="panel-body">
			     <form class="form-horizontal" action="" method="post">
				 <input name="u_points" type="hidden" class="form-control" value="<?php echo $row['u_points'];?>">
					<div class="form-group">
					  <label class="col-md-2 control-label" for="profile_truename">用户名</label>
					  <div class="col-md-7 controls radios">
              	        <input type="text"  name="u_name" class="form-control"  value="<?php echo $row['u_name'];?>" disabled>
              	        <div class="help-block" style="display:none;"></div>
            	      </div> 
            		</div>
					<div class="form-group">
						<label class="col-md-2 control-label">卡密</label>
						<div class="col-md-7 controls radios">
<input name="c_number" type="text" class="form-control" value="">
              	        <div class="help-block" style="display:none;"></div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-7 col-md-offset-2">
							<button id="profile-save-btn" type="submit" name="save" class="btn btn-primary js-ajax-submit">保存</button>
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
