<?php
/*
    手动同步最新站外资源地址
*/
$zwurl = "https://wslmf.com/api/zwurl.txt"; //获取最新zwurl地址
$newUrl=file_get_contents($zwurl);
if (file_put_contents('./cxini.php', "<?php\n \$zwcx = ['zhanwai'=>'".$newUrl."']\n?>")) {
    echo '<script>alert("恭喜！源站地址更新成功!\n\n稍等一分钟后刷新此页面即可看到最新的源站地址！");window.opener=null;window.close();</script>';
} else {
    echo '<script>alert("NO！更新失败!");window.opener=null;window.close();</script>';
}

