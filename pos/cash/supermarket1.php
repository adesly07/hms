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

$submit = $_POST['submit'];
if ($submit == "ADD")
{  // text1
$desc = $_POST['description'];
$q_pack = $_POST['q_pack'];
$q_sachet = $_POST['q_sachet'];
$c_price = $_POST['c_price'];
$p_pack = $_POST['p_pack'];
$p_sachet = $_POST['p_sachet'];
$s_date = $_POST['s_date'];
$ip = $_SERVER['REMOTE_ADDR'];
$t_pack = $p_pack * $q_pack;
$s_sachet = $q_pack * $q_sachet;
$t_sachet = $p_sachet * $s_sachet;
$t_cost = $c_price * $q_pack;

$sql3 = mysql_query("select * from productlist where description = '$desc' and category = '$cat'");
while ($row = mysql_fetch_array($sql3)){
$p_id = $row['pid'];	
}
$sql4 = mysql_query("select * from productlist where pid = '$p_id'");
if(mysql_num_rows($sql4)) {
$sql5 = mysql_query("insert into productlist set pid = '$p_id', category = '$cat', description = '$desc', q_pack = '$q_pack', q_sachet = '$q_sachet', c_price = '$c_price', p_pack = '$p_pack', p_sachet = '$p_sachet', t_cost = '$t_cost', t_pack = '$t_pack', t_sachet = '$t_sachet', s_date = '$s_date', s_status = 'STORED', ip = '$ip', user = '$name'");
if($sql5) {
	$sql6 = mysql_query("insert into f_sales set pid = '$p_id', category = '$cat', description = '$desc', q_pack = '$q_pack', q_sachet = '$q_sachet', c_price = '$c_price', p_pack = '$p_pack', p_sachet = '$p_sachet', t_cost = '$t_cost', t_pack = '$t_pack', t_sachet = '$t_sachet', s_date = '$s_date', s_status = 'STORED', ip = '$ip', user = '$name'");
if ($sql6) {
$msg = "Stock has been added successfully";	
}
}else {
die (mysql_error());
$msg = "Error in adding Stock, Try again";	
}
} else {
$pid = rand(10,99) . rand(100,999). rand(10,99);

$sql = mysql_query("insert into productlist set pid = '$pid', category = '$cat', description = '$desc', q_pack = '$q_pack', q_sachet = '$q_sachet', c_price = '$c_price', p_pack = '$p_pack', p_sachet = '$p_sachet', t_cost = '$t_cost', t_pack = '$t_pack', t_sachet = '$t_sachet', s_date = '$s_date', s_status = 'STORED', ip = '$ip', user = '$name'");
if($sql) {
	$sql2 = mysql_query("insert into f_sales set pid = '$pid', category = '$cat', description = '$desc', q_pack = '$q_pack', q_sachet = '$q_sachet', c_price = '$c_price', p_pack = '$p_pack', p_sachet = '$p_sachet', t_cost = '$t_cost', t_pack = '$t_pack', t_sachet = '$t_sachet', s_date = '$s_date', s_status = 'STORED', ip = '$ip', user = '$name'");
if ($sql2) {
$msg = "Stock has been added successfully";	
}
}
else {
die (mysql_error());
$msg = "Error in adding Stock, Try again";	
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

  <link rel="stylesheet" href="jquery-ui.min.css" type="text/css" /> 
<script src="datetimepicker_css.js"></script>


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
               <div> <a href="products.php"><img src="assets/img/back.png" width="70" height="47" border="0" /></a>
          </div>

        <div class="register-container container">
            <div class="row">
              <div class="register span6">
<form action="supermarket.php" method="post">
        <h2>Stock <span class="red"><strong><?php echo $cat; ?></strong></span> || <a href="v_stock.php">View Stock</a></h2>
        <p><span class="msg"><?php echo $msg; ?></span>
<label for="q_pack">Items</label>
                        <input type="text" id="description" name="description" class="auto" autofocus="autofocus" required="required">
        </p>
        <label for="quantity">Quantity/Pack/Crate</label>
                        <input type="text" id="q_pack" name="q_pack" placeholder="Enter Quantity Per Pack" required="required">
        </p>
        <label for="quantity">Quantity/Unit</label>
        <input type="text" id="q_sachet" name="q_sachet" placeholder="Enter Quantity Per Sachet" required="required">
        </p>
        <label for="price">Cost Price/Pack/Crate<span class="msg">(#)</span></label>
                        <input type="text" id="c_price" name="c_price" placeholder="Enter Cost Price Per Pack" required="required">
        </p>
        <label for="price"> Price/Pack/Crate<span class="msg">(#)</span></label>
        <input type="text" id="p_pack" name="p_pack" placeholder="Enter Selling Price Per Pack" required="required">
        </p>
        <label for="price">Price/Unit<span class="msg">(#)</span></label>
                        <input type="text" id="p_sachet" name="p_sachet" placeholder="Enter Selling Price Per Unit" required="required">
        </p>
        <label for="price">Date</label>
                        <input name="s_date" type="text" id="s_date" value="<?php echo date("Y/m/d"); ?>" size="15" readonly="readonly" required="required">
        </p>
        <img src="../images2/cal.gif" alt="" style="cursor:pointer" onclick="javascript:NewCssCal('s_date','yyyyMMdd','arrow')"/>
<p> <p>
          <input name="submit" class="btn-success" type="submit" id="submit" value="ADD">
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

