<?php
    if(!isset($_COOKIE['admin_name'])){
        alert_href('非法登录','cms_login.php');
    } else {
        $result = mysql_query('select * from xtcms_manager where m_name = "'.$_COOKIE['admin_name'].'" and m_password = "'.$_COOKIE['admin_password'].'"');
        if (!$row = mysql_fetch_array($result)) {
            alert_href('请重新登录','cms_login.php');
        };
    };
?>