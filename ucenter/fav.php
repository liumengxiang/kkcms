<?php include('../system/inc.php');
if(!isset($_SESSION['user_name'])){
		alert_href('请登陆后进入','../login.php');
	};
$result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');
					if($row = mysql_fetch_array($result)){
$u_id=$row['u_id'];
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
	        <div class="panel-heading">收藏记录</div>
<div class="panel-body">

								
					<div class="form-group">
<table class="table table-bordered">
							<tr>
								<th>ID</th>
								<th>名称</th>
								<th>地址</th>

							</tr>
							<?php
                            $result = mysql_query('select * from xtcms_fav where userid="'.$u_id.'"');
							while($row= mysql_fetch_array($result)){
							?>
							<tr>
								<td><?php echo $row['id'] ?></td>
								<td><?php echo $row['name'] ?></td>
								<td><a href="<?php echo $row['url'] ?>">继续观看</a></td>
								</td>
								
							</tr>
							<?php } ?>

						</table>
            		</div>


		       </div>
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
