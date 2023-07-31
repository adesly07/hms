<?php
include ('admin/db_connect.php');
  

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
                          <th colspan="2" align="center" class="font-weight-bold">Booking Number: </th>
                        </tr>
                        <tr>
                          <th width="206" height="25" align="left" class="font-weight-bold">&nbsp;</th>
                          <th width="876" height="25" align="left" class="font-weight-bold"><form name="form1" method="post" action="s_bnumber.php">
                            <input type="text" id="bno" name="bno"  placeholder = "Search Book Number" class="auto" autofocus="autofocus">
                            <button type="submit" id="Submit" name="Submit">Search</button>
                          </form></th>
                        </tr>
                        <tr>
                          <th height="25" colspan="2" align="center">STATUS: </th>
                        </tr>
                        <tr>
                          <th colspan="2" align="left" class="font-weight-bold">&nbsp;</th>
                        </tr>
                        <tr>
                          <th colspan="2" align="left"><font color="#993300">ACCOUNT DETAILS</font></th>
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
<script type="text/javascript" src="admin/mgt/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="admin/mgt/jquery-ui.min.js"></script>	
<link rel="stylesheet" href="admin/mgt/jquery-ui.min.css" type="text/css" />
    <script type="text/javascript">
$(function() {
	
	//autocomplete
	$(".auto").autocomplete({
		source: "search2.php",
		minLength: 1
	});				

});
</script>

  </body>
</html>