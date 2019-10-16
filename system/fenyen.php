<?php 
$fenyema="#<div monitor-desc='分页' id='js-ew-page' data-block='js-ew-page'  class='ew-page'>[\s\S]+?</div>#";
preg_match_all($fenyema, $rurl,$yeshua); 
$yeshu=implode($glue, $yeshua[0]);
$yeshu = str_replace('<a','<li><a',$yeshu);
$yeshu = str_replace('</a>','</a></li>',$yeshu);
$yeshu = str_replace("<li><a target='_self' class='on'>","<li class='hidden-xs active'><a target='_self' class='on'>",$yeshu);
$yeshu = str_replace("<span>...</span>", '', "$yeshu");
$yeshu = str_replace("下一页&gt;", '&gt', "$yeshu");
$yeshu = str_replace("&lt;上一页", '&lt;', "$yeshu");
$yeshu = str_replace("?", '', "$yeshu");
$yeshu = str_replace('http://www.360kan.com/dianying/list',"list.php?type=$panduan&",$yeshu);
$yeshu = str_replace('http://www.360kan.com/dianshi/list',"list.php?type=$panduan&",$yeshu);
$yeshu = str_replace('http://www.360kan.com/zongyi/list',"list.php?type=$panduan&",$yeshu);
$yeshu = str_replace('http://www.360kan.com/dongman/list',"list.php?type=$panduan&",$yeshu);

?>