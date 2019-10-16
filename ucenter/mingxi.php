<?php 
include('../system/inc.php');
if(!isset($_SESSION['user_name'])){
		alert_href('请登陆后进入','../login.php');
	};
if ( isset($_POST['save']) ) {
if ($_POST['pay']==1){

//判定会员组别
$result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');
if($row = mysql_fetch_array($result)){

$u_points=$row['u_points'];
$u_group=$row['u_group'];
$send = $row['u_end'];

//获取会员卡信息
$card= mysql_query('select * from xtcms_userka where id="'.$_POST['cardid'].'"');
if($row2 = mysql_fetch_array($card)){
$day=$row2['day'];//天数
$userid=$row2['userid'];//会员组
$jifen=$row2['jifen'];//积分
}
//判定会员组
if ($row['u_group']>$userid){ 
alert_href('您现在所属会员组的权限制大于等于目标会员组权限值，不需要升级!','mingxi.php');
}

$baoshi=$day;//点数
if($u_group>1){//判定已经是会员
	
if ($u_points>=$jifen) {//如果点数大于包时数
$_data['u_points'] =$u_points-$baoshi;//扣点
$_data['u_group'] =$userid;
if($send < time()){
$u_end = time()+ 86400*$day;
}
else{
$u_end = $send + 86400*$day;
}
$_data['u_start'] =time();
$_data['u_end'] =$u_end;
$sql = 'update xtcms_user set '.arrtoupdate($_data).' where u_name="'.$_SESSION['user_name'].'"';
if (mysql_query($sql)) {
alert_href('续费成功!','mingxi.php');
}

}
	else{
alert_href('您的积分不够，无法续费,请继续赚取积分或其他方式购买会员!','mingxi.php');
}
}
else{//普通会员充值
if ($u_points>=$baoshi) {//如果点数大于包时数
$_data['u_points'] =$u_points-$baoshi;
$_data['u_group'] =$userid;
$u_end = time()+ 86400*$day;
$_data['u_start'] =time();
$_data['u_end'] =$u_end;
$_data['u_flag'] =1;
$sql = 'update xtcms_user set '.arrtoupdate($_data).' where u_name="'.$_SESSION['user_name'].'"';
if (mysql_query($sql)) {
alert_href('升级成功!','mingxi.php');
}

}
	else{
alert_href('您的积分不够，无法升级到该会员组,请充值!','mingxi.php');
}	
}
}
}
else{
//获取会员卡信息
$card= mysql_query('select * from xtcms_userka where id="'.$_POST['cardid'].'"');
if($row2 = mysql_fetch_array($card)){
$day=$row2['day'];//天数
$userid=$row2['userid'];//会员组
$money=$row2['money'];//积分
}

$result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');
if($row = mysql_fetch_array($result)){

$u_points=$row['u_points'];
$u_group=$row['u_group'];
$send = $row['u_end'];
if ($row['u_group']>$userid){ 
alert_href('您现在所属会员组的权限制大于等于目标会员组权限值，不需要升级!','mingxi.php');
}
}
require_once("pay/epay.config.php");
require_once("pay/lib/epay_submit.class.php");

/**************************请求参数**************************/
        $notify_url = 'http://'.$_SERVER['HTTP_HOST'].'/ucenter/pay/notify_url.php';
        //需http://格式的完整路径，不能加?id=123这类自定义参数

        //页面跳转同步通知页面路径
        $return_url = 'http://'.$_SERVER['HTTP_HOST'].'/ucenter/pay/return_url.php';
        //需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/

        //商户订单号
        $out_trade_no = date("YmdHis").mt_rand(100,999);
        //商户网站订单系统中唯一订单号，必填


		//支付方式
        $type = $_POST['pay'];
        //用户名
        $name = $_SESSION['user_name'];
		//包月时间
        $money = $money;
		//会员类型
		$group = $userid;
		//站点名称
        $sitename = 'BL云支付测试站点';
        //必填

        //订单描述
//写入记录
$data['p_order'] =$out_trade_no;
$data['p_uid'] =$_SESSION['user_name'];
$data['p_price'] =$money;
$data['p_time'] =time();
$data['p_point'] =$day;//时间
$data['p_group'] =$userid;
$data['p_status'] =0;
$str = arrtoinsert($data);
$sql = 'insert into xtcms_user_pay ('.$str[0].') values ('.$str[1].')';
	if(mysql_query($sql)){}

/************************************************************/

//构造要请求的参数数组，无需改动
$parameter = array(
		"pid" => trim($alipay_config['partner']),
		"type" => $type,
		"notify_url"	=> $notify_url,
		"return_url"	=> $return_url,
		"out_trade_no"	=> $out_trade_no,
		"name"	=> $name,
		"money"	=> $money,
		"group"	=> $group,
		"sitename"	=> $sitename
);

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter);
echo $html_text;
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
	<script src="../style/js/html5shiv.js"></script>   
	<script src="../style/js/respond.min.js"></script>  
<![endif]-->
</head>

<body>
<?php include('head.php');?>
<div id="content-container" class="container">

      <div class="row row-3-9">
<?php include('left.php');?>
        <div class="col-md-9">	
          <div class="panel panel-default panel-col">
	        <div class="panel-heading">会员卡购买</div>
			<?php
					$result = mysql_query('select * from xtcms_user where u_name="'.$_SESSION['user_name'].'"');
					if($row = mysql_fetch_array($result)){
					?>
	           <div class="panel-body">
			    <form class="form-horizontal" action="" method="post">
				<input name="u_points" type="hidden" class="form-control" value="<?php echo $row['u_points'];?>">
					<div class="form-group">
						<label class="col-md-2 control-label">选择会员类型</label>

						<div class="col-md-7 controls radios">

													<?php
							$result = mysql_query('select * from xtcms_userka');
							while($row = mysql_fetch_array($result)){
						?>
						<input type="radio" id="profile_gender_0" name="cardid" required="required" value="<?php echo $row['id']?>" ><?php echo $row['name']?>-<?php echo $row['day']?>天[<?php echo $row['money']?>元]<br>

<?php
							}
						?>
									
						</div>
					</div>
					
						<div class="form-group">
							<label class="col-md-2 control-label">选择支付方式</label>
							<div class="col-md-7 controls">
							<div id="profile_gender">
								<input type="radio" id="profile_gender_0" name="pay" required="required" value="1" checked="">
								<label for="profile_gender_0" class="required">积分支付</label>
								<?php if($xtcms_appid!=""){?><input type="radio" id="profile_gender_1" name="pay" required="required" value="alipay">
								<label for="profile_gender_1" class="required">支付宝</label>
								<input type="radio" id="profile_gender_1" name="pay" required="required" value="wxpay">
								<label for="profile_gender_1" class="required">微信</label>
								<input type="radio" id="profile_gender_1" name="pay" required="required" value="qqpay">
								<label for="profile_gender_1" class="required">QQ钱包</label><?php } ?>
							</div>
							</div>
						</div>

					<div class="row">
						<div class="col-md-7 col-md-offset-2">
							<button id="profile-save-btn"  type="submit" name="save" class="btn btn-primary js-ajax-submit">提交</button>
						</div>
					</div>
			    </form>
		       </div>
			   <?php
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
