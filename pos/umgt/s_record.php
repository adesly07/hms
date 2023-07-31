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


if(isset($_POST['submit']))
  {

$search = $_POST['search'];

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
               <div> <a href="d_sales.php"><img src="assets/img/back.png" width="70" height="47" border="0" /></a></div>
        <div class="register-container container">
            <div class="row">
              <div class="register span6"></div>
              
  <div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2" align="center" bgcolor="#009900"><span class="stock">SALES RECORD</span></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><table width="500" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><form name="form1" method="post" action="s_record.php">
              <input type="text" id="description" name="search"  placeholder = "Enter Receipt No" class="auto">
              <input name="submit" class="btn-success" type="submit" id="submit" value="GO">
            </form></td>
          </tr>
        </table></td>
      </tr>
      <tr>
     <td colspan="2" align="center" bgcolor="#F8F8F8" class="msg">&nbsp;</td>
      </tr>
      <tr>
        <td width="64%" align="left" bgcolor="#F8F8F8" class="msg"><strong>RECORD LIST FOR RECEIPT NO: <?php echo $search; ?></strong></td>
        <td width="36%" align="left" bgcolor="#F8F8F8" class="msg">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#F8F8F8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" valign="top"><table width="700" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td width="71" align="center"><strong>QTY</strong></td>
                <td width="240" align="center"><strong>DESCRIPTION</strong></td>
                <td width="156" align="center"><strong>PRICE(N)</strong></td>
                <td width="126" align="center"><strong>AMOUNT(N)</strong></td>
                <td width="95" align="center">&nbsp;</td>
                <td width="95" align="center">&nbsp;</td>
                </tr>
              <?php
		 $sql3 = "select * from sales where r_no = '$r_no'";
		  $query1 = mysqli_query($db, $sql3);
		while ($row = mysqli_fetch_assoc($query1)) {	
		$id = $row ['id'];
		$cat = $row ['category'];
		$qty = $row ['qty'];
		$p_name = $row ['p_name'];
		$p_rate = $row ['p_rate'];	
		$amount = $row ['amount'];
		$pid = $row ['pid'];
		$r_no = $row ['r_no'];
		$p_type = $row ['p_type'];
		$i_date = $row ['i_date'];
		$i_time = $row ['i_time'];
		$ip = $row ['ip'];
		$cashier = $row ['cashier'];
$sql4 = mysql_query("select sum(amount) from sales where r_no = $search and p_status = 'PAID'");
while ($row = mysql_fetch_array($sql4)) {
$t_amt = $row[0];	
	
}
		 
		 ?>
              <tr>
                <td height="20" align="center"><?php echo $qty; ?></td>
                <td height="20"><?php echo $p_name; ?></td>
                <td height="20" align="right"><?php echo number_format($p_rate,2); ?></td>
                <td height="20" align="right"><?php echo number_format($amount, 2); ?></td>
                <td align="center"><a href="return_sales.php?id=<?php echo $id; ?>">Return All</a></td>
                <td align="center"><a href="return_qty.php?id=<?php echo $id; ?>">Return Qty</a></td>
                </tr>
              <?php } ?>
            </table></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td colspan="2" align="left" bgcolor="#F8F8F8" class="msg"><table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right"><strong>TOTAL AMOUNT(N): <?php echo number_format($t_amt, 2); ?></strong></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="2" align="left" bgcolor="#F8F8F8" class="msg"></td>
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
		source: "search1.php",
		minLength: 1
	});				

});
</script>

    </body>

</html>

