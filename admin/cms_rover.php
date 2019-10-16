<?php

include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
mysql_connect(DATA_HOST,DATA_USERNAME,DATA_PASSWORD);
mysql_select_db(DATA_NAME);
$mysql_file="../backupdata/".DATA_NAME.".sql"; //指定要恢复的MySQL备份文件路径,请自已修改此路径
restore($mysql_file); //执行MySQL恢复命令
function restore($fname)
 {
 if (file_exists($fname)) {
  $sql_value="";
  $cg=0;
  $sb=0;
  $sqls=file($fname);
  foreach($sqls as $sql)
  {
  $sql_value.=$sql;
  }
  $a=explode(";\r\n", $sql_value); //根据";\r\n"条件对数据库中分条执行
  $total=count($a)-1;
  mysql_query("set names 'utf8'");
  for ($i=0;$i<$total;$i++)
  {
  mysql_query("set names 'utf8'");
  //执行命令
  if(mysql_query($a[$i]))
  {
   $cg+=1;
  }
  else
  {
   $sb+=1;
   $sb_command[$sb]=$a[$i];
  }
  }
  echo "操作完毕，共处理 $total 条命令，成功 $cg 条，失败 $sb 条";
  //显示错误信息
  if ($sb>0)
  {
  echo "<hr><br><br>失败命令如下：<br>";
  for ($ii=1;$ii<=$sb;$ii++)
  {
   echo "<p><b>第 ".$ii." 条命令（内容如下）：</b><br>".$sb_command[$ii]."</p><br>";
  }
  }  //-----------------------------------------------------------
 }else{
  echo "MySQL备份文件不存在，请检查文件路径是否正确！";
 }
 }

?>
 
