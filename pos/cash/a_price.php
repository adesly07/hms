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
  {
$p_name = $_POST['p_name'];
$u_price = $_POST['u_price'];
$s_date = $_POST['s_date'];
$ip = $_SERVER['REMOTE_ADDR'];

$sql3 = "select * from productlist where p_name = '$p_name'";
$query1 = mysqli_query($db,$sql3);
if(mysqli_num_rows($query1)){
$msg = "Record Already Exist";
} else {
	$sql1 = "INSERT INTO productlist (pid, p_name, u_price, user, s_date, ip) VALUES ('', '$p_name', '$u_price', '$name', '$s_date', '$ip')"; 
$query1 = mysqli_query($db,$sql1);
if($query1){
$msg = "Item has been added.";
} else {
$msg = "Error in adding Item. Try again.";
}
}
  }
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
               <div> <a href="d_sales.php"><img src="assets/img/back.png" width="70" height="47" border="0" /></a>
          </div>

        <div class="register-container container">
            <div class="row">
              <div class="register span6">
<form action="a_price.php" method="post">
        <h2>Add Price|| <a href="v_price.php">View Stock</a></h2>
        <p><span class="msg"><?php echo $msg; ?></span>
<label for="q_pack">Items</label>
                        <input type="text" id="p_name" name="p_name" class="auto" autofocus="autofocus" required="required">
        </p>
        <label for="price">Unit Price(&#8358;)</label>
                        <input type="text" id="u_price" name="u_price" placeholder="Enter Selling Price" required="required">
        </p>
        <label for="price">Date</label>
                        <input name="s_date" type="text" id="s_date" value="<?php echo date("Y/m/d"); ?>" size="15" readonly="readonly" required="required">
        </p>
        <img src="../images2/cal.gif" alt="" style="cursor:pointer" onclick="javascript:NewCssCal('s_date','yyyyMMdd','arrow')"/>
<p> <p>
          <input name="Submit" class="btn-success" type="submit" id="Submit" value="ADD">
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

