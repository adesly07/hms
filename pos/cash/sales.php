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
$r_no = $_SESSION['r_no'];
$month = $_SESSION['month'];
$year = $_SESSION['year'];

$p_name = " ";
$u_price = "0";
$t_amt = "0";
if(isset($_POST['Submit']))
  {
$search = $_POST['search'];
$sql1 = "select * from productlist where p_name = '$search'";
$query1 = mysqli_query($db,$sql1);
while ($row = mysqli_fetch_assoc($query1)) {
	$pid = $row ['pid'];  
	$p_name = $row ['p_name']; 
	$u_price = $row ['u_price'];  
	$_SESSION['pid'] = $pid;
	$_SESSION['p_name'] = $p_name;
	$_SESSION['u_price'] = $u_price;

$p_name = $_SESSION['p_name'];
$u_price = $_SESSION['u_price'];
$pid = $_SESSION['pid'];
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

  <link rel="stylesheet" href="jquery-ui.min.css" type="text/css" /> 



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
        <td width="84%" align="right">&nbsp;</td>
      </tr>
    </table>
                    </div>
                </div>
            </div>
        </div>
              <div ></div>
               <div> <a href="d_sales.php"><img src="assets/img/back.png" width="70" height="47" border="0" /></a> || <a href="d_sales.php">Clear Active Sales </a></div>
        <div class="register-container container">
            <div class="row">
              <div class="register span6"></div>
              
  <div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2" align="center" bgcolor="#009900"><span class="stock">SALES AS AT <?php echo $s_date; ?></span></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><table width="500" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><form name="form1" method="post" action="sales.php">
              <input type="text" id="search" name="search"  placeholder = "Search Product" class="auto" autofocus="autofocus">
              <input name="Submit" class="btn-success" type="submit" id="Submit" value="GO">
            </form></td>
          </tr>
        </table></td>
      </tr>
      <tr>
     <td colspan="2" align="center" bgcolor="#F8F8F8" class="msg">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="left" bgcolor="#F8F8F8" class="msg"><strong>PRODUCT DETAILS </strong></td>
      </tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#F8F8F8"><form name="form2" method="post" action="process.php">
          <table width="100%" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td colspan="6">&nbsp;</td>
                  <td width="16%" align="center" valign="top">&nbsp;</td>
                </tr>
                <tr>
                  <td width="14%" height="30"><strong>Product Name</strong></td>
                  <td width="19%" height="30"><?php echo $p_name; ?></td>
                  <td height="30" colspan="2">&nbsp;<strong>Quantity</strong></td>
                  <td width="15%" height="30"><input type="text" name="qty" id="qty" required="required"></td>
                  <td width="26%" align="center">&nbsp;</td>
                  <td width="16%" align="center" valign="top">&nbsp;</td>
                  </tr>
                <tr>
                  <td height="30"><strong>Price</strong></td>
                  <td height="30"><?php echo number_format($u_price,2); ?></span></td>
                  <td height="30" colspan="2">&nbsp;</td>
                  <td height="30">&nbsp;</td>
                  <td width="26%" align="left"><input name="submit2" class="btn-success" type="submit" id="submit2" value="Add to Cart"></td>
                  <td width="16%" align="center" valign="top">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
          </table>
        </form>
       </td>
      </tr>
      <tr>
        <td width="64%" align="left" bgcolor="#F8F8F8" class="msg"><strong>LIST OF ORDERS FOR RECEIPT NO: <?php echo $r_no; ?></strong></td>
        <td width="36%" align="left" bgcolor="#F8F8F8" class="msg">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#F8F8F8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="73%" valign="top"><table width="700" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center"><strong>QTY</strong></td>
                <td align="center"><strong>ITEM</strong></td>
                <td align="center"><strong>PRICE(&#8358;)</strong></td>
                <td align="center"><strong>AMOUNT(&#8358;)</strong></td>
                <td>&nbsp;</td>
                </tr>
              <?php
		 $sql3 = "select * from sales where r_no = '$r_no'";
		  $query1 = mysqli_query($db, $sql3);
		while ($row = mysqli_fetch_assoc($query1)) {	
		$id = $row ['id'];
		$qty = $row ['qty'];
		$p_name = $row ['p_name'];
		$p_rate = $row ['p_rate'];	
		$amount = $row ['amount'];
$sql4 = "SELECT SUM(amount) from sales where r_no = $r_no";
 $query = mysqli_query($db, $sql4);
while ($row = mysqli_fetch_assoc($query)) {
$t_amt = $row['SUM(amount)'];	
	
}
		 
		 ?>
              <tr>
                <td height="30" align="center"><?php echo $qty; ?></td>
                <td height="30"><?php echo $p_name; ?></td>
                <td height="30" align="right"><?php echo number_format($p_rate,2); ?></td>
                <td height="30" align="right"><?php echo number_format($amount, 2); ?></td>
                <td height="30" align="center"><a href="process.php?id=<?php echo $id ?>" onClick="return check_deletion()"><img src="assets/img/delete.png" width="16" height="16"></a></td>
                </tr>
              <?php } ?>
              </table></td>
            <td width="27%"><form name="form3" method="post" action="process2.php">
              <p><strong>Customer Name</strong><br>
                <input name="c_name" type="text" id="c_name" value="Cash Customer">
              </p>
              <p>
                <input name="amt_pd" type="text" id="amt_pd" placeholder = "Amount Paid">
            </p>
              <p><span class="msg">
                <input name="submit3" class="btn-success" type="submit" id="submit3" value="Print Receipt">
                </span></p>
              </form></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td colspan="2" align="left" bgcolor="#F8F8F8" class="msg"><table width="700" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="right"><strong>TOTAL AMOUNT(N): <?php echo number_format($t_amt, 2); ?></strong></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="2" align="left" bgcolor="#F8F8F8" class="msg"><?
                if (!mysql_num_rows($sql3)){
				echo "No order found!";
				} 
				?></td>
      </tr>
      <tr>
        <td colspan="2" align="right" bgcolor="#F8F8F8" class="msg">&nbsp;</td>
      </tr>
    </table>
  </div>            
          </div>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script><script src="assets/js/scripts.js"></script>
        
<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>	
<link rel="stylesheet" href="jquery-ui.min.css" type="text/css" />
<script type="text/javascript">
$(function() {
	
	//autocomplete
	$(".auto").autocomplete({
		source: "search2.php",
		minLength: 1
	});				

});
</script>

    </body>

</html>

