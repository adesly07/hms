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
$u_name = $_POST['u_name'];
$month = $_POST['month'];
$year = $_POST['year'];
$sql2 = "select * from create_login where username = '$u_name'";
$query1 = mysqli_query($db, $sql2);
while ($row = mysqli_fetch_assoc($query1)) {	
$myname = $row['name'];	
$section = $row['section'];	
}
if ($section == 'Administrator') {
$_SESSION['month'] = $month;
$_SESSION['year'] = $year;
header ('location: sales_report3.php');
} else {
$_SESSION['name'] = $myname;
$_SESSION['month'] = $month;
$_SESSION['year'] = $year;
$_SESSION['u_name'] = $u_name;
header ('location: sales_report4.php');
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
              <div >

              </div>
               <div> <a href="s_report.php"><img src="assets/img/back.png" width="70" height="47" border="0" /></a>
      </div>
        <div class="register-container container">
            <div class="row">
              <div class="register span6">
<form action="y_report.php" method="post">
        <h2>Monthly <span class="red"><strong>Report</strong></span> | <a href="year.php">Yearly</a></h2>
        <p>
          <label for="Month">Select Month</label>
        </p>
        <p>
          <select name="month" id="month">
            <option value="Jan" selected>Jan</option>
            <option value="Feb">Feb</option>
            <option value="Mar">Mar</option>
            <option value="Apr">Apr</option>
            <option value="May">May</option>
            <option value="Jun">Jun</option>
            <option value="Jul">Jul</option>
            <option value="Aug">Aug</option>
            <option value="Sept">Sept</option>
            <option value="Oct">Oct</option>
            <option value="Nov">Nov</option>
            <option value="Dec">Dec</option>
          </select>
        </p>
        <p>
          <input name="year" type="text" id="year" value="<?php echo date('Y'); ?>" >
        </p>
        <p>
          <input type="text" id="u_name" name="u_name"  placeholder = "Name" class="auto" autofocus="autofocus">
        </p>
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

<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>	
<link rel="stylesheet" href="jquery-ui.min.css" type="text/css" />
<script type="text/javascript">
$(function() {
	
	//autocomplete
	$(".auto").autocomplete({
		source: "search4.php",
		minLength: 1
	});				

});
</script>

    </body>

</html>

