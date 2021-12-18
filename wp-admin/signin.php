<?php 
require_once('../includes/app_top.php');
require_once('../includes/mysql.class.php');
// Include database connection
require_once('../includes/global.inc.php');
// Include general functions
require_once('../includes/functions_general.php');
if(isset($_POST['Submit']))
{
	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];

	$query=$db->query("insert into admin (name,username,password)values('".$name."','".$username."','".md5($password)."')");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="" method="post">
<input type="text" name="name"><br>
<input type="text" name="username"><br>
<input type="password" name="password"><br>
<input type="submit" name="Submit"><br>
</form>
</body>
</html>