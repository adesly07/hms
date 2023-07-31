<?php
//dbase connection======================================
include('../admin/db_connect.php');
//==============================================
if(!isset($_session)){
session_start();
}
$msg = "";
$submit = isset($_POST['Logme']);

if ($submit =='Login')
{  // text1
$username = mysqli_real_escape_string($db,$_POST['username']);	
$password = mysqli_real_escape_string($db,$_POST['password']);

strlen($username <=20);
if (strlen ($username) > 20){ $error= "Username Exceed The Maximun Character.";}else{

$query = "SELECT * FROM create_login WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($db, $query);
         while ($row = mysqli_fetch_assoc($result)) {
		
		$section = $row['section'];	
		
if ($section == 'Administrator'){
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['section'] = $section;
header("Location: umgt");
} 
elseif ($section == 'Cashier'){
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['section'] = $section;
header("Location: cash");
} 
	elseif ($section == 'Store Keeper'){
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['section'] = $section;
header("Location: store");
} 
}
if (!mysqli_num_rows($result))
{
$msg = " <div>
     <strong>Oops! </strong> Invalid Username or Password </div>";	
}
} } 
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>OneTouch POS System</title>
<link rel="shortcut icon" href="favicon.png" type="image/x-icon">
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

    <body>

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="logo span4">
                        <h1><a href="">OneTouch <span class="red">POS</span></a></h1>
                    </div>
                    <div align="right">
                        <a href="http://www.updateng.com" target="_blank" rel="tooltip">Powered by Update Nigeria & BrightZity Technologies</a>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="register-container container">
            <div class="row">
                <div class="iphone span5">
                    <img src="assets/img/lock.png" alt="">
                </div>
                <div class="register span6">
                    <form action="index.php" method="post">
                      <h2>User <span class="red"><strong>Login</strong></span> </h2>
                       <span class="error"><?php echo $msg; ?></span>
                       <label for="username">Username</label>
                      <input type="text" id="username" name="username" placeholder="Enter your username...">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password...">
                      
                        <button name="Logme"  type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>

