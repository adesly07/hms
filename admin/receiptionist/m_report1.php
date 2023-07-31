<?php
include ('../db_connect.php');
if(!isset($_session)){
session_start();
}
if (!isset($_SESSION['username']) || !isset($_SESSION['password']))
header('LOCATION: '.'../index.php');
$username = $_SESSION['username'];
$password = $_SESSION['password'];
 $sql = "SELECT * FROM tbladmin WHERE username = '$username'";
  $query = mysqli_query($db, $sql);
if (mysqli_num_rows($query) > 0) {
 while ($rows = mysqli_fetch_assoc($query)) {
$myname = $rows['AdminName'];
$myemail = $rows['Email'];
 }
}
$mdate = "";
$t_amt = "0";
$rtype = "";
 if(isset($_POST['Submit']))
 {
 $mdate = $_POST['mdate'];
 $rtype = $_POST['rtype'];
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

    $rpp = "20"; 

    $lps = $cps - $rpp; //Calculating the starting row number for previous page 

    if ($cps <> 0) 
    { 
        $prv =  "<a href='m_report1.php?cps=$lps'><Prev</a>"; 
    } 
    else    
    { 
        $prv =  "<font color='cccccc'>Prev</font>"; 
    } 

    $q="Select SQL_CALC_FOUND_ROWS * from tblbooking where Cmonth = '$mdate' and RoomType = '$rtype' order by ID ASC limit $cps, $rpp "; 
    $rs=mysqli_query($db, $q); 
    $nr = mysqli_num_rows($rs); //Number of rows found with LIMIT in action 

    $q0="Select FOUND_ROWS()"; 
    $rs0=mysqli_query($db, $q0); 
    $row0=mysqli_fetch_array($rs0); 
    $nr0 = $row0["FOUND_ROWS()"]; //Number of rows found without LIMIT in action 
    if (($nr0 < 20) || ($nr < 20)) 
    { 
           $b = $nr0; 
    } 
    else 
    { 
        $b = ($cps) + $rpp; 
    } 


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UI Hotel Management System</title>
    <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../images/favicon.png" />
 </script>
  <script type="text/javascript" src="jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>	
<link rel="stylesheet" href="jquery-ui.min.css" type="text/css" />

	<link href="../src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="../src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : '../src/loading.gif',
        closeImage   : '../src/closelabel.png'
      })
    })
  </script>
 </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="index.php">
            <img src="../images/logo.png" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../images/user.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome &nbsp;<a href="#"> <?php echo $myname; ?> </a>&nbsp;to the dashboard!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="../images/user.png" alt="Profile image"> <span class="font-weight-normal"> <?php echo ucfirst($username); ?> </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="../images/user.png" alt="Profile image">
                  <p class="font-weight-light text-muted mb-0"><?php echo $myemail; ?></p>
                </div>
                <a class="dropdown-item" href="c_user.php"><i class="dropdown-item-icon icon-user text-primary"></i> Create User </a>
                <a class="dropdown-item" href="c_pwd.php"><i class="dropdown-item-icon icon-speech text-primary"></i> Change Password</a>
                <a href="logout.php?link=index" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include_once("menu.php"); ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row purchace-popup"></div>
            <!-- Quick Action Toolbar Starts-->
            <!-- Quick Action Toolbar Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Monthly Report: <?php echo $mdate; ?></h4>
                      
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th colspan="9" align="left" class="font-weight-bold"><form name="form1" method="post" action="m_report1.php">

                                           <select type="text" name="mdate" id="mdate">
<option value="Jan">Jan</option>
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
<p>&nbsp;</p> <p>
                                               <select type="text" name="rtype" id="rtype" value=""  required="true">
<option value="">Select Room Type</option>
                                                        <?php 
