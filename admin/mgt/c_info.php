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
$balance = intval($amount-$amt_paid);
$mystatus = $rows['Status'];
$address = stripslashes($address);
$idtype = stripslashes($idtype);
}
}
if(isset($_POST['Submit']))
  {
 $id = $_POST['sn'];
 $status = $_POST['status'];
 $myrno = $_POST['rno'];
 $amt = $_POST['amt'];
 $discount = $_POST['discount'];
 if($status == "Booked"){
	 if($discount == ""){
$sql1 = "Update tblbooking set Discount = '$discount', Status = '$status', Remark = 'Approved' where ID = '$id'"; 
$query1 = mysqli_query($db,$sql1);
if($query1){
header('location:a_booking.php');	
}		 
	 } else {
$disc = ($discount/100)*$amt;
$u_amt = ($amt - $disc);
$sql1 = "Update tblbooking set Discount = '$discount', Amount = '$u_amt', Status = '$status', Remark = 'Approved' where ID = '$id'"; 
$query1 = mysqli_query($db,$sql1);
if($query1){
header('location:a_booking.php');	
}		 
	 }

 }else {
$sql3 = "Update tblbooking set Status = '$status', Remark = 'Disapproved' where ID = '$id'"; 
$query3 = mysqli_query($db,$sql3);
if($query3)
$sql4 = "Update tblroom set Status = '0' where RoomNumber = '$myrno'";
$query4 = mysqli_query($db,$sql4);
if($query4){
header('location:a_booking.php');		
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
 </head>
  <body>
    <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Customer Information</h4>
                    
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th colspan="2" align="right" class="font-weight-bold"><form name="form1" method="post" action="c_info.php">
                              <p>
                                <select name="status" id="status" class="form-control">
                                  <option selected>Select Status</option>
                                  <option value="Booked">Booked</option>
                                  <option value="Cancelled">Cancelled</option>
                                </select>
                                <input name="sn" type="hidden" id="sn" value="<?php echo $sn; ?>">
                                <input name="amt" type="hidden" id="amt" value="<?php echo $amount; ?>">
                                <input name="rno" type="hidden" id="rno" value="<?php echo $rno; ?>">
                              </p>
                              <p>Discount:
                                <select name="discount" id="discount" class="form-control">
                                <option value="" selected>Not Applicable</option>
                                  <option value="2">2</option>
                                  <option value="5">5</option>
                                  <option value="10">10</option>
                                  <option value="20">20</option>
                                  <option value="25">25</option>
                              </select></p>
                              <p>
                                <input type="Submit" name="Submit" value="OK">
                              </p>
                            </form></th>
                          </tr>
                          <tr>
                            <th colspan="2" align="center" class="font-weight-bold">&nbsp;</th>
                          </tr>
                          <tr>
                            <th colspan="2" align="center" class="font-weight-bold">Booking Number: <?php echo $b_no; ?></th>
                          </tr>
                          <tr>
                            <th align="left" class="font-weight-bold">Name</th>
                            <td><?php echo $cname; ?></td>
                          </tr>
                           <tr>
                            <th align="left" class="font-weight-bold">Phone Number</th>
                            <td><?php echo $cnumber; ?></td>
                          </tr>
                           <tr>
                            <th align="left" class="font-weight-bold">Email</th>
                            <td><?php echo $email; ?></td>
                          </tr>
                        <th align="left" class="font-weight-bold">Gender</th>
                            <td><?php echo $gender; ?></td>
                          </tr>
                           <tr>
                            <th align="left" class="font-weight-bold">ID Card</th>
                            <td><?php echo $idtype; ?></td>
                          </tr>
                           <tr>
                            <th align="left" class="font-weight-bold">ID Number</th>
                            <td><?php echo $idnumber; ?></td>
                          </tr>
                           <tr>
                            <th align="left" class="font-weight-bold">Address</th>
                            <td><?php echo $address; ?></td>
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
                      <th align="left" class="font-weight-bold">Total Amount(&#8358;)</th>
                            <td><?php echo number_format($amount,2); ?></td>
                          </tr>
                          <tr>
                          <th align="left" class="font-weight-bold">Amount Paid(&#8358;)</th>
                            <td><?php echo number_format($amt_paid,2); ?></td>
                          </tr>
                           <tr>
                          <th align="left" class="font-weight-bold">Balance(&#8358;)</th>
                            <td><?php echo number_format($balance,2); ?></td>
                          </tr>
                          
                        </thead>
                         
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                    
                </div>
              </div>
            </div>
          </div>
  </body>
</html>