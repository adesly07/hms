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
$sql2= "delete from tblcategory where ID ='$sn'";
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

    $rpp = "10"; 

    $lps = $cps - $rpp; //Calculating the starting row number for previous page 

    if ($cps <> 0) 
    { 
        $prv =  "<a href='m_category.php?cps=$lps'><Prev</a>"; 
    } 
    else    
    { 
        $prv =  "<font color='cccccc'>Prev</font>"; 
    } 

    $q="Select SQL_CALC_FOUND_ROWS * from tblcategory order by ID DESC limit $cps, $rpp "; 
    $rs=mysqli_query($db, $q); 
    $nr = mysqli_num_rows($rs); //Number of rows found with LIMIT in action 

    $q0="Select FOUND_ROWS()"; 
    $rs0=mysqli_query($db, $q0); 
    $row0=mysqli_fetch_array($rs0); 
    $nr0 = $row0["FOUND_ROWS()"]; //Number of rows found without LIMIT in action 
    if (($nr0 < 10) || ($nr < 10)) 
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
                      <h4 class="card-title mb-sm-0">Manage Room Type</h4>
                      
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th colspan="10" align="left" class="font-weight-bold"><b><font face="verdana" size="1" color="#9999CC"><?php echo " $a - $b of $nr0"; ?></font></b></th>
                          </tr>
                          <tr>
                            <th class="font-weight-bold">S/N</th>
                            <th class="font-weight-bold">Room Type</th>
                            <th class="font-weight-bold">Number of Rooms</th>
                            <th class="font-weight-bold">Description</th>
                            <th class="font-weight-bold">Number of Persons</th>
                            <th class="font-weight-bold">Facilities</th>
                            <th class="font-weight-bold">Price(&#8358;)</th>
                            <th class="font-weight-bold">Date</th>
                            <th class="font-weight-bold">&nbsp;</th>
                            <th class="font-weight-bold">&nbsp;</th>
                          </tr>
                        </thead>
                         <?php 
                       // $sql2 ="SELECT * from  tblcontact where Isread is null";
// $query2 = mysqli_query($db, $rs);
while($rows = mysqli_fetch_assoc($rs)){
	$cps = $cps +1;
	$id = $rows['ID'];
$myr_type = $rows['RoomType'];
$myn_rooms = $rows['Nrooms'];
$mydesc = $rows['Description'];
$myperson = $rows['NofPersons'];
$myfacility = $rows['RoomFacility'];
$myprice = $rows['Price'];
$mydate = $rows['Date'];

?>
                        <tbody>
                          <tr>
                            <td>
                              <?php echo $cps; ?>
                            </td>
                            <td><?php echo $myr_type; ?></td>
                            <td><?php echo $myn_rooms; ?></td>
                            <td><?php echo $mydesc; ?></td>
                            <td><?php echo $myperson; ?></td>
                            <td><?php echo $myfacility; ?></td>
                            <td><?php echo number_format($myprice,2); ?></td>
                            <td>
                              <div class="badge badge-success p-2"><?php echo $mydate; ?></div>
                            </td>
                            <td align="center"><a href="e_category.php?id=<?php echo $id ?>">Edit</a></td>
                            <td align="center"><a href="m_category.php?id=<?php echo $id ?>" onClick="return check_deletion()">Delete</a></td>
                          </tr>
                           <?php } ?>
                          <tr>
                            <td colspan="10"><?php
                if (!mysqli_num_rows($rs)){
				echo "No order found!";
				} 
				?></td>
                          </tr>
                          <tr>
                            <td colspan="10" align="left"><span class="updates">
                              <?php   echo "$prv"; 

    
    if ($cps == $nr0) 
    {      
        echo "  |  <font color='CCCCCC'>Next</font>"; 
    } 
    else 
    { 
        if ($nr0 > 50) 
	
        { 
		
            echo "  |  <a href='m_category.php?cps=$cps&lps=$lps'>Next</a>"; 
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
  </body>
</html>