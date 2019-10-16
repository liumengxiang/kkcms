<?php
error_reporting(0);
header('Content-type:text/html;charset=utf-8');
$info = file_get_contents($zwcx["zhanwai"]);
$szz1='#<li><a href="/index.php/show/index/(.*?)"><b></b><img src="(.*?)" /><span>(.*?)</span></a></li>#';
preg_match_all($szz1, $info,$sarr1);
       for($i =0;$i<12;$i++){
           $zname=$sarr1[3][$i];//名字
           $two=$sarr1[1][$i];//ID
           $zimg=$sarr1[2][$i];//图片
          $link="mplay.php?mso=".$two;
           //echo $zname;
           //echo $gul;//取出播放链接
           echo "

		  <div class='col-md-2 col-sm-3 col-xs-4 '><a class='videopic lazy' href='$link' title='$zname' data-original='$zimg' target='_self' style='background: url(./style/load.gif) no-repeat; background-position:50% 50%; background-size: cover;border-radius: 6px;' ><span class='play hidden-xs'></span><span class='score'>电影尝鲜</span></a><div class='title'><h5 class='text-overflow'><a href='$link' title='$zname' target='_self'>$zname</a></h5></div></div>

		 ";}
	   ?>

