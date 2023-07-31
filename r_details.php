<?php
include ('admin/db_connect.php');
if(!isset($_session)){
session_start();
}


if(isset($_GET['RoomType']))
{
$rtype= $_GET['RoomType'];

$sql = "SELECT * from tblroom where RoomType = '$rtype' and Status = '0' and Display = 'ON'";
$query = mysqli_query($db, $sql);
$rcount = mysqli_num_rows($query);
while($rows = mysqli_fetch_assoc($query)) {
$r_type = $rows['RoomType'];
$sql2 = "SELECT * FROM tblcategory where RoomType = '$r_type'";
$query3 = mysqli_query($db,$sql2);
while($rows = mysqli_fetch_assoc($query3)){
$nrooms = $rows['Nrooms'];
$myperson = $rows['NofPersons'];
if($myperson != 0){
$peo = "People";
}else {
$peo = "";
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
                <p class="animate__animated animate__fadeInUp">The U.I Hotels ensure you experience a luxurious hospitality and lifestyle. There are 100 guest rooms with excellent amenities.  Other facilities include a Multi-Purpose Conference Center, Laundry, Restaurant, and Bar Services.</p>
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
   <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2><?php echo $rtype;?></h2>
          <p><strong>Total Numbers of Room: <span class="redtext"><?php echo $nrooms; ?></span></strong></p>
          <p><strong>Numbers of Room Available: <span class="green"><?php  echo $rcount; ?></span></strong></p>
           <p><strong>Room Capacity: <span class="green"><?php  echo $myperson; ?> <?php  echo $peo; ?></span></strong></p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
            
              <li data-filter="*"></li>
                            
            </ul>
          </div>
        </div>
 <?php
		  $sql1 = "SELECT * from tblroom where RoomType = '$rtype' and Display = 'ON' order by ID DESC limit 21";
$query2 = mysqli_query($db, $sql1);
$rcount = mysqli_num_rows($query2);
while($rows = mysqli_fetch_assoc($query2)) {
$id = $rows['ID'];
$myr_type = $rows['RoomType'];
$myr_no = $rows['RoomNumber'];
$mystatus = $rows['Status'];
if ($mystatus == 0){
$status = "<span class='bgreen'>Click to Book</span>";
$link = "b_room.php";
} else {
$status = "<span class='bred'>Occupied</span>";	
$link = "#";
}
$imgname = $rows['file_name'];
$img_file = "admin/mgt/Rooms_image/".$imgname;
$dimg = "<img src='$img_file' border='0'>";
$mydate = $rows['CreationDate'];
$sql1 = "SELECT * FROM tblcategory where RoomType = '$myr_type'";
$query1 = mysqli_query($db,$sql1);
$catcount = mysqli_num_rows($query1);
while($rows = mysqli_fetch_assoc($query1)){
$mydesc = $rows['Description'];

}
		  
		  ?>
        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?php echo $img_file; ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Room Type: <?php echo $myr_type; ?></h4>
                <h4>Room Number: <?php echo $myr_no; ?></h4>
                <p> <a href="<?php echo $link; ?>?id=<?php echo $id; ?>"><?php echo $status; ?></a></p>
                
              </div>
            </div>
          </div>
<?php } }?>

          

        </div>

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
            <a href="#"><p class="description">+234(0)7088400002</p></a>
                
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