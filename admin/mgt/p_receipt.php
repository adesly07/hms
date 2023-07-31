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
$id = $_SESSION['sn'];
$sql2 ="SELECT * from  tblbooking where ID = '$id'";
$query2 = mysqli_query($db, $sql2);
while($rows = mysqli_fetch_assoc($query2)){
$id = $rows['ID'];
$rtype = $rows['RoomType'];
$rno = $rows['RoomNumber'];
$b_no = $rows['BookingNumber'];
$cname = $rows['CName'];
$cdate = $rows['CheckinDate'];
$cout = $rows['CheckoutDate'];
$price = $rows['Price'];
$email = $rows['CEmail'];
$cnumber = $rows['CNumber'];
$address = $rows['Address'];
$gender = $rows['Gender'];
$idtype = $rows['IDType'];
$idnumber = $rows['IDNumber'];
$amount = $rows['Amount'];
$amt_paid = $rows['AmtPaid'];
$mystatus = $rows['Status'];
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
 </head>
  <body>
    <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table">
                      <thead>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">UI HOTELS</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">Conference Centre Building, Chapel Road, University of Ibadan.</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">+2347088400002, 07084000002</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">Booking Number: <?php echo $b_no; ?></th>
                        </tr>
                        <tr>
                          <th width="29%" height="25" align="left" class="font-weight-bold">Name</th>
                          <td width="71%" height="25"><?php echo $cname; ?></td>
                        </tr>
                        <tr>
                          <th height="25" align="left" class="font-weight-bold">Room Type</th>
                          <td height="25"><?php echo $rtype; ?></td>
                        </tr>
                        <tr>
                          <th height="25" align="left" class="font-weight-bold">Room Number</th>
                          <td height="25"><?php echo $rno; ?></td>
                        </tr>
                        <tr>
                          <th height="25" align="left" class="font-weight-bold">Checkin Date</th>
                          <td height="25"><?php echo $cdate; ?></td>
                        </tr>
                        <tr>
                          <th height="25" align="left" class="font-weight-bold">Checkout Date</th>
                          <td height="25"><?php echo $cout; ?></td>
                        </tr>
                        <tr>
                          <th height="25" align="left" class="font-weight-bold">Total Amount(&#8358;)</th>
                          <td height="25"><?php echo number_format($amount,2); ?></td>
                        </tr>
                        <tr>
                          <th height="25" align="left" class="font-weight-bold">Amount Paid(&#8358;)</th>
                          <th height="25" align="left" class="font-weight-bold"><?php echo number_format($amt_paid,2); ?></th>
                        </tr>
                        <tr>
                          <th height="25" colspan="2" align="center">STATUS: <?php echo $mystatus; ?></th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold"><a href="a_booking.php">Back</a> |
<input type="submit" name="button" id="button" value="Print Receipt" onclick="print(this.windows)" /></th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                    <div class="table-responsive border rounded p-1"></div>
                    
                </div>
              </div>
            </div>
          </div>
  </body>
</html>