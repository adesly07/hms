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
if(isset($_GET['id']))
{
$sn=intval($_GET['id']);
$sql2= "delete from productlist where pid ='$sn'";
$query = mysqli_query($db, $sql2);
}

 @ $rpp;        //Records Per Page 
    @ $cps;        //Current Page Starting row number 
    @ $lps;        //Last Page Starting row number 
    @ $a;        //will be used to print the starting row number that is shown in the page 
    @ $b;         //will be used to print the ending row number that is shown in the page 
    
 
    if(empty($_GET["cps"])) 
    { 
        $cps = "0"; 
    } 
    else 
    { 
        $cps = $_GET["cps"]; 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 

    $a = $cps+1; 

    $rpp = "50"; 

    $lps = $cps - $rpp; //Calculating the starting row number for previous page 

    if ($cps <> 0) 
    { 
        $prv =  "<a href='v_price.php?cps=$lps'><<=</a>"; 
    } 
    else    
    { 
        $prv =  "<font color='cccccc'><<=</font>"; 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 

    $q="Select SQL_CALC_FOUND_ROWS * from productlist order by pid DESC limit $cps, $rpp "; 
    $rs=mysqli_query($db, $q) or die(mysqli_error()); 
    $nr = mysqli_num_rows($rs); //Number of rows found with LIMIT in action 

    $q0="Select FOUND_ROWS()"; 
    $rs0=mysqli_query($db,$q0) or die(mysqli_error()); 
    $row0=mysqli_fetch_assoc($rs0); 
    $nr0 = $row0["FOUND_ROWS()"]; //Number of rows found without LIMIT in action 
    ///////////////////////////////////////////////////////////////////////
    if (($nr0 < 50) || ($nr < 50)) 
    { 
           $b = $nr0; 
    } 
    else 
    { 
        $b = ($cps) + $rpp; 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 


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
    <script language="JavaScript">
	function check_deletion()
	{
		if (confirm("Are you sure you want to delete this record?"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>



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
               <div> <a href="a_price.php"><img src="assets/img/back.png" width="70" height="47" border="0" /></a>
      </div>
        <div class="register-container container">
            <div class="row">
              <div class="register span6"></div>
              
  <div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right" bgcolor="#F8F8F8"><b><font face="verdana" size="1" color="#9999CC"><? echo " $a - $b of $nr0"; ?></font></b></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCCC"><table width="100%" border="1" align="center" cellspacing="1">
          <tr>
            <td height="30" colspan="12" align="center" bgcolor="#009900" class="stock">Price List</td>
          </tr>
          <tr>
            <td width="77" height="25" align="center" bgcolor="#F8F8F8"><strong>S/N</strong></td>
            <td width="357" height="25" align="center" bgcolor="#F8F8F8"><strong>Item</strong></td>
            <td width="86" height="25" align="center" bgcolor="#F8F8F8"><strong>Price(&#8358;)</strong></td>
            <td width="117" height="25" align="center" bgcolor="#F8F8F8"><strong>Added By</strong></td>
            <td width="144" height="25" align="center" bgcolor="#F8F8F8"><strong>Date</strong></td>
            <td width="146" height="25" align="center" bgcolor="#F8F8F8"><strong>&nbsp;</strong></td>
          </tr>
          <?php
  while ($row = mysqli_fetch_assoc($rs)) {
 	$cps = $cps +1;
	$pid = $row ['pid'];  
	$p_name = $row ['p_name']; 
	$u_price = $row ['u_price'];  
 	$user = $row ['user'];  
	$s_date = $row ['s_date'];  
  
  
  ?>
          <tr>
            <td height="25" align="center" bgcolor="#F8F8F8"><a href="#"><?php echo $cps; ?></a></td>
            <td height="25" bgcolor="#F8F8F8"><?php echo $p_name; ?></td>
            <td height="25" align="right" bgcolor="#F8F8F8"><?php echo number_format($u_price,2); ?></td>
            <td height="25" align="center" bgcolor="#F8F8F8"><?php echo $user; ?></td>
            <td height="25" align="center" bgcolor="#F8F8F8"><?php echo $s_date; ?></td>
           
            <td height="25" align="center" bgcolor="#F8F8F8"><a href="v_price.php?id=<?php echo $pid ?>" onClick="return check_deletion()"><img src="assets/img/delete.png" width="16" height="16"></a></td>
          </tr>
          <?php } ?>
        </table></td>
      </tr>
      <tr>
     <td align="center" bgcolor="#F8F8F8" class="msg">  <?php
                if (!mysqli_num_rows($rs)){
				echo "No record found!";
				} 
				?> </td>
      </tr>
      <tr>
        <td align="right" bgcolor="#F8F8F8" class="msg"><span class="updates">
          <?php   echo "$prv"; 

    ///////////////////////////////////////////////////////////////////////////////// 
    
    if ($cps == $nr0) 
    {      
        echo "  |  <font color='CCCCCC'>=>></font>"; 
    } 
    else 
    { 
        if ($nr0 > 50) 
	
        { 
		
            echo "  |  <a href='v_price.php?cps=$cps&lps=$lps'>=>></a>"; 
        } 
    } 
    ///////////////////////////////////////////////////////////////////////////////// 
    ?>
        </span></td>
      </tr>
    </table>
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

