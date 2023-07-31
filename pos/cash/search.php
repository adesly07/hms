<?php
//dbase connection=======================================
include('conx.php');
//========================================================è
if(!isset($_session)){
session_start();
}

if (!isset($_SESSION['username']) || !isset($_SESSION['password']))
header('LOCATION: '.'../index.php');

$username = $_SESSION['username'];
$password = $_SESSION['password'];

$search = $_SESSION['search'];

$sql = mysql_query ("select * from reg where admin_no = '$search'");
while ($row = mysql_fetch_array ($sql)) {
$surname = $row ['surname'];
$firstname = $row ['firstname'];
$lastname = $row ['lastname'];

}


$sql = mysql_query ("select * from reg where admin_no = '$search'");
while ($row = mysql_fetch_array ($sql)) {
$surname = $row ['surname'];
$firstname = $row ['firstname'];
$lastname = $row ['lastname'];
}
?>

<html>
<head>

<title>Search Result</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	margin-top: 0px;
	margin-left: 0px;
	margin-right: 0px;
}
-->
</style>
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
<link href="css/mystyle.css" rel="stylesheet" type="text/css">

<link href="css/style.css" rel="stylesheet" type="text/css">
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><?php
include("header.php");
?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#F1E2A9"><table width="300" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="50">&nbsp;</td>
        <td width="107" align="right"><a href="control_panel.php"><img src="images/arrow_back.png" width="50" height="30" title="Back"></a></td>
        <td width="143" align="right">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><span class="name"><? echo $surname; ?> <? echo $firstname; ?> <? echo $lastname; ?></span></td>
    <td align="center" class="name">Admission No: <? echo $search; ?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#F1E2A9"><table width="100%" border="0" align="center">
      <tr bgcolor="#F1E2A9" class="footer">
        <td width="8%" align="center" bgcolor="#FFFFFF" class="headtext13">Class</td>
        <td width="11%" align="center" bgcolor="#FFFFFF" class="headtext13">Subject</td>
        <td width="7%" align="center" bgcolor="#FFFFFF" class="headtext13">Term</td>
        <td width="9%" align="center" bgcolor="#FFFFFF" class="headtext13">Session</td>
        <td width="10%" align="center" bgcolor="#FFFFFF" class="headtext13"><strong>CA Score</strong></td>
        <td width="10%" align="center" bgcolor="#FFFFFF" class="headtext13">Exam Score</td>
        <td width="7%" align="center" bgcolor="#FFFFFF" class="headtext13">Total</td>
        <td width="11%" align="center" bgcolor="#FFFFFF" class="headtext13">Grade</td>
        <td width="11%" align="center" bgcolor="#FFFFFF" class="headtext13">Remark</td>
      </tr>
      <?
	  $sql4 = mysql_query ("select * from report where admin_no = '$search'");
	  	  while ($row = mysql_fetch_array($sql4)) {
		  $mysn = $row ['report_id'];
		$myadmin = $row['admin_no'];
		$myclass = $row ['class'];
		$mysubject = $row ['subject'];
		$mysession = $row ['sch_session'];
		$myterm = $row ['term'];
		$myca = $row ['ca'];
		$myexam = $row ['exam'];
		$mytotal = $row ['total'];
		$mygrade = $row ['grade'];
		$myremark = $row ['remark'];
		
	
	
	  ?>
      <tr>
        <td align="center" valign="top" bgcolor="#FFFFFF" class="content"><? echo $myclass; ?></td>
        <td align="center" valign="top" bgcolor="#FFFFFF" class="content"><? echo $mysubject; ?></td>
        <td align="center" valign="top" bgcolor="#FFFFFF" class="content"><? echo $myterm; ?></td>
        <td align="center" valign="top" bgcolor="#FFFFFF" class="content"><? echo $mysession; ?></td>
        <td align="center" valign="top" bgcolor="#FFFFFF" class="content"><? echo $myca; ?></td>
        <td align="center" valign="top" bgcolor="#FFFFFF"><span class="content"><? echo $myexam; ?></span></td>
        <td align="center" valign="top" bgcolor="#FFFFFF"><span class="content"><? echo $mytotal; ?></span></td>
        <td align="center" valign="top" bgcolor="#FFFFFF"><span class="content"><? echo $mygrade; ?></span></td>
        <td align="center" valign="top" bgcolor="#FFFFFF"><span class="content"><? echo $myremark; ?></span></td>
      </tr>
      <? } ?>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#F1E2A9"><?
                if (!mysql_num_rows($sql4)){
				echo "No record found! Incorrect Admission No!";
				} 
				?></td>
  </tr>
</table>
</body>
</head>
</html>
