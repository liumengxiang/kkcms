<?php
include('../system/inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
</head>
<body>
<?php
unset($_SESSION['user_name']);
unset($_SESSION['user_group']);
if (! empty ( $_COOKIE ['user_name'] ) || ! empty ( $_COOKIE ['user_password'] ))   
    {  
        setcookie ( "user_name", null, time () - 3600 * 24 * 365 );  
        setcookie ( "user_password", null, time () - 3600 * 24 * 365 );  
    }  
header('location:login.php');
?>
</body>
</html>