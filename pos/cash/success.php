<?php
include ('../uconx.php');

session_start();
if(!isset($_SESSION['username']) && (!isset($_SESSION['password'])))
 {
	header('location:index.php');
}
$username = $_SESSION['username'];


$message = "Products Description has been Successfully Added";

$sn = $_REQUEST['id'];
$sql2=mysql_query("delete from description where id ='$sn'");

if(!$sql2){
	 die (mysql_error());
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

        <meta charset="utf-8">
        <title>OneTouch POS System</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(assets/img/pattern.jpg);
}
</style>
<link href="style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
	<script language="javascript" type="text/javascript" src="jscripts/general.js"></script>
	<script language="javascript" type="text/javascript" src="include/plain.js"></script>
     <script language="JavaScript">
	function check_deletion()
	{
		if (confirm("Are you sure you want to delete this record?"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>

 </head>

<body>
<div class=""> <h1><span class="head">OneTouch</span> <span class"red">POS</span></h1></div>
<span class="wel">Welcome: <?php echo $name; ?></span><br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="464" align="center" valign="top"><table width="1000" border="0" cellspacing="0">
      <tr>
        <td valign="top" bgcolor="#F7C7A5"><table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="">
            <tr>
              <td height="32" align="center" bgcolor="#FFFFFF" class="date"><? echo $message; ?></td>
              </tr>
            <tr>
              <td align="center" valign="top" bgcolor="#F0F0F0"><a href="products.php" title="Back"><img src="assets/img/back.png" width="100" height="47" border="0" /></a></td>
            </tr>
            </table>
        </td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#336600"><table width="70%" border="0" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <td width="47%" bgcolor="#FFFFFF">Product Description</td>
        <td width="34%" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <?
	  
	  $sql1 = mysql_query("select * from description order by id desc");
	  while ($row = mysql_fetch_array($sql1)) {
		$mysn = $row ['id'];
		$mydescription = $row['description'];
	
	  ?>
      <tr>
        <td bgcolor="#FFFFFF"><a href="edit_success.php?id= <? echo $mysn; ?>" title="<? echo $mydescription; ?>"><? echo $mydescription; ?></a></td>
        <td align="center" bgcolor="#FFFFFF"><a href="success.php?id=<? echo $mysn ?>" onClick="return check_deletion()"><img src="assets/img/delete.png" width="16" height="16" /></a></td>
      </tr>
      <? } ?>
    </table></td>
  </tr>
</table>
</body>
</html>



