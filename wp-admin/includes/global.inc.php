<?php
	$SERVER_ADDR 		= 	"https://".$_SERVER['HTTP_HOST'];
	
	//define base path
	define("base_path",$SERVER_ADDR."/disha/");
	define("admin_path",$SERVER_ADDR."/disha/wp-admin/");

	
	define("site_name","Admin Panel");
	
	
	$host = 'localhost';
	$user = 'thebrand';
	$pass = 'thebrand147';
	$dbname = 'disha-new';
	
	
	$db = new MySQL($host,$user,$pass,$dbname);
	
	
//