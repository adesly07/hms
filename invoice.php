<?php
include ('admin/db_connect.php');
if(!isset($_session)){
session_start();
}
if (!isset($_SESSION['booknum']))
header('LOCATION: '.'index.php');
$booknum = $_SESSION['booknum'];
$sql2 ="SELECT * from  tblbooking where BookingNumber = '$booknum'";
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
                          <th width="206" height="25" align="left" class="font-weight-bold">Name</th>
                          <td width="876" height="25"><?php echo $cname; ?></td>
                        </tr>
                        <tr>
                          <th width="206" height="25" align="left" class="font-weight-bold">Room Type</th>
                          <td width="876" height="25"><?php echo $rtype; ?></td>
                        </tr>
                        <tr>
                          <th width="206" height="25" align="left" class="font-weight-bold">Room Number</th>
                          <td width="876" height="25"><?php echo $rno; ?></td>
                        </tr>
                        <tr>
                          <th width="206" height="25" align="left" class="font-weight-bold">Checkin Date</th>
                          <td width="876" height="25"><?php echo $cdate; ?></td>
                        </tr>
                        <tr>
                          <th width="206" height="25" align="left" class="font-weight-bold">Checkout Date</th>
                          <td width="876" height="25"><?php echo $cout; ?></td>
                        </tr>
                        <tr>
                          <th width="206" height="25" align="left" class="font-weight-bold">Total Amount(&#8358;)</th>
                          <td width="876" height="25"><?php echo number_format($amount,2); ?></td>
                        </tr>
                        <tr>
                          <th width="206" height="25" align="left" class="font-weight-bold">&nbsp;</th>
                          <th width="876" height="25" align="left" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th height="25" colspan="2" align="center">STATUS: <?php echo $mystatus; ?></th>
                        </tr>
                        <tr>
                          <th colspan="2" align="left" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="left"><font color="#000">ACCOUNT DETAILS</font></th>
                        </tr>
                        <tr>
                          <th width="206" align="left" class="font-weight-bold"><font color="#993300">Account Name:</font></th>
                          <th width="876" align="left" class="font-weight-bold"><font color="#993300">U.I Ventures Limited-Hotel</font></th>
                        </tr>
                        <tr>
                          <th width="206" align="left" class="font-weight-bold"><font color="#993300">Account Number</font></th>
                          <th width="876" align="left" class="font-weight-bold"><font color="#993300">1011701773</font></th>
                        </tr>
                        <tr>
                          <th align="left" class="font-weight-bold">&nbsp;</th>
                          <th align="left" class="font-weight-bold"><font color="#993300">Zenith Bank</font></th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">PAYMENT VALIDATES RESERVATION</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold"><a href="https://wa.me/+2347084000002?text=Booking%20Number:%20<?php echo $b_no; ?>" target="_blank">Click here to send your proof of payment and your booking number</a></th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold"><a href="index.php">Back</a> |
<input type="submit" name="button" id="button" value="Print Invoice" onclick="print(this.windows)" /></th>
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