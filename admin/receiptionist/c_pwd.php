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
$myid = $rows['ID'];
$myname = $rows['AdminName'];
$myemail = $rows['Email'];
 }
}
$msg = "Change Password";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$id = mysqli_real_escape_string($db,$_POST['adminid']);	
$current = mysqli_real_escape_string($db,$_POST['current']);	
$new = mysqli_real_escape_string($db,$_POST['new']);	
$confirm = mysqli_real_escape_string($db,$_POST['confirm']);
if($new != $confirm){
$msg = "Password and confirm password does not match.";
} else {
$current = md5($current);	
$sql2 = "SELECT * FROM tbladmin WHERE ID = '$id' and Password = '$current'";
  $query2 = mysqli_query($db, $sql2);
  if(mysqli_num_rows($query2)>0){
	  $new = md5($new);
$sql1 = "UPDATE tbladmin set Password = '$new' where ID = '$id'";	   $query1 = mysqli_query($db, $sql1);
  if($query1){
	//$msg = "Password has been changed successfully"; 
	header('location:logout.php?link=index'); 
  } else {
	$msg = "Error in chanfing password"; 
  }
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
         <link href="css/f_style.css" rel="stylesheet" />
        <script src="../js/all.js" crossorigin="anonymous"></script>
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
                <img class="img-xs rounded-circle ml-2" src="../images/user.png" alt="Profile image"> <span class="font-weight-normal"> <?php echo $username; ?> </span></a>
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
            <div class="row"></div>
            <!-- Quick Action Toolbar Starts--><!-- Quick Action Toolbar Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0"><?php echo $msg; ?></h4>
                    </div>
                    <div class="table-responsive border rounded p-1">
                   <div class="card-body">
                              <form name="form1" action="c_pwd.php" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="current" name="current" type="password" placeholder="Current Password" required />
                                                <label for="current">Current Password</label>
                                            </div>
<div class="form-floating mb-3">
                                                <input class="form-control" id="new" name="new" type="password" placeholder="New Password" required />
                                                <label for="new">New Password</label>
                                            </div>
                                                                                        <div class="form-floating mb-3">
                                                <input class="form-control" id="confirm" name="confirm" type="password" placeholder="Confirm Password" required />
                                                <label for="confirm">Confirm Password</label>
                                            </div>

                                            <div class="form-check mb-3">
                                              <input name="adminid" type="hidden" id="adminid" value="<?php echo $myid; ?>">
        </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#"></a>
                                                <button class="btn btn-primary" type="submit" name="c_user">Change</button>
                                            </div>
                                        </form>
                                    </div>
                    </div>
                    
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
  </body>
</html>