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

$msg = "Reservation";
if(isset($_POST['Submit']))
  {
 $rtype=$_POST['rtype'];
 $gender=$_POST['gender'];
 $rno=$_POST['rno'];
 $cdate=$_POST['cdate'];
 $cout=$_POST['cout'];
 $cname=$_POST['cname'];
 $cnumber=$_POST['cnumber'];
 $email=$_POST['email'];
 $idcard=$_POST['idcard'];
 $idnumber=$_POST['idnumber'];
  $address=$_POST['address'];
  $booknum=mt_rand(100000000, 999999999);
  $cdate=date('mm/dd/yyyy');
if($cdate <  $cdate){
 $msg = "Check in date must be greater than current date";
} elseif($cdate > $cout)
{
$msg = "Check out date must be equal to / greater than  check in date";	
} else {
$sql1 = "SELECT * FROM tblcategory where RoomType = '$rtype'";
 $query1 = mysqli_query($db, $sql1);
while($rows = mysqli_fetch_assoc($query1)){
 $myid = $rows['ID'];
 $myprice = $rows['Price'];
$sql3 = "INSERT INTO tblbooking (ID, RoomType, RoomNumber, BookingNumber, CName, CNumber, CEmail, IDType, IDNumber, Gender, Address, CheckinDate, CheckoutDate, Ndays, Price, Amount, BookingDate, Remark, Status, UpdationDate) VALUES ('', '$rtype', '$rno', '$booknum', '$cname', '$cnumber', '$email', '$idcard', '$idnumber', '$gender', '$address', '$cdate', '$cout', '', '$myprice', '', CURRENT_TIMESTAMP, 'Pending', 'Reserved', '')";
$result = mysqli_query($db, $sql3);
if($result) {
$sql4 = "UPDATE tblroom set Status = '1' where RoomNumber = '$rno'";
$result2 = mysqli_query($db, $sql4);
if($result2){
$msg = "Your room has been book successfully. Booking Number is $booknum";	
}else {
$msg = "Something Went Wrong. Please try again";	
}
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
        <script>
        $(function(){
	var d1;
	var d2;
	
	var t = new Date();
	var month = t.getMonth();
	var day = t.getDay();
	var date = t.getDate();
	var year = t.getFullYear();
	var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
	var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
	var today = "0"+(month+1)+"/"+date+"/"+year;
	var dateStr = days[day]+', '+months[month]+' '+date+', '+year;
	document.getElementById("alternate1").value = dateStr;
	document.getElementById("cdate").setAttribute("value",today);
	var bb = today.split(' ');
	d1 = new Date(bb);

	
	$("#cdate").datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		changeMonth: true,
		changeYear: true,
		altField: "#alternate1",
		altFormat: "DD, MM d, yy",
		 
		onSelect: function() {
			var a = $.datepicker.formatDate("yy mm dd", $(this).datepicker("getDate"));
			var b = a.split(' ');
			d1 = new Date(b);
		} 
	});
	
		$("#cout").datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		changeMonth: true,
		changeYear: true,
		altField: "#alternate2",
		altFormat: "DD, MM d, yy",
		 
		onSelect: function() {
			var c = $.datepicker.formatDate("yy mm dd", $(this).datepicker("getDate"));
			var g = c.split(' ');
			d2 = new Date(g);
		} 
	});
	
	$("#Submit").on('Submit',function(){
	var oneDay = 24*60*60*1000;	// hours*minutes*seconds*milliseconds
	var diffDays = (d2-d1)/oneDay;
	document.getElementById("output").innerHTML = diffDays + " days";
	});

});
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
                              <form name="form1" action="reservation.php" method="post">
                               <div class="form-floating mb-3">
                                               <select type="text" name="rtype" id="rtype" value="" class="form-control" required="true">
<option value="">Select Room Type</option>
                                                        <?php 
$sql2 = "SELECT * from tblcategory";
$query2 = mysqli_query($db, $sql2);
while ($rows = mysqli_fetch_assoc($query2)) {
$myprice = $row['Price'];
    ?>  
<option value="<?php echo $rows['RoomType'];?>"><?php echo $rows['RoomType'];?> &nbsp; &#8358;<?php echo number_format($rows['Price'],2);?></option>
 <?php } ?> 
            
                                                        
                                                    </select> 
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select type="text" name="rno" id="rno" class="form-control">
<option value="">Choose Room Number</option>
                                                      
            
                                                        
                                                    </select>
                                            </div><div class="form-floating mb-3">
                                                <input class="form-control" id="cdate" name="cdate" type="date" required />
                                                <label for="cdate">Check in date</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="cout" name="cout" type="date" required />
                                                <label for="cout">Check out date</label>
                                            </div> 
       <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Customer Details:</h4>
                    </div>                               
                                            <div class="form-floating mb-3">
                                             <input class="form-control" id="cname" name="cname" type="text" placeholder = "Full Name" required />
                                                <label for="cname">Full Name</label>
                                               
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select type="text" name="gender" id="gender" class="form-control">
<option value="">Select Gender</option>
<option value="Female">Female</option>
<option value="Male">Male</option>
            
                                                        
                                              </select>
                                </div>
<div class="form-floating mb-3">
                                             <input class="form-control" id="cnumber" name="cnumber" type="number" maxlength="11" placeholder = "Contact Number" required />
                                                <label for="cnumber">Contact Number</label>
  
                                               
                                            </div>
                                            <div class="form-floating mb-3">
                                             <input class="form-control" id="email" name="email" type="email" placeholder = "Email Address" required />
                                                <label for="email">Email Address</label>
                                               
                                            </div>
                                             <div class="form-floating mb-3">
                                                <select type="text" name="idcard" id="idcard" class="form-control">
<option value="">Select ID Card Type</option>
<option value="Voter ID Card">Voter ID Card</option>
<option value="National ID Card">National ID Card</option>
 <option value="International ID Card">International ID Card</option>  
 <option value="Driver's licence ID Card">Driver's licence ID Card</option>                                                  
            
                                                        
                                                    </select>
                                                    </div>                                          <div class="form-floating mb-3">
                                             <input class="form-control" id="idnumber" name="idnumber" type="text" placeholder = "Selected ID Card Number" required />
                                                <label for="idnumber">Selected ID Card Number</label>
                                               
                                            </div>
                                            <div class="form-floating mb-3">
                                             <input class="form-control" id="address" name="address" type="text" placeholder = "Residential Address" required />
                                                <label for="address">Residential Address</label>
                                               
                                            </div>
                                            <div class="form-check mb-3">
                                              <input type="hidden" name="output" id="output">
        </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#"></a>
                                                <button class="btn btn-primary" type="submit" id="Submit" name="Submit">Submit</button>
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
<script src="jquery.min.js"></script>
<script src="ajax-script.js" type="text/javascript"></script>

  </body>
</html>