<?php
include ('umgt/includes/dbconnection.php');
if(!isset($_session)){
session_start();
}
if (!isset($_SESSION['e_id']))
header('LOCATION: '.'index.php');
$e_id = $_SESSION['e_id'];
$sql2 ="SELECT * from  exhibition where e_id = '$e_id'";
$query2 = mysqli_query($db, $sql2);
while($rows = mysqli_fetch_assoc($query2)){
$id = $rows['id'];
$space = $rows['space'];
$price = $rows['price'];
$name = $rows['name'];
$email = $rows['email'];
$phone = $rows['phone'];
$address = $rows['address'];
$mystatus = $rows['status'];
}

  

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UI Consultancy Services Unit</title>
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
                          <th colspan="2" align="center" class="font-weight-bold">UI CONSULTANCY SERVICES UNIT</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">Conference Centre Building, Chapel Road, University of Ibadan.</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">BAABA:  +2348158295800, HELEN: +2348146061791, 708840003, OLAOLUWA: +14372395843</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">Exhibition Space Reservation Number: <?php echo $e_id; ?></th>
                        </tr>
                        <tr>
                          <th width="150" height="25" align="left" class="font-weight-bold">Name</th>
                          <td width="369" height="25"><?php echo $name; ?></td>
                        </tr>
                        <tr>
                          <th width="150" height="25" align="left" class="font-weight-bold">Space</th>
                          <td width="369" height="25"><?php echo $space; ?></td>
                        </tr>
                        <tr>
                          <th width="150" height="25" align="left" class="font-weight-bold">Email</th>
                          <td width="369" height="25"><?php echo $email; ?></td>
                        </tr>
                        <tr>
                          <th width="150" height="25" align="left" class="font-weight-bold">Phone Number</th>
                          <td width="369" height="25"><?php echo $phone; ?></td>
                        </tr>
                        <tr>
                          <th width="150" height="25" align="left" class="font-weight-bold">Address</th>
                          <td width="369" height="25"><?php echo $address; ?></td>
                        </tr>
                        <tr>
                          <th width="150" height="25" align="left" class="font-weight-bold">Total Amount</th>
                          <td width="369" height="25"><?php echo $price; ?></td>
                        </tr>
                        <tr>
                          <th width="150" height="25" align="left" class="font-weight-bold">&nbsp;</th>
                          <th width="369" height="25" align="left" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th height="25" colspan="2" align="center">STATUS: <font color="#FF0000"><?php echo $mystatus; ?></font></th>
                        </tr>
                        <tr>
                          <th colspan="2" align="left" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="left" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="left" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="left" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center"><font color="#000">ACCOUNT DETAILS</font></th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tbody>
                              <tr>
                                <td width="197"><strong>CURRENCY:</strong></td>
                                <td width="322"><strong>NAIRA</strong></td>
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
                            </tbody>
                          </table></th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" valign="top" ><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tbody>
                              <tr>
                                <td colspan="2"><strong>DOMICILLIARY ACCOUNT DETAILS</strong></td>
                              </tr>
                              <tr>
                                <td width="38%"><strong>CURRENCY:</strong></td>
                                <td width="62%"><strong>DOLLAR</strong></td>
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
                                <td>30, OYO ROAD, OPPOSITE U.I. POST OFFICE, IBADAN, OYO STATE</td>
                              </tr>
                            </tbody>
                          </table></th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tbody>
                              <tr>
                                <td width="38%"><strong>CURRENCY:</strong></td>
                                <td width="62%"><strong>EURO</strong></td>
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
                            </tbody>
                          </table></th>
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
                          <th colspan="2" align="center" class="font-weight-bold"><font color="#FF0000">Send your proof of payment and your exhibition space number through WhatsApp to  any of numbers above.</font> </th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="center" class="font-weight-bold"><a href="exhibition_reserve.php">Back</a> |
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