$sql2 = "SELECT * from tblcategory";
$query2 = mysqli_query($db, $sql2);
while ($rows = mysqli_fetch_assoc($query2)) {
    ?>  
<option value="<?php echo $rows['RoomType'];?>"><?php echo $rows['RoomType'];?> </option>
 <?php } ?> 
            
                                                        
                                                    </select> 
                                             </p>
              <button type="submit" id="Submit" name="Submit">Search</button>
            </form></th>
                          </tr>
                          <tr>
                            <th colspan="9" align="left" class="font-weight-bold">&nbsp;</th>
                          </tr>
                          <tr>
                            <th colspan="9" align="left" class="font-weight-bold"><b><font face="verdana" size="1" color="#9999CC"><?php echo " $a - $b of $nr0"; ?></font></b></th>
                          </tr>
                          <tr>
                            <th class="font-weight-bold">S/N</th>
                            <th class="font-weight-bold">Room Type</th>
                            <th class="font-weight-bold">Room Number</th>
                            <th class="font-weight-bold">Customer Name</th>
                            <th class="font-weight-bold">Booking Number</th>
                            <th class="font-weight-bold">Price(&#8358;)</th>
                            <th class="font-weight-bold">Number of Days</th>
                            <th class="font-weight-bold">Discount</th>
                            <th class="font-weight-bold">Amount Paid(&#8358;)</th>
                          </tr>
                        </thead>
                         <?php 
                       // $sql2 ="SELECT * from  tblcontact where Isread is null";
// $query2 = mysqli_query($db, $rs);
while($rows = mysqli_fetch_assoc($rs)){
	$cps = $cps +1;
	$id = $rows['ID'];
$myr_type = $rows['RoomType'];
$myr_no = $rows['RoomNumber'];
$b_no = $rows['BookingNumber'];
$cname = $rows['CName'];
$price = $rows['Price'];
$discount = $rows['Discount'];
$amount = $rows['Amount'];
$ndays = $rows['NDays'];

$sql1 = "Select SUM(Amount) from tblbooking where Cmonth = '$mdate' and Remark = 'Approved' and RoomType = '$rtype'";
  $query1 = mysqli_query($db, $sql1);
  while ($row = mysqli_fetch_assoc($query1)) {
	$t_amt = intval($row['SUM(Amount)']);  
  }

?>
                        <tbody>
                          <tr>
                            <td>
                              <?php echo $cps; ?>
                            </td>
                            <td><?php echo $myr_type; ?></td>
                            <td><?php echo $myr_no; ?></td>
                            <td><?php echo $cname; ?></td>
                            <td align="center"><?php echo $b_no; ?></td>
                            <td align="center"><?php echo $price; ?></td>
                            <td align="center">
                              <?php echo $ndays; ?>
                            </td>
                            <td align="center"><?php echo $discount; ?></td>
                            <td align="center"><?php echo $amount; ?></td>
                          </tr>
                           <?php } ?>
                          <tr>
                             <td colspan="9" align="right"><span class="green">Total Amount(&#8358;): <strong><?php echo number_format($t_amt,2); ?></strong></span></td>
                          </tr>
                          <tr>
                            <td colspan="9" align="center"><?php
                if (!mysqli_num_rows($rs)){
				echo "<span class='redtext'>No record found!</span>";
				} 
				?></td>
                          </tr>
                          <tr>
                            <td colspan="9" align="center"><span class="font-weight-bold">
                              <input type="submit" name="button" id="button" value="Print Report" onclick="print(this.windows)" />
                            </span></td>
                          </tr>
                          <tr>
                            <td colspan="9" align="left"><span class="updates">
                              <?php   echo "$prv"; 

    
    if ($cps == $nr0) 
    {      
        echo "  |  <font color='CCCCCC'>Next</font>"; 
    } 
    else 
    { 
        if ($nr0 > 20) 
	
        { 
		
            echo "  |  <a href='m_report1.php?cps=$cps&lps=$lps'>Next</a>"; 
        } 
    } 
    ?>
                            </span></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    
                </div>
              </div>
            </div>
          </div>
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.uiventureslimited.com">UI Ventures.</a> All Rights Reserved</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Developed by
                                &middot;
                                <a href="http://www.updateng.com" target="_blank">Update Nigeria and Brightzity Technologies</a></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
 <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->
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