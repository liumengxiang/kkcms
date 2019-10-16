<?php
error_reporting(0);
header('Content-type:text/html;charset=utf-8');
$info = file_get_contents($zwcx["zhanwai"]);
//print_r($info);
$szz1='#<li><a href="/index.php/show/index/(.*?)"><b></b><img src="(.*?)" /><span>(.*?)</span></a></li>#';
preg_match_all($szz1, $info,$sarr1);
       for($i =0;$i<15;$i++){
           $zname=$sarr1[3][$i];//����
           $two=$sarr1[1][$i];//ID
           $zimg=$sarr1[2][$i];//ͼƬ
          $link="mplay.php?mso=".$two;
           //echo $zname;
           //echo $gul;//ȡ����������
           echo "


 <li class='col-md-5 col-sm-4 col-xs-3 '><div class='stui-vodlist__box'>
<a class='stui-vodlist__thumb lazyload img-shadow' href='$link' title='$zname' alt='$zname' data-original='$zimg'>
<span class='play hidden-xs'></span>
</a><div class='stui-vodlist__detail'>
<h4 class='title text-overflow'>
<a href='$link' title='$zname'>$zname</a>
</h4>
</div>
</div>
</li>
		 ";}




	   ?>

