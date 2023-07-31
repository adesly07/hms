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
$r_no = $_SESSION['r_no'];
$c_name = $_SESSION['c_name'];
$amt_pd = $_SESSION['amt_pd'];

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
<script src="datetimepicker_css.js"></script>



    </head>

    <body>
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#F8F8F8" class="msg"></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#F8F8F8"><span class="receipt">UI HOTELS</span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#F8F8F8"><span class="receipt">Conference Centre Building, Chapel Road, University of Ibadan.</span></td>
      </tr>
      <tr>
        <td height="25" align="center" bgcolor="#F8F8F8"><span class="receipt">+2347088400002, 07084000002</span></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#F8F8F8"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="32%"><span class="receipt">Receipt No:</span></td>
            <td width="68%"><span class="receipt"><?php echo $r_no; ?></span></td>
          </tr>
          <tr>
            <td><span class="receipt">Date:</span></td>
            <td><span class="receipt"><?php echo $s_date; ?></span></td>
          </tr>
          <tr>
            <td><span class="receipt">Cashier:</span></td>
            <td><span class="receipt"><?php echo $name; ?></span></td>
          </tr>
          <tr>
            <td><span class="receipt">Sold to:</span></td>
            <td><span class="receipt"><?php echo $c_name; ?></span></td>
          </tr>
          <tr>
            <td colspan="2"><table width="100%" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center"><span class="receipt">QTY</span></td>
                <td align="center"><span class="receipt">ITEM</span></td>
                <td align="center"><span class="receipt">PRICE(&#8358;)</span></td>
                <td align="center"><span class="receipt">AMOUNT(&#8358;)</span></td>
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
			$balance = ($amt_pd - $t_amt);
	 
		 ?>
              <tr>
                <td align="center"><span class="receipt"><?php echo $qty; ?></span></td>
                <td><span class="receipt"><?php echo $p_name; ?></span></td>
                <td align="right"><span class="receipt"><?php echo number_format($p_rate,2); ?></span></td>
                <td align="right"><span class="receipt"><?php echo number_format($amount, 2); ?></span></td>
              </tr>
              <?php } ?>
            </table></td>
          </tr>
          <tr>
            <td align="left" class="receipt"><img src="assets/img/rec.png" width="20" height="9" border="0" usemap="#Map"></td>
            <td align="right"><span class="receipt">TOTAL (&#8358;): <?php echo number_format($t_amt, 2); ?></span></td>
          </tr>
          <tr>
            <td align="left" class="receipt">&nbsp;</td>
            <td align="right"><span class="receipt">Amount Paid (&#8358;): <?php echo number_format($amt_pd, 2); ?></span></td>
          </tr>
          <tr>
            <td align="left" class="receipt">&nbsp;</td>
            <td align="right"><span class="receipt">Change Due (&#8358;): <?php echo number_format($balance, 2); ?></span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="25" align="left" bgcolor="#F8F8F8" class="receipt">Goods once sold in good condition are not returnable. No refund of Money.</td>
      </tr>
    </table>
<map name="Map">
  <area shape="rect" coords="3,1,17,8" href="sales.php">
  </map>
<script type="text/javascript" language="javascript">
//<![CDATA[
// Do print the page
window.onload = function()
{
    if (typeof(window.print) != 'undefined')
	{
        window.print();
    }
}
//]]>
</script>
</body>

</html>

