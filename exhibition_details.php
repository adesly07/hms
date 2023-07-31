<?php
//session_start();
//error_reporting(0);

include('conx.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>U.I. Ventures Limited | U.I. Consultancy Services Unit</title>
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

  <!-- =======================================================
  * Template Name: Groovin
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/groovin-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">U.I. Ventures Ltd.</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="about.php">About</a></li>
          <li><a class="nav-link scrollto" href="management.php">Management</a></li>
          <li><a class="nav-link scrollto " href="https://uihotels.uiventureslimited.com" target="_blank">U.I. Hotels</a></li>
          <li class="dropdown"><a href="#"><span>Divisions</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
    <li><a href="uibakery.php">U.I. Bakery/U & I Fast Food</a></li>
         <li><a href="uipetrol.php">U.I. Petrol Station</a></li>
         <li><a href="uipress.php">U.I. Printing Press</a></li>
         <li><a href="uihealth.php">U.I. Health, Safety and Environment Unit</a></li>
         <li><a href="uiconsultancy.php">U.I. Consultancy Services Unit</a></li>
         <li><a href="https://uihotels.uiventureslimited.com" target="_blank">U.I. Hotels</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
          <li><a class="getstarted scrollto" href="https://uihotels.uiventureslimited.com">Reservation</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Fair & Exhibition</h2>
          <ol>
            <li><a href="uiconsultancy.php">U.I. Consultancy Services Unit</a></li>
            <li>IFBD Fair & Exhibition </li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
    <?php
$page = "SELECT * from tblpage where PageType = 'uiconsultancy'";
$objects = mysqli_query($con, $page);
while($row = mysqli_fetch_array($objects)){
$pid =  $row['ID'];
$pagetitle =  $row['PageTitle'];
$pagedescription =  $row['PageDescription'];
{               ?>

      <div class="container">
       
       <center><strong><h3>U.I  VENTURES LIMITED (CONSULTANCY SERVICES UNIT)</h3></strong></center>
        <center><strong><h3>IN COLLABORATION WITH</h3></strong></center> 
        <center><strong><h3>IST A-Z  EXHIBITION VENTURES</h3></strong></center>
        <center><strong><h3>PRESENT</h3></strong></center>
<center><strong><h2><a href="#">FOODS, BEVERAGES, DRUGS FAIR &amp;  EXHIBITION</a></h2></strong></center>
          <strong>
            ABOUT THE 1ST INTERNATIONAL FOODS, BEVERAGES, DRUGS FAIR &amp;  EXHIBITION</strong> <br>
          <img src="assets/img/exhibition.jpg" width="300" hspace="10" align="right">The  1st International Foods, Beverages, Drugs Fair &amp; Exhibition  (Otherwise called &ldquo;the 3 big sectoral fair &amp; exhibition&rdquo;) is the first of  it&rsquo;s kind to be organized in Ibadan; more specifically in the academic  environment of the premier School – The University of Ibadan.</p>
        <p>By  concept and design, it is supposed to be the biggest assemblage of  pharmaceutical companies, food producing &amp; processing companies as well as  beverage Companies within and outside Nigeria. </p>
        <p>The  highlights of these Foods, beverages, drugs fair &amp; exhibition is not  limited to the Fair and Exhibition, the Seminar/sectoral lectures, break–out  sessions, the Dinner /Award ceremony plus other side attractions.</p>
        <p>The  Event will in all, highlight the progress that has been recorded in these  sectoral industries and proffer new ideologies for their overall progress &amp;  development.<br>
          All  the key events will engender goodwill and elicit maximum publicity, which will  be most beneficial to the sponsors and patrons.  </p>
        <p><strong>&nbsp;</strong><a href="#">Click to reserve a space now</a></p>
        <p><strong>ABOUT 1ST A –Z  EXHIBITION VENTURES</strong><br>
          Engr.  Adedeji Ponle is the Chief Executive Officer of 1st A – Z Exhibition  Ventures located in Ibadan but with vast branches across the Country and in the  diaspora. He is the visionary for the International Foods, Beverages, Drugs  Fair &amp; Exhibition brand. An initiative that brings together 3 critical  &amp; essential areas of existence.<br>
          <br>
          Leading  a versatile and diverse team of professionals, Engr. Ponle, is a consummate  Engineer &amp; notable Entrepreneur of several years standing. He has  successfully piloted and undertaken several projects for government  institutions &amp; the private Sector.</p><br>
  <p>
  <strong>UNIVERSITY OF IBADAN  VENTURES LIMITED</strong><br>
          In  conjunction with 1st A-Z Exhibition, it is desirous of bringing  these 3 vital sectors together under the 1st International Foods,  Beverages, Drugs Fair &amp; Exhibition being hosted on their strategic  premises. The Ventures is an assemblage of experienced professionals &amp;  academics who are responsible for creating, exploring &amp; executing  entrepreneurial projects with a view to adding commercial edge to their  corporate aspiration. Amongst other titles in their belt are, the U.I. Hotels,  the Print shop, the consultancy wing, that this fair &amp; Exhibition fall  under their direct supervision.</p><br/>
        <p><strong>MANUFACTURERS ASSOCIATION OF  NIGERIA (MAN)</strong><br>
          The  Secretariat of the Oyo/Osun/Ondo/Ekiti States Branch lead by Mr. Lanre Popoola  as Chairman is coordinating it&rsquo;s membership within and outside the region to  proudly support the event. By mobilizing it&rsquo;s structures, MAN encourages  companies in the 3 critical sectors which the fair is focused on to key into  this initiative of promoting the Nigerian brand. The Association is also  providing the platform for its members to showcase their products and share  their experiences in the technical and administrative processes that ensures  that they meet the insatiable needs of human existence.</p><br/>
        <p><strong>OUR OBJECTIVES</strong>
        <ul>
          <li><span dir="LTR"> </span>To create major opportunity for stakeholders  interaction and to update knowledge in the triple sectors of Foods, Beverages  &amp; Drugs as well as allied sectors.</li>
          <li><span dir="LTR"> </span>To bring together various organs of Government,  manufacturers from the 3 notable life sustaining sectors; foods, beverages  &amp; drugs, agric development organizations, financial support institutions,  under the investment forum to serve as a vehicle for exchange of ideas.</li>
          <li><span dir="LTR"> </span>To create a link between research works, local &amp;  foreign innovation and full-fledged production skills for increased yield.</li>
          <li><span dir="LTR"> </span>To explore the untapped vast employment  opportunities in the 3 key sectors as well as food processing and allied arts.</li>
          <li><span dir="LTR"> </span>To avail participants the opportunity to showcase  available products and services for immediate marketing advantage.</li>
        </ul>
        </p><br/>
        <p><strong>PROGRAMME SCHEDULE</strong>
        <ul>
          <li><span dir="LTR"> </span><strong>The  Main Exhibition Opens - Monday 16th and runs daily to Sunday 22nd  Oct, 2023</strong></li>
        </ul>
        <ul>
          <li><span dir="LTR"> </span><strong>On  Wednesday 18th – Thursday 19th   Oct., 2023: – Seminar/Workshops</strong></li>
        </ul>
        <ul>
          <li><span dir="LTR"> </span><strong>On  Friday 20th October, 2023: – Gala/Award Night</strong></li>
        </ul>
        <ul>
          <li><span dir="LTR"> </span><strong>Lastly,  on Sunday 22nd October, 2023</strong><strong>: –</strong> <strong>Departure</strong></li>
        </ul>
        </p><br/>
<p><strong>TARGET PARTICIPANTS</strong>
        <ul>
          <li><span dir="LTR"> </span>The Federal Ministry  of Industry Trade and Investment (FMITI).</strong></li>
          <li>The Federal Ministry  of Health.</li>
          <li> The Central Bank of  Nigeria.</li>
          <li> All States Ministries  of Commerce, Industries, Trade, Investments and Cooperatives.</li>
          <li> All States Ministries  of Health. </li>
          <li>International  Development Agencies.</li>
          <li> Manufacturers of Food  processing machineries/parts.</li>
          <li> Food &amp; Beverage  Industries.</li>
          <li> Pharmaceutical  Processing Companies.</li>
          <li> Agricultural &amp;  Research Institutions.</li>
          <li> Universities &amp;  Colleges of Health Management Studies</li>
          <li>Caterers &amp;  Outdoor Food Chain Operators.</li>
          <li> Food Packaging &amp;  Storage Companies.</li>
          <li> Related Allied  Industries.</li>
          <li> Professional  Advertisers.</li>
        </ul>
        </p>
        <a href="#">Click to reserve a space now</a><br>
        <br/>
        <p><strong>MODE OF PARTICIPATION</strong><br>
          The  organizers have provided various opportunities for interested Federal &amp; State  organs, international bodies and corporate organizations to identify with the  lofty goals of the fair &amp; exhibition in the following ways:</p>
        <p><a href="#"><img src="assets/img/reserves.jpeg" width="390" height="231"></a></p><br/>
        <p><strong>EXHIBITION SPACE  BOOKING/SEMINAR WORKSHOP ET AL</strong>
        <ol>
          <li><span dir="LTR"> </span>Participants can book  for an open allocated space and be responsible for it&rsquo;s construction in  accordance to design specification prescribed by the Event Secretariat. The  space is available at the rate of N200,000 (Two Hundred Thousand Naira only)  for a unit of 10sq.m. in multiple bookings. Our construction teams are available  on request at a cost.</li>
          <br/>
          <li><span dir="LTR"> </span>Fully constructed aluminum  booths are available at the rate of N300,000 for a unit of 20sq.m. in multiple  bookings. (otherwise referred to as VIP Booths). </li><br/>
          <li><span dir="LTR"> </span>Segregated open  column of strategic space are also available for vendors &amp; related arts at  the cost of N30,000 for 5x4 ft. and <br>
          6x6 ft @ N60,000        </li><br/>

          <li><span dir="LTR"> </span><strong>Full  colour advert placements</strong> in the exquisite souvenir event  brochure at the following rates:</li>
          
              <table width="291" height="156" border="0">
                <tr valign="bottom">
                  <td width="196">
                    ** Full Page
                  </td>
                  <td width="76">
                    N200,000
                  </td>
                </tr>
                <tr valign="bottom">
                  <td>** Inside Front  Cover</td>
                  <td>N250,000</td>
                </tr>
                <tr valign="bottom">
                  <td>** Inside Back  Cover</td>
                  <td>N250,000</td>
                </tr>
                <tr valign="bottom">
                  <td>** Cover Strip</td>
                  <td>N150,000<strong></strong></td>
                </tr>
                <tr valign="bottom">
                  <td>** Supplements (per  page)</td>
                  <td>N350,000</td>
                </tr>
              </table>
          </ul>
          <br/>
          <li><span dir="LTR"> </span><strong>Seminar  Workshop: </strong>The 2 days seminar is aimed at providing a discussion  forum for stakeholders. Participants fee (per delegate) <br>
          Foreign - $120 (One  Hundred &amp; Twenty Dollars)           <br>
Nigerian - N50,000 (Fifty  Thousand Naira)</li>
        </ol>
<p><span dir="LTR"> </span><strong>Speakers </strong>will  be drawn from within &amp; across the globe to open up franchise opportunities  for interested participants.</p>
          <p><span dir="LTR"> </span><strong>Papers  &amp; Discussions: </strong>presentation of papers would be delivered by  renowned experts under the chairmanship of internationally recognized  personalities with notable contributions to the growth of the sectors.</p><br/>
          <span dir="LTR"> </span><strong>Seminar  Theme</strong>
    
        <p><strong><em>&ldquo;</em></strong><em>Highlighting in practical terms,  effective administration and development of the social responsibilities in  foods, beverages &amp; drugs&rdquo;.</em></p><br/>
          <p><span dir="LTR"> </span><strong>Seminar  Sub –Themes</strong>
        <ul>
          <li><span dir="LTR"> </span><em>&ldquo;Expanding National  Development Planning Beyond Public Sector Bureaucracy in Drug Administration</em>&rdquo;.<strong></strong></li>
          <li><span dir="LTR"> </span><em>&ldquo;Working out An Achievable National/ International  Vision To Foster Growth In The Food, Beverages And Drug Trade In Nigeria&rdquo;.</em><strong></strong></li>
          <li><span dir="LTR"> </span><em>&ldquo;Restructuring the  Nigerian Societies Towards Eradicating Drug Abuse&rdquo;.       </em><strong></strong></li>
        </ul></p><br/>
        <p><strong><em>SPEAKERS</em></strong>
       
        <p><span dir="LTR"> </span><strong>Professor Kolawole  Falade</strong>
        </ul>
        <span dir="LTR"> </span><br>
        Department of Food  Technology, University of Ibadan, Ibadan.</p>
          <p><span dir="LTR"> </span><strong>Dr.  Olayemi Adegbolagun</strong><br/>
        Department of Pharmaceutical  Chemistry, Faculty of Pharmacy, University of Ibadan,  Ibadan.</p>
        
                  <p><span dir="LTR"> </span><strong>Professor  Funmilola Ajani</strong><br/>
        Department of  Wildlife and Ecotourism Management, Faculty of Renewable Natural  Resources, University of Ibadan,  Ibadan.</p>

<p><span dir="LTR"> </span><strong>Prince Oluwarotimi O. Kolajo</strong><br/>
No. 1, Olufemi Oloyede Crescent, New Bodija, Ibadan.</p><br/>

        <p><strong>EVENTS  SPONSORSHIP/PARTNERNERSHIP</strong><br><br/>
          Several opportunities have been created for  corporate brand promotion and product visibility throughout the week long fair  &amp; exhibition. These include: </p>
        <ul>
          <li><span dir="LTR"> </span>Sponsorship  of the Pre Event Cocktail &amp; Press Conference </li>
          <li><span dir="LTR"> </span>Financial  sponsorship of the 2 days Seminar/Workshop</li>
          <li><span dir="LTR"> </span>Sponsorship  of the Awards ceremony</li>
          <li><span dir="LTR"> </span>Sponsorship  of the opening &amp; closing ceremonies</li>
        </ul>
        <p>OTHERS INCLUDE </p>
        <ul>
          <li><span dir="LTR"> </span>Branding  Rights which is available to organizations wishing to leverage on project&rsquo;s  mega publicity plan.</li>
          <li><span dir="LTR"> </span>Sponsorship  of the Project&rsquo;s commemorative Brochure.</li>
        </ul>
        <p><br>
          <strong>SPONSORSHIP OF EXHIBITION EVENTS</strong>
        <ul>
          <li><span dir="LTR"> </span>Title Sponsorship  which allows the exhibitors to carry brand designations of their choice that  will feature in all publicity, advertisement with regard to the project.</li>
          <li><span dir="LTR"> </span>Partnership which  enables a sponsor to feature prominently in the promotional activities relating  to a particular area of interest with regard to the project.</li>
          <li><span dir="LTR"> </span>Venue Branding Rights  which is available to corporate organizations wishing to leverage on the  publicity &amp; media reach generated by the program but with special  concession to the Title Sponsor.</li>
        </ul></p><br/>
        <p><strong>SPONSORSHIP  OF THE FAIR &amp; EXHIBITION BAR GROUNDS</strong>
        <ul>
          <li><span dir="LTR"> </span>Presentation of a  specially commissioned daily musical show to thrill and entertain the guests.</li>
          <li><span dir="LTR"> </span>Cultural &amp;  dramatic performances to thrill the audience.</li>
          <li><span dir="LTR"> </span>Both events are open  for sponsorship at a reasonable sum.  </li>
        </ul></p><br/>
        <p><strong>REGISTRATION AND PAYMENT PROCEDURE</strong>
        <ul>
          <li><span dir="LTR"> </span>Interested  participants should complete the Registration form and forward to the Project  Secretariat.</li>
          <li><span dir="LTR"> </span>Make  associated payment and obtain an official receipt from the Project secretariat.</li>
          <li><span dir="LTR"> </span>Having  obtained your receipt, please request for your space allocation.</li>
        </ul></p><br/>
        <table width="467" border="0">
          <tr>
            <td colspan="2"><strong>PAYMENT  DETAILS</strong></td>
          </tr>
          <tr>
            <td width="166"><strong>CURRENCY:</strong></td>
            <td width="291"><strong>NAIRA</strong></td>
          </tr>
          <tr>
            <td>ACCOUNT NAME:</td>
            <td>U.I. CONSULTANCY SERVICES UNIT</td>
          </tr>
          <tr>
            <td>ACCOUNT NUMBER:</td>
            <td>0860166022</td>
          </tr>
          <tr>
            <td>BANK NAME:</td>
            <td>FCMB</td>
          </tr>
          <tr>
            <td>SORT CODE: </td>
            <td>214191721</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><strong>DOMICILLIARY  ACCOUNT DETAILS</strong></td>
          </tr>
          <tr>
            <td><strong>CURRENCY:</strong></td>
            <td><strong>DOLLAR</strong></td>
          </tr>
          <tr>
            <td>ACCOUNT NAME: </td>
            <td>U.I. VENTURES LIMITED</td>
          </tr>
          <tr>
            <td>ACCOUNT NUMBER:</td>
            <td>0814122067</td>
          </tr>
          <tr>
            <td>SORT CODE:</td>
            <td>214191721</td>
          </tr>
          <tr>
            <td>BIC/SWIFT CODE:</td>
            <td>BFCMGLAXXX</td>
          </tr>
          <tr>
            <td>IBADAN NUMBER:</td>
            <td>GBO8C1T118500811871706</td>
          </tr>
          <tr>
            <td>ROUTING NUMBER:</td>
            <td>36887918</td>
          </tr>
          <tr>
            <td>BANK ADDRESS: </td>
            <td>PRIMROSE TOWER, 17A, TINUBU ST. LAGOS</td>
          </tr>
          <tr>
            <td>BRANCH ADDRESS:</td>
            <td>30, OYO ROAD, OPPOSITE U.I. POST OFFICE,  IBADAN, OYO STATE</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><strong>CURRENCY:</strong></td>
            <td><strong>EURO</strong></td>
          </tr>
          <tr>
            <td>ACCOUNT NAME:</td>
            <td>U.I. VENTURES CONSULT. SERVICES UNIT</td>
          </tr>
          <tr>
            <td>ACCOUNT NUMBER:</td>
            <td>0860166053</td>
          </tr>
          <tr>
            <td>BANK NAME: </td>
            <td>FIRST CITY MONUMENT BANK</td>
          </tr>
          <tr>
            <td>IBAN: </td>
            <td>GB08C1T118500811871706</td>
          </tr>
          <tr>
            <td>ROUTING:</td>
            <td>36887918</td>
          </tr>
          <tr>
            <td>BIC/SWIFT CODE:</td>
            <td>FCMBNGLAXXX</td>
          </tr>
          <tr>
            <td>SORT CODE:</td>
            <td>214191721</td>
          </tr>
        </table>
        <p>   </p>
        <p><strong>HOTEL  RESERVATION AT U.I. HOTELS    </strong> <br>
          Arrangement has been made to enable  participants get adequate accommodation from the U.I. Hotels. In addition, the  Project Secretariat is on standby to attend to any information pertaining to  the project. <br>
        <a href="https://uihotels.uiventureslimited.com" target="_blank">Click here to book for Hotel Room </a></p>
        <p>P.S.<br>
          <strong>IMPORTANT  INFORMATION TO POTENTIAL SPONSORS </strong><br>
          Please take note that offer is made on a  first come, first served basis and confirmation is only by financial value  fully paid before the commencement of the related event.</p>
        <p>Thank you.</p>
        <p><a href="#">Click to reserve a space now</a></p>
        <p>&nbsp;</p>
        <p></p>
      </div>
      <?php } } ?>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>U.I. Ventures Ltd.</h3>
              <p>
                Conference Centre Building, Chapel Road, <br>
                 University of Ibadan, Ibadan, Nigeria<br><br>
                <strong>Phone:</strong> +234 (0)708 840 0001<br>
                <strong>Email:</strong> info@uiventureslimited.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="management.php">Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">CONSULTANCY SERVICES UNIT</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Divisions</h4>
            <ul>
               <li><i class="bx bx-chevron-right"></i> <a href="https://uihotels.uiventureslimited.com">U.I. HOTELS</a></li>
              <li><i class="bx bx-chevron-right"></i><a href="uibakery.php">U.I. FAST FOOD/BAKERY</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="uipress.php">U.I. PRINTING PRESS</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="uipetrol.php">U.I. PETROL STATION</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="uihealth">U.I. HEALTH, SAFETY AND ENVIRONMENT UNIT</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Social Media</h4>
            <div>
                           <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>U.I. Ventures Limited</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/groovin-free-bootstrap-theme/ -->
        Designed by <a href="http://updateng.com/">Update Nigeria & BrightZity Technologies</a>
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