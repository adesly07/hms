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
if(isset($_GET['id']))
{
$sn=intval($_GET['id']);
$sql2= "SELECT * FROM tblcategory where ID ='$sn'";
$query3 = mysqli_query($db, $sql2);
while($rows = mysqli_fetch_assoc($query3)){
$mysn = $rows['ID'];
$myr_type = $rows['RoomType'];
$myn_rooms = $rows['Nrooms'];
$mydesc = $rows['Description'];
$myfacility = $rows['RoomFacility'];
$myprice = $rows['Price'];
$mydate = $rows['Date'];
}
}

$msg = "Edit Room Type";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$sn = mysqli_real_escape_string($db,$_POST['sn']);	
$r_type = mysqli_real_escape_string($db,$_POST['r_type']);	
$n_rooms = mysqli_real_escape_string($db,$_POST['n_rooms']);	
$r_desc = mysqli_real_escape_string($db,$_POST['r_desc']);	
$r_facility = mysqli_real_escape_string($db,$_POST['r_facility']);
$price = mysqli_real_escape_string($db,$_POST['price']);
$sql = "UPDATE tblcategory set RoomType = '$r_type', Nrooms = '$n_rooms', Description = '$r_desc', RoomFacility = '$r_facility', Price = '$price', Date = CURRENT_TIMESTAMP where ID = '$sn'";
  $query = mysqli_query($db, $sql);
  if($query){
header('location:m_category.php');
  } else {
	$msg = "Error in updating record"; 
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
                              <form name="form1" action="e_category.php" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="r_type" name="r_type" type="text" value="<?php echo $myr_type; ?>" readonly/>
                                                <label for="r_type">Room Type</label>
                                            </div><div class="form-floating mb-3">
                                                <input class="form-control" id="n_rooms" name="n_rooms" type="text" value="<?php echo $myn_rooms; ?>"/>
                                                <label for="n_rooms">Number of Rooms</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="r_desc" name="r_desc" type="text" value="<?php echo $mydesc; ?>" />
                                                <label for="r_desc">Room Description</label>
                                            </div>  <div class="form-floating mb-3">
                                                <input class="form-control" id="price" name="price" type="text" value="<?php echo $myprice; ?>" />
                                                <label for="price">Price</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" name="r_facility" id="r_facility" cols="45" rows="5"><?php echo $myfacility; ?></textarea>
                                                <label for="r_facility">Room Facilities</label>
                                            </div>

                                            <div class="form-check mb-3">
                                              <input name="sn" type="hidden" id="sn" value="<?php echo $mysn; ?>">
                                             
</div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#"></a>
                                                <button class="btn btn-primary" type="submit" name="add">Update</button>
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