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
if(isset($_POST['Submit']))
{  // text1
$cat = $_POST['category'];
if ($cat == "Food") {
$_SESSION['category'] = $cat;
header ('location: add_stock.php');
}
}

/*$submit = $_POST['submit'];
if ($submit == "OK")
{  // text1
$cat = $_POST['category'];
if ($cat == "Tablet") {
$_SESSION['category'] = $cat;
header ('location: tablet.php');
}
elseif ($cat == "Supermarket") {
$_SESSION['category'] = $cat;
header ('location: supermarket.php');
} else {
$_SESSION['category'] = $cat;
header ('location: others.php');
	
}
}
*/
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


    </head>

    <body>

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
                          <td width="84%" align="right"><span class="si_filters_links"> <a href="v_stock.php" class="first selected">View Stock</a><a href="stock_summary.php">Stock Report</a><a href="stock_return.php">Stock Return</a><a href="s_history.php">Stock History</a><a href="ss.php">Stock Summary</a></span></td>
                        </tr>
                      </table>
                    </div>
                </div>
            </div>
        </div>
              <div >

              </div>
          <div> <a href="index.php"><img src="assets/img/back.png" width="70" height="47" border="0" /></a>
          </div>
        <div class="register-container container">
            <div class="row">
              <div class="register span6">
<form action="products.php" method="post">
        <h2>Add <span class="red"><strong>Stock</strong></span></h2>
        <p>
          <label for="">Select Category
            </label>
          <select name="category" id="category">
            <option value="Food" selected>Food</option>
          </select>
        
        </p>
        <p>&nbsp;</p>
        <p>
          <input name="submit" class="btn-success" type="submit" id="submit" value="OK">
        </p>
</form>
              </div>
              
  <div><table width="400" border="0">
  <tr>
    <td width="287">&nbsp;</td>
    <td width="103">&nbsp;</td>
  </tr>
</table></div>            
          </div>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>

