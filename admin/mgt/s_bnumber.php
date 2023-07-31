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
$myr_no = "";
$myr_type = "";
$b_no = "";
$checkin = "";
$checkout = "";
$mystatus = "";

if(isset($_POST['Submit']))
  {
 $bno=$_POST['bno'];
 $sql1 = "SELECT * FROM tblbooking where BookingNumber = '$bno'";
 $query1 = mysqli_query($db, $sql1);
while($rows = mysqli_fetch_assoc($query1)){
	$id = $rows['ID'];
$myr_type = $rows['RoomType'];
$myr_no = $rows['RoomNumber'];
$b_no = $rows['BookingNumber'];
$cname = $rows['CName'];
$cdate = $rows['CheckinDate'];
$cout = $rows['CheckoutDate'];
$amount = $rows['Amount'];

$mystatus = $rows['Status'];
if ($mystatus == "Reserved"){
$checkin = "-";	
$checkout = "-";	
} elseif($mystatus == "Booked") {
$checkin = "<a href='checkin.php?id=$id' class='bgreen' rel='facebox'>Check In</a>";	
$checkout = "-";	
}elseif($mystatus == "Checkedin"){
$checkin = "<a href='#' class='bred'>Checked In</a>";	
$checkout = "<a href='checkout.php?id=$id' class='bgreen' rel='facebox'>Check Out</a>";	
} elseif($mystatus == "Checkout"){
$checkin = "<a href='#' class='bred'>Check Out</a>";	
$checkout = "<a href='#' class='bred'>Check Out</a>";	
}else {
$checkin = "<a href='#' class='bred'>Cancelled</a>";	
$checkout = "<a href='#' class='bred'>Cancelled</a>";	
	
}
}
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
                      <h4 class="card-title mb-sm-0">Booking Number: <?php echo $b_no; ?></h4>
                      
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th colspan="9" align="left" class="font-weight-bold"><form name="form1" method="post" action="s_bnumber.php">
              <input type="text" id="bno" name="bno"  placeholder = "Search Book Number" class="auto" autofocus="autofocus" style="border-color:#900">
              <button type="submit" id="Submit" name="Submit">Search</button>
            </form></th>
                          </tr>
                          <tr>
                            <th colspan="8" align="left" class="font-weight-bold">&nbsp;</th>
                          </tr>
                          
                          <tr>
                            <th class="font-weight-bold">Room Type</th>
                            <th class="font-weight-bold">Room Number</th>
                            <th class="font-weight-bold">Booking Number</th>
                            <th class="font-weight-bold">Check In</th>
                            <th class="font-weight-bold">Check Out</th>
                            <th class="font-weight-bold">Status</th>
                            <th class="font-weight-bold">&nbsp;</th>
                            <th class="font-weight-bold">&nbsp;</th>
                          </tr>
                        </thead>
                        


                        <tbody>
                          <tr>
                            <td><?php echo $myr_type; ?>
                            </td>
                            <td><?php echo $myr_no; ?></td>
                            <td><?php echo $b_no; ?></td>
                            <td align="center"><?php echo $checkin; ?></td>
                            <td align="center"><?php echo $checkout; ?></td>
                            <td align="center"><?php echo $mystatus; ?></td>
                            <td align="center">
                              <a href="c_info.php?id=<?php echo $id ?>" title="View Customer Information"rel="facebox"> <i class="icon-user"></i></a></td>
                            <td align="center">
                            </td>
                            <td align="center"></td>
                          </tr>
                          <tr>
                            <td colspan="8">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="9" align="left"><span class="updates">
                             
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