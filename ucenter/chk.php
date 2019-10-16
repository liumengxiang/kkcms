<?php  
// 检查用户是否登录  
 if (empty ( $_SESSION ['user_info'] ))         // 检查一下session是不是为空  
    {   
	}   
        else  
        { 
if(!isset($_COOKIE ['user_name'])){
$_SESSION['user_name']=$_COOKIE ['user_name'];
	}
	}
?> 