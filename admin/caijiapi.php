<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
include('getdata.php');

?>
<?php include('inc_header.php') ?>

		<!-- Start: Content -->
		<div class="container-fluid content">	
			<div class="row">
<?php include('inc_left.php') ?>
				<!-- Main Page -->
				<div class="main ">
					<!-- Page Header -->
					<div class="page-header">
						<div class="pull-left">
							<ol class="breadcrumb visible-sm visible-md visible-lg">								
								<li><a href="cms_welcome.php"><i class="icon fa fa-home"></i>首页</a></li>
							</ol>						
						</div>
						<div class="pull-right">
							<h2>资源采集</h2>
						</div>					
					</div>
					<!-- End Page Header -->								

<div class="row">		
						<div class="col-lg-12">
							<div class="panel">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-table red"></i><span class="break"></span>手动采集视频</h6>

								</div>
								<div class="panel-body">
									<div class="table-responsive">	
<form method="POST" class="form-inline" >

													<div class="form-group">
													<label for="name-w1">选择资源站</label>
<select id="laiyuan" class="form-control" name="laiyuan">

			<option value="http://www.zuida.me/">最大资源（推荐）</option>
            <option value="http://www.ziyuanpian.net/">C值资源（推荐）</option>
			<option value="http://www.okzy.co/">OK资源（推荐）</option>
			<option value="http://www.156zy.com/">156资源（推荐）</option>
			<option value="http://www.yszydg.com/">帝国资源（推荐）</option>
            <option value="http://www.baiwanzy.com/">百万资源（推荐）</option>
			<option value="http://www.kukuzy.com/">酷酷资源网（推荐）</option>
           	<option value="http://www.kubozy.net/">酷播资源（推荐）</option>
            <option value="http://www.go1977.com/">1977资源（推荐）</option>
			<option value="http://zy.itono.cn/">最新资源（推荐）</option>
			<option value="http://www.2088zy.com/">2088资源（不推荐）</option>
            <option value="http://www.605zy.com/">605资源（不推荐）</option>
            <option value="http://zy.itono.cn/">1717资源（不推荐）</option>
            

									</select>
													</div>
													<div class="form-group">

													<label for="name-w1">  影片名称</label>
<input name="wd" id="wd" class="form-control" type="text" value="" placeholder="留空可采集当前更新的全部视频"/>
							<input type="submit" id="search" class="btn bg-sub" name="search" value="搜索" />&#12288;&#12288;<font color="red">输入需要采集的影片名称，点击搜索；<b>【可以留空】</b>如搜索不到，请更换资源站！</font>
													</div>
										
			
					</form>
					
		<table id="11" class="table table-striped">
							<tr>
								<th>名称</th>
								<th>类型</th>
								<th>更新时间</th>
								<th>操作</th>
							</tr>
<?php
if(isset($_POST["search"])&&$_POST["search"])
{
$q=$_POST['wd'];
 if(strlen($q) < 0){
    exit("<script>alert('请输入影片名字');location.href='javascript:history.back()';</script>");
}
$laiyuan=$_POST['laiyuan'];
$seach=file_get_contents(''.$laiyuan.'index.php?m=vod-search&wd='.$q);
$szz='#<span class="xing_vb4"><a href="(.*)" target="_blank">(.*)</a></span> <span class="xing_vb5">(.*)</span> <span class="xing_vb6">(.*)</span>#';
preg_match_all($szz,$seach,$sarr);

$one=$sarr[2];//标题
$onee=$sarr[1];//标题
$oneee=$sarr[3];//
$oneeee=$sarr[4];//

foreach ($one as $ni=>$cs){
$pingfen1 = str_replace('/', '', "$onee[$ni]");
$pingfen2 = str_replace('?m=', '', "$pingfen1");
$lx = str_replace('', '', "$oneee[$ni]");
$sj = str_replace('', '', "$oneeee[$ni]");


?>
								<tr>
								<td><a target="_blank" href="cms_cj_add.php?m=<?php echo $pingfen2?>&zd=<?php echo $laiyuan?>" style="color: #337ab7;
    text-decoration: none;"><?php echo $cs?></a></td>
								<td><?php echo $lx?></td>
								<td><?php echo $sj?></td>
								<td><a class="btn btn-success" target="_blank" href="cms_cj_add.php?m=<?php echo $pingfen2?>&zd=<?php echo $laiyuan?>" style="border-radius:4px;">采集</a></td>
							</tr>							

<?php 
}
} 
?>
						</table>
				
									</div>
								</div>
							</div>
						</div>					
					</div>
					
				</div>
				<!-- End Main Page -->			
		
<?php include('inc_footer.php') ?>