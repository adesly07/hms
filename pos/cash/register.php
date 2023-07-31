<?php
include ('../../admin/db_connect.php');
if(!isset($_session)){
session_start();
}
if (!isset($_SESSION['username']) || !isset($_SESSION['password']))
header('LOCATION: '.'../index.php');
$username = $_SESSION['username'];
$password = $_SESSION['password'];
 $sql = "SELECT * FROM create_login WHERE username = '$username' and password = '$password'";
  $query = mysqli_query($db, $sql);
if (mysqli_num_rows($query) > 0) {
 while ($rows = mysqli_fetch_assoc($query)) {
$name = $rows['name'];	
$pwd1 = $rows ['password'];
$user1 = $rows ['username'];	
}
}
$msg = "";

	
if(isset($_POST['submit']))
{  // text1
$u_name = $_POST['name'];
$user = $_POST['username'];
$section = $_POST['section'];
$pwd = $_POST['password'];
$confirm = $_POST['confirm'];
if ($pwd != $confirm) {
$msg = "Password not the same. Try Again.";	
	
} else {
$sql2 = "insert into create_login set name = '$u_name', username = '$user', password = '$pwd', section = '$section'";
$query1 = mysqli_query($db,$sql2);
if ($query1) {
$msg = "User Registered Successfully";
}
}
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>OneTouch POS System</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->


    </head>

    <body onLoad="Defaults()">

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="logo span4">
                        <h1><a href="">OneTouch <span class="red">POS</span></a></h1>
                   <span class="error"> Welcome</span> <?php echo $name; ?></div>
                    <div align="right">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
      <tr>
        <td width="16%" align="center" bgcolor="#EFEFEF">&nbsp;</td>
        <td width="84%" align="right">&nbsp;</td>
      </tr>
    </table>
                    </div>
                </div>
            </div>
        </div>
              <div >

              </div>
<div> <a href="index.php"><img src="assets/img/back.png" width="70" height="47" border="0" /></a>
        <div class="register-container container">
            <div class="row">
              <div class="register span6">
<form action="register.php" method="post">
                        <h2>Register <span class="red"><strong>User</strong></span></h2>
                <p><span class="msg"><?php echo $msg; ?></span>
          <label for="name">Name</label>
                          <input name="name" type="text" id="name" placeholder="Enter your name..." autofocus="autofocus">
                          <label for="name">Username</label>
                          <input name="username" type="text" id="username" placeholder="Enter your username...">
<label for="c_password">Password</label>
                          <input name="password" type="password" id="password">
                  <label for="c_password">Confirm Password</label>
                          <input name="confirm" type="password" id="confirm">
        </p>
                <p>
                  <label for="section">Select Section</label>
                </p>
                <p>
                  <select name="section" id="section">
                    <option value="Administrator" selected>Administrator</option>
                    <option value="Cashier">Cashier</option>
                  </select>
                </p>
                <p>
                  <input name="submit" class="btn-success" type="submit" id="submit" value="Register">
                </p>
  </form>
              </div>
              
  <div></div>            
          </div>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>

