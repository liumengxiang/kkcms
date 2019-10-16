<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
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
							<h2>数据库备份</h2>
						</div>					
					</div>
					<!-- End Page Header -->								
										
<div class="row">		
						<div class="col-lg-12">
							<div class="panel">
								<div class="panel-heading bk-bg-primary">
									<h6><i class="fa fa-table red"></i><span class="break"></span>数据库备份</h6>
																		


								</div>
								<div class="panel-body">
									<div class="table-responsive">	
<?php  $result=mysql_list_tables(DATA_NAME);
  if(!$result) die("数据库连接失败！");
  while($row=mysql_fetch_row($result))
  {
?>
	<div style="float:left; width:25%; line-height:30px"><input type="checkbox" name="table[]" value="<?php echo $row[0]?>"/><?php echo $row[0]?></div>


<?php
  }
  mysql_free_result($result);
  ?>
<a class="btn btn-default" href="cms_backup.php"><span class="icon-plus-square">备份</span></a>
<a class="btn btn-primary" href="cms_rover.php"><span class="icon-plus-square">恢复</span></a>									</div>
								</div>
							</div>
						</div>					
					</div>
					
				</div>
				<!-- End Main Page -->			
		
<?php include('inc_footer.php') ?>
<script language="javascript">
function setdb() {
	if($(".cselectform").prop('checked')) {
		$(".selectform").prop("checked",true);
	} else {
		$(".selectform").prop("checked",false);
	}
}
function showcreat(tblname) {

	location.href='<?php echo url("database/table")?>&name='+tblname+'';
}
</script>