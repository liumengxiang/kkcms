<?php
include('../system/inc.php');
include('cms_check.php');
error_reporting(0);
header ( "content-Type: text/html; charset=utf-8" );
if(!mysql_connect(DATA_HOST,DATA_USERNAME,DATA_PASSWORD)) //连接mysql数据库
{
 echo '数据库连接失败，请核对后再试';
 exit;
}
if(!mysql_select_db(DATA_NAME)) //是否存在该数据库
{
 echo '不存在数据库,请核对后再试';
 exit;
}
mysql_query("set names 'utf8'");
$mysql= "set charset utf8;\r\n";
$q1=mysql_query("show tables");
while($t=mysql_fetch_array($q1)){
  $table=$t[0];
  $q2=mysql_query("show create table `$table`");
  $sql=mysql_fetch_array($q2);
  $mysql.=$sql['Create Table'].";\r\n";
  $q3=mysql_query("select * from `$table`");
  while($data=mysql_fetch_assoc($q3)){
    $keys=array_keys($data);
    $keys=array_map('addslashes',$keys);
    $keys=join('`,`',$keys);
    $keys="`".$keys."`";
    $vals=array_values($data);
    $vals=array_map('addslashes',$vals);
    $vals=join("','",$vals);
    $vals="'".$vals."'";
    $mysql.="insert into `$table`($keys) values($vals);\r\n";
  }
}
$filename="../backupdata/".DATA_NAME.".sql"; //存放路径，默认存放到项目最外层
$fp = fopen($filename,'w');
fputs($fp,$mysql);
fclose($fp);
alert_href('备份成功!','cms_data.php');
?>
 
