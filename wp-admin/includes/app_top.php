<?php ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
ini_set( 'display_errors', 1 );
error_reporting(E_ERROR);
session_cache_expire(10);
 
date_default_timezone_set("Asia/Kolkata");
ini_set('session.gc_maxlifetime',24*60*60);
ini_set('session.gc_probability',1);
ini_set('session.gc_divisor',1);

$sessionCookieExpireTime = 24*60*60;
session_set_cookie_params($sessionCookieExpireTime); 


function cheader($url)
{	
	
	$url	=	base_path.$url;
	header("Location: $url");
	exit();
}
function adheader($url)
{	
	
	$url	=	admin_path.$url;
	header("Location: $url");
	exit();
}

if (@$PageTitle=="")
	$PageTitle = "Concilio Orbis";

$All_timer_Condition	=	false;
?>