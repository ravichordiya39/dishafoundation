<?php 
require_once('includes/app_top.php');
require_once('includes/mysql.class.php');
// Include database connection
require_once('includes/global.inc.php');
// Include general functions
require_once('includes/functions_general.php');

if(isset($_POST['btnsubmit']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  if($username == '' || $password == '')
  {
    $_SESSION['error']  = 'Username or password is required field.';
  }else
  {

    $sql  = "INSERT INTO `admin`(`name`, `username`, `password`) VALUES ('".$username."','".$username."','".md5($password)."')";
    $query  = $db->query($sql);
    $_SESSION['error']  = 'Register Successful.';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo site_name?></title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?php echo admin_path?>bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo admin_path?>bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?php echo admin_path?>bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo admin_path?>dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="<?php echo admin_path?>plugins/iCheck/square/blue.css">
<link rel="stylesheet" href="<?php echo admin_path?>css/error-style.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"> <a href=""><b><?php echo site_name?></b> Admin</a> </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in</p>
    <?php
  $error  = !empty( $_SESSION['error'] ) ? $_SESSION['error'] : '';
  $msg  = !empty( $_SESSION['msg'] ) ? $_SESSION['msg'] : '';
  
  if($error != ''){?>
    <div class="msg" id="msgError">
      <div class="msg-error">
        <p><?php echo $error; ?></p>
        <a class="close" href="javascript:showDetails('msgError');">close</a></div>
    </div>
    <?php } 
  if($msg != ''){?>
    <div class="msg" id="msgOk">
      <div class="msg-ok">
        <p><?php echo $msg; ?></p>
        <a class="close" href="javascript:showDetails('msgOk');">close</a></div>
    </div>
    <?php } 
  unset($_SESSION['error']);
  unset($_SESSION['msg']);
  ?>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" required placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span> </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" required placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span> </div>
      <div class="form-group has-feedback">
        <button type="submit" name="btnsubmit" class="btn btn-primary btn-block btn-flat">Sign In</button>
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 3 -->
<script src="<?php echo admin_path?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo admin_path?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo admin_path?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
function showDetails(id)
{
  var area = document.getElementById(id);
  if (area.style.display == "none")
  {
    $(area).show("slow");
  } else
  {
    $(area).hide("slow");
  }
}
</script>
</body>
</html>
