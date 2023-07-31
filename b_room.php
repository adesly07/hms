<?php
include ('admin/db_connect.php');
if(!isset($_session)){
session_start();
}
if(isset($_GET['id']))
{
$id= intval($_GET['id']);
$sql2= "SELECT * FROM tblroom where ID ='$id'";
$query3 = mysqli_query($db, $sql2);
while($rows = mysqli_fetch_assoc($query3)){
$mysn = $rows['ID'];
$myr_type = $rows['RoomType'];
$myr_no = $rows['RoomNumber'];
$imgname = $rows['file_name'];
$img_file = "admin/mgt/Rooms_image/".$imgname;
$dimg = "<img src='$img_file' border='0'>";
$sql1 = "SELECT * FROM tblcategory where RoomType = '$myr_type'";
$query1 = mysqli_query($db,$sql1);
while($rows = mysqli_fetch_assoc($query1)){
$mydesc = $rows['Description'];
$r_facility = $rows['RoomFacility'];
$n_persons = $rows['NofPersons'];
$price = $rows['Price'];
}
}
}
 if(isset($_POST['Submit']))
  {
 $rtype=mysqli_real_escape_string($db,$_POST['rtype']);
 $gender=mysqli_real_escape_string($db,$_POST['gender']);
 $rno=mysqli_real_escape_string($db,$_POST['rno']);
 $cdate=mysqli_real_escape_string($db,$_POST['cdate']);
 $cout=mysqli_real_escape_string($db,$_POST['cout']);
 $cname=mysqli_real_escape_string($db,$_POST['cname']);
 $cnumber=mysqli_real_escape_string($db,$_POST['cnumber']);
 $email=mysqli_real_escape_string($db,$_POST['email']);
 $dob=mysqli_real_escape_string($db,$_POST['dob']);
 $idcard=mysqli_real_escape_string($db,$_POST['idcard']);
 $idnumber=mysqli_real_escape_string($db,$_POST['idnumber']);
  $address=mysqli_real_escape_string($db,$_POST['address']);
  $booknum=mt_rand(100000000, 999999999);
  $cdate1 =date('mm/dd/yyyy');
  $address = addslashes($address);
  $idcard = addslashes($idcard);
if($cdate <  $cdate1){
 $msg = "Check in date must be greater than current date";
} elseif($cdate > $cout)
{
$msg = "Check out date must be equal to / greater than  check in date";	
} else {
function dateDiff($cdate,$cout){
$date1_ts = strtotime($cdate);
$date2_ts = strtotime($cout);
$diff = $date2_ts - $date1_ts;
return round($diff/86400);
}
$n_days = dateDiff($cdate,$cout);
$sql1 = "SELECT * FROM tblcategory where RoomType = '$rtype'";
 $query1 = mysqli_query($db, $sql1);
while($rows = mysqli_fetch_assoc($query1)){
 $myid = $rows['ID'];
 $myprice = $rows['Price'];
 $amt = $n_days * intval($myprice);
$sql3 = "INSERT INTO tblbooking (ID, RoomType, RoomNumber, BookingNumber, CName, CNumber, CEmail, Dob, IDType, IDNumber, Gender, Address, CheckinDate, CheckoutDate, Ndays, Price, Amount, BookingDate, Remark, Status, UpdationDate) VALUES ('', '$rtype', '$rno', '$booknum', '$cname', '$cnumber', '$email', $dob, '$idcard', '$idnumber', '$gender', '$address', '$cdate', '$cout', '$n_days', '$myprice', '$amt', CURRENT_TIMESTAMP, 'Pending', 'Reserved', '')";
$result = mysqli_query($db, $sql3);
if($result) {
$sql4 = "UPDATE tblroom set Status = '1' where RoomNumber = '$rno'";
$result2 = mysqli_query($db, $sql4);
if($result2){
	$_SESSION['booknum'] = $booknum;
	header('location:invoice.php');
//$msg = "Your room has been book successfully. Booking Number is $booknum";	
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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>U.I. Ventures Limited</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">U.I. Ventures Ltd.</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

<nav id="navbar" class="navbar">
        <ul>
         <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="facility.php">Facilities</a></li>
         
          
          <li class="dropdown"><a href="#"><span>Rooms</span> <i class="bi bi-chevron-down"></i></a>
         
            <ul> <?php
		  $sql1 = "SELECT * from tblcategory";
$query2 = mysqli_query($db, $sql1);
while($rows = mysqli_fetch_assoc($query2)) {
$r_type = $rows['RoomType'];	


		  
		  ?>
    <li><a href="r_details.php?RoomType=<?php echo $r_type; ?>"> <?php echo $r_type; ?></a></li>
    <?php } ?>
        
            </ul>
          </li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
<section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                 <h2 class="animate__animated animate__fadeInDown">U.I. HOTELS</h2>
                <p class="animate__animated animate__fadeInUp">The U.I Hotels ensure you experience a luxurious hospitality and lifestyle</p>
                <p class="animate__animated animate__fadeInUp">. There are 100 guest rooms with excellent amenities.  Other facilities include a Multi-Purpose Conference Center, Laundry, Restaurant, and Bar Services.</p>
                <div>
                  <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                 <h2 class="animate__animated animate__fadeInDown">U.I. HOTELS</h2>
                <p class="animate__animated animate__fadeInUp">The U.I Hotels ensure you experience a luxurious hospitality and lifestyle. There are 100 guest rooms with excellent amenities.  Other facilities include a Multi-Purpose Conference Center, Laundry, Restaurant, and Bar Services.</p>
                <div>
                  <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                 <h2 class="animate__animated animate__fadeInDown">U.I. HOTELS</h2>
                <p class="animate__animated animate__fadeInUp">The U.I Hotels ensure you experience a luxurious hospitality and lifestyle. There are 100 guest rooms with excellent amenities.  Other facilities include a Multi-Purpose Conference Center, Laundry, Restaurant, and Bar Services.</p>
                <div>
                  <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 4 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                 <h2 class="animate__animated animate__fadeInDown">U.I. HOTELS</h2>
                <p class="animate__animated animate__fadeInUp">The U.I Hotels ensure you experience a luxurious hospitality and lifestyle. There are 100 guest rooms with excellent amenities.  Other facilities include a Multi-Purpose Conference Center, Laundry, Restaurant, and Bar Services.</p>
                <div>
                  <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 5 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                 <h2 class="animate__animated animate__fadeInDown">U.I. HOTELS</h2>
                <p class="animate__animated animate__fadeInUp">The U.I Hotels ensure you experience a luxurious hospitality and lifestyle. There are 100 guest rooms with excellent amenities.  Other facilities include a Multi-Purpose Conference Center, Laundry, Restaurant, and Bar Services.</p>
                <div>
                  <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 6 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                 <h2 class="animate__animated animate__fadeInDown">U.I. HOTELS</h2>
                <p class="animate__animated animate__fadeInUp">The U.I Hotels ensure you experience a luxurious hospitality and lifestyle. There are 100 guest rooms with excellent amenities.  Other facilities include a Multi-Purpose Conference Center, Laundry, Restaurant, and Bar Services.</p>
                <div>
                  <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
    <div class="section-title">
          <h2>Room Number: <?php echo $myr_no; ?></h2></div></section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th colspan="2" align="left" class="font-weight-bold">&nbsp;</th>
            </tr>
          </thead>
          
          <tbody>
            <tr>
              <td width="25%"><span class="d-none d-sm-table-cell"><img src="<?php echo $img_file; ?>" class="img-fluid" alt=""></span></td>
              <td width="75%"><p><?php echo $mydesc; ?></p>
              <p><b>Room Type:</b> <?php echo $myr_type; ?>
              <p><b>Number of Persons:</b> <?php echo $n_persons; ?></p>
              <p><b>Room Facilities:</b> <?php echo $r_facility; ?></p>
              <p><b>Price(&#8358;):</b> <?php echo number_format($price,2); ?></p></td>
            </tr>
            <tr>
              <th colspan="2" align="center" class="font-weight-bold">Book Your Room</th>
            </tr>
            <tr>
              <th colspan="2" align="left" class="font-weight-bold"><form name="form1" method="post" action="b_room.php">
              <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Customer Details:
                        <input name="rtype" type="hidden" id="rtype" value="<?php echo $myr_type; ?>">
                        <input name="rno" type="hidden" id="rno" value="<?php echo $myr_no; ?>">
                      </h4>
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
                                                <input class="form-control" id="cdate" name="cdate" type="date" placeholder = "yyyy-mm-dd" min="2000-01-01" max="2030-12-31" required />
                                                <label for="cdate">Check in date</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="cout" name="cout" type="date" placeholder = "yyyy-mm-dd" min="2000-01-01" max="2030-12-31" required />
                                                <label for="cout">Check out date</label>
                                            </div> 
                                            <div class="form-floating mb-3">
                                             <input class="form-control" id="email" name="email" type="email" placeholder = "Email Address" required />
                                                <label for="email">Email Address</label>
                                               
                                            </div>
                                            <div class="form-floating mb-3">
                                             <input class="form-control" id="dob" name="dob" type="text" placeholder = "Date of Birth(DD/MM)" required />
                                                <label for="dob">Date of Birth(DD/MM)</label>
                                               
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
              </form></th>
            </tr>
             
          </tbody>
        </table>
        <p>&nbsp;</p>
      </div>
    </section>

  </main><!-- End #main -->
<section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>GET IN TOUCH</h2>
          <p>You can get in touch with our team to discuss business</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 icon-box">
           <a href="#"> <div class="icon"><i class="bi bi-briefcase"></i></div></a>
            <h4 class="title"><a href="#">ADDRESS</a></h4>
           <a href="#"> <p class="description">Conference Centre Building, Chaptel Road, University of Ibadan, Ibadan, Nigeria</p></a>
                
          </div>
          <div class="col-lg-4 col-md-6 icon-box">
            <a href="#"><div class="icon"><i class="bi bi-card-checklist"></i></div></a>
            <h4 class="title"><a href="#">ENQUIRES</a></h4>
            <a href="#"><p class="description">+234(0)7088400001</p></a>
                
          </div>
          <div class="col-lg-4 col-md-6 icon-box">
           <a href="#"> <div class="icon"><i class="bi bi-bar-chart"></i></div></a>
            <h4 class="title"><a href="#">ABOUT US</a></h4>
           <a href="#"> <p class="description">U.I Hotels offer luxurious hospitality and lifestyle. There are 100 guest rooms with excellent amenities.  Other facilities include a Multi-Purpose Conference Center, Laundry, Restaurant, and Bar Services.</p></a>
                
          </div>
          
          
          
          
          </div>
        </div>

      </div>
    </section>
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>U.I. Ventures Limited</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
      
        Designed by <a href="http://updateng.com/" target="_blank">Update Nigeria & BrightZity Technologies</a>
      </div>
    </div>
</footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>