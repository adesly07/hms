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
$sql2 ="SELECT * from  tblbooking where ID = '$sn'";
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
$n_days = $rows['NDays'];
$discount = $rows['Discount'];
$balance = intval($amount-$amt_paid);
$mystatus = $rows['Status'];
if($discount == ""){
$dis = "0";	
} else {
$dis = $discount;	
}
}
}
 

if(isset($_POST['Submit']))
  {
 $id = $_POST['sn'];
 $amt = $_POST['amt'];
 $myrno = $_POST['rno'];
$cdate = date('Y-m-d');
$cmonth = date('M');
$cyear= date('Y');
$sql1 = "Update tblbooking set AmtPaid ='$amt', Status = 'Checkedin', Cdate = '$cdate', Cmonth = '$cmonth', Cyear = '$cyear' where ID = '$id'"; 
$query1 = mysqli_query($db,$sql1);
if($query1){
header('location:a_booking.php');	
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
 </head>
  <body>
    <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Room Check In</h4>
                     
                    </div>
                    <div class="table-responsive border rounded p-1">
                     <form name="form1" method="post" action="checkin.php">
                         <table class="table">
                        <thead>
                          <tr>
                            <th colspan="2" align="center" class="font-weight-bold">Booking Number: <?php echo $b_no; ?></th>
                          </tr>
                          <tr>
                            <th align="left" class="font-weight-bold">Name</th>
                            <td><?php echo $cname; ?></td>
                          </tr>
                        
                        <tr>
                        <th align="left" class="font-weight-bold">Room Type</th>
                            <td><?php echo $rtype; ?></td>
                          </tr>
                          <tr>
                          <th align="left" class="font-weight-bold">Room Number</th>
                            <td><?php echo $rno; ?></td>
                          </tr>
                        <tr>
                        <th align="left" class="font-weight-bold">Checkin Date</th>
                            <td><?php echo $cdate; ?></td>
                          </tr>
                        <tr>
                        <th align="left" class="font-weight-bold">Checkout Date</th>
                            <td><?php echo $cout; ?></td>
                          </tr>
                        <tr>
                        <th align="left" class="font-weight-bold">Number of Day(s)</th>
                            <td><?php echo $n_days; ?></td>
                          </tr>
                        <tr>
                          <th align="left" class="font-weight-bold">Discount</th>
                          <td><?php echo $dis; ?>%</td>
                        </tr>
                        <tr>
                        <th align="left" class="font-weight-bold">Total Amount(&#8358;)</th>
                            <td><?php echo number_format($amount,2); ?></td>
                          </tr>
                           <tr>
                             <th colspan="2" align="left" class="font-weight-bold"> Payment</th>
                           </tr>
                           <tr>
                        <th colspan="2" align="left" class="font-weight-bold"><input type="text" name="amt" id="amt" class="form-control" Placeholder = "Enter Amount"></th>
                          </tr>
                           <tr>
                             <th colspan="2" align="right" class="font-weight-bold"><input name="sn" type="hidden" id="sn" value="<?php echo $sn; ?>">
                             <input name="rno" type="hidden" id="rno" value="<?php echo $rno; ?>">                               <input type="Submit" name="Submit" value="Pay & Check In"></th>
                          </tr>
                          
                        </thead>
                         
                        <tbody>
                        </tbody>
                      </table>
                      </form>
                     
                    </div>
                    
                </div>
              </div>
            </div>
          </div>
  </body>
</html>