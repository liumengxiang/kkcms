<?php include('system/inc.php');?>
<head>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $xtcms_name;?></title>
</head>
<?php
$preg = "/^(https?:\/\/)?(((www\.)?[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)?\.([a-zA-Z]+))|(([0-1]?[0-9]?[0-9]|2[0-5][0-5])\.([0-1]?[0-9]?[0-9]|2[0-5][0-5])\.([0-1]?[0-9]?[0-9]|2[0-5][0-5])\.([0-1]?[0-9]?[0-9]|2[0-5][0-5]))(\:\d{0,4})?)(\/[\w- .\/?%&=]*)?$/i"; //定义准备匹配的url的正则
if (!preg_match($preg, $_GET["url"])) {
    echo "<script>alert('URL地址不合法!');location.href='./index.php'</script>";
    die;
}
?>
<iframe id="iframepage" allowFullScreen=ture marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="<?php {echo 'https://jx.wslmf.com/xyplay/?url='.$_GET["url"];}?>" height="100%" width="100%"></iframe>
<style type="text/css">
body{
  	margin: 0px;
    padding: 0px;
    background: #000;
}
</style>
<script>
   $(function () {
        var height = $(window).height();
		var playlisth=$('#playbg').height();
		$('#playbg').height(height*0.58);
   })



</script>



