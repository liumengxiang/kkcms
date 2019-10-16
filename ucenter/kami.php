<?php include('../system/inc.php');
if(!isset($_SESSION['user_name'])){
		alert_href('请登陆后进入','../login.php');
	};
if ( isset($_POST['save']) ) {
null_back($_POST['c_number'],'请填写充值卡号');

//判定卡号是否存在
$result = mysql_query('select * from xtcms_user_card where c_number = "'.$_POST['c_number'].'" and c_used=0');
if($row = mysql_fetch_array($result)){
$day1= $row['c_money'];//天数
$group= $row['c_userid'];//会员组id
//获取会员组的参数

$day=round($day1);//除法取整
//获取会员开通天数
$result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');
if($row = mysql_fetch_array($result)){
$u_group=$row['u_group'];//会员组
$send = $row['u_end'];//截止时间
}
if ($u_group>$group){alert_href('您现在所属会员组的权限制大于等于目标会员组权限值，不能降级!','kami.php');}
//判定时间是否到期
if($send < time()){
$u_end = time()+ 86400*$day;//到期增加天数
}
else{
$u_end = $send + 86400*$day;//没到期增加天数
}
//更新数据
$_data['u_group'] =$group;
$_data['u_start'] =time();
$_data['u_end'] =$u_end;
$sql = 'update xtcms_user set '.arrtoupdate($_data).' where u_name="'.$_SESSION['user_name'].'"';	
	if (mysql_query($sql)) {
$data['c_used'] = 1;
$data['c_user'] = $_SESSION['user_name'];
$data['c_usetime'] =time();

$sql = 'update xtcms_user_card set '.arrtoupdate($data).' where c_number = "'.$_POST['c_number'].'"';	
if (mysql_query($sql)) {
		alert_href('激活成功!','kami.php');
}	} else {
		alert_back('激活失败!');
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
	        <div class="panel-heading">兑换码激活卡</div>
<?php
					$result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');
					if($row = mysql_fetch_array($result)){
					?><div class="panel-body">
			     <form class="form-horizontal" action="" method="post">
				 <input name="u_points" type="hidden" class="form-control" value="<?php echo $row['u_points'];?>">
				  <input type="hidden"  name="u_name" class="form-control"  value="<?php echo $row['u_name'];?>" disabled>

					<div class="form-group">
						<label class="col-md-2 control-label">兑换码</label>
						<div class="col-md-7 controls radios">
<input name="c_number" type="text" class="form-control" value="">
              	        <div class="help-block" style="display:none;"></div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-7 col-md-offset-2">
							<button id="profile-save-btn" type="submit" name="save" class="btn btn-primary js-ajax-submit">激活会员卡</button>
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
