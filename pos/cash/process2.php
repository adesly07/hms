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
$s_date = $_SESSION['s_date'];
$month = $_SESSION['month'];
$year = $_SESSION['year'];

$p_name = $_SESSION['p_name'];
$u_price = $_SESSION['u_price'];
$r_no = $_SESSION['r_no'];
$pid = $_SESSION['pid'];

if(isset($_POST['submit3']))
  {
$c_name = $_POST['c_name'];
$amt_pd = $_POST['amt_pd'];
if($c_name != "") {
$_SESSION['c_name'] = $c_name;
$_SESSION['amt_pd'] = $amt_pd;
 
header('location:receipt.php');
}
}

?>
