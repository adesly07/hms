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

if(isset($_POST['submit2']))
  {
$qty = $_POST['qty'];
$amount = $u_price * $qty;
$sql1 = $query="INSERT INTO sales (id, pid, r_no, p_name, qty, p_rate, amount, cashier, i_date, month, year, i_time) VALUES ('', '$pid', '$r_no', '$p_name', '$qty', '$u_price', '$amount', '$name', '$s_date', '$month', '$year', CURTIME())";
$query1 = mysqli_query($db,$sql1);
if($query1){
header('location:sales.php');	
}
} 



if(isset($_GET['id']))
{
$sn=intval($_GET['id']);
$sql2= "delete from sales where id ='$sn'";
$query = mysqli_query($db, $sql2);
if($query){
header('location:sales.php');	
}
}

?>
