<?php
include ('../uconx.php');

session_start();
if(!isset($_SESSION['username']) && (!isset($_SESSION['password'])))
 {
	header('location:index.php');
}
$username = $_SESSION['username'];


$message = "Products Description Already exist";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Success</title>
<style type="text/css">
<style type="text/css">
body {
	background-color: #F1F0EE;
}body {
	background-color: #F1F0EE;
}
</style>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
	<script language="javascript" type="text/javascript" src="jscripts/general.js"></script>
	<script language="javascript" type="text/javascript" src="include/plain.js"></script>
 </head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40" align="center"><a href="products.php" title="Back"><img src="assets/img/error.png" width="100" height="47" border="0" /></a></td>
  </tr>
  <tr>
    <td width="464" align="center" valign="top"><table width="1000" border="0" cellspacing="0">
      <tr>
        <td valign="top" bgcolor="#F7C7A5"><table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="">
            <tr>
              <td height="32" align="center" bgcolor="#FFFFFF" class="date"><? echo $message; ?></td>
              </tr>
            <tr>
              <td align="left" valign="top" bgcolor="#F0F0F0"><a href="products.php" title="Back"><img src="assets/img/back.png" width="100" height="47" border="0" /></a></td>
            </tr>
            </table>
        </td>
        </tr>
    </table></td>
  </tr>
</table>


</body>
</html>



