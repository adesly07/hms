<?php
include ('../../admin/db_connect.php');
if(!isset($_session)){
session_start();
}
if (!isset($_SESSION['username']) || !isset($_SESSION['password']))
header('LOCATION: '.'../index.php');
$username = $_SESSION['username'];
$password = $_SESSION['password'];
 $sql = "SELECT * FROM create_login WHERE username = '$username' and password = '$password'";
  $query = mysqli_query($db, $sql);
if (mysqli_num_rows($query) > 0) {
 while ($rows = mysqli_fetch_assoc($query)) {
$name = $rows['name'];	
$pwd1 = $rows ['password'];
$user1 = $rows ['username'];	
}
}
$msg = "";
if(isset($_POST['Submit']))
{  // text1
$user = $_POST['username'];
$pwd = $_POST['password'];
$confirm = $_POST['confirm'];
if ($pwd != $confirm) {
$msg = "Password and confirm password not match. Try Again.";	
	
} else {
$sql2 = ("update create_login set password = '$pwd' where username = '$user'");
$query = mysqli_query($db, $sql2);
if ($query) {
//$msg = "Account Successfully Updated";
header ('location:logout.php?link=index');
}
}
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

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
<script language="JavaScript">

/*
Dynamic Calendar II (By Jason Moon at http://www.jasonmoon.net)
Permission granted to Dynamicdrive.com to include script in archive
For this and 100's more DHTML scripts, visit http://dynamicdrive.com
*/

var ns6=document.getElementById&&!document.all
var ie4=document.all

var Selected_Month;
var Selected_Year;
var Current_Date = new Date();
var Current_Month = Current_Date.getMonth();

var Days_in_Month = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
var Month_Label = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

var Current_Year = Current_Date.getYear();
if (Current_Year < 1000)
Current_Year+=1900


var Today = Current_Date.getDate();

function Header(Year, Month) {

   if (Month == 1) {
   Days_in_Month[1] = ((Year % 400 == 0) || ((Year % 4 == 0) && (Year % 100 !=0))) ? 29 : 28;
   }
   var Header_String = Month_Label[Month] + ' ' + Year;
   return Header_String;
}



function Make_Calendar(Year, Month) {
   var First_Date = new Date(Year, Month, 1);
   var Heading = Header(Year, Month);
   var First_Day = First_Date.getDay() + 1;
   if (((Days_in_Month[Month] == 31) && (First_Day >= 6)) ||
       ((Days_in_Month[Month] == 30) && (First_Day == 7))) {
      var Rows = 6;
   }
   else if ((Days_in_Month[Month] == 28) && (First_Day == 1)) {
      var Rows = 4;
   }
   else {
      var Rows = 5;
   }

   var HTML_String = '<table><tr><td valign="top"><table BORDER=2 CELLSPACING=1 cellpadding=2 FRAME="box" BGCOLOR="C0C0C0" BORDERCOLORLIGHT="808080">';

   HTML_String += '<tr><th colspan=7 BGCOLOR="FFFFFF" BORDERCOLOR="000000">' + Heading + '</font></th></tr>';

   HTML_String += '<tr><th ALIGN="CENTER" BGCOLOR="FFFFFF" BORDERCOLOR="000000">Sun</th><th ALIGN="CENTER" BGCOLOR="FFFFFF" BORDERCOLOR="000000">Mon</th><th ALIGN="CENTER" BGCOLOR="FFFFFF" BORDERCOLOR="000000">Tue</th><th ALIGN="CENTER" BGCOLOR="FFFFFF" BORDERCOLOR="000000">Wed</th>';

   HTML_String += '<th ALIGN="CENTER" BGCOLOR="FFFFFF" BORDERCOLOR="000000">Thu</th><th ALIGN="CENTER" BGCOLOR="FFFFFF" BORDERCOLOR="000000">Fri</th><th ALIGN="CENTER" BGCOLOR="FFFFFF" BORDERCOLOR="000000">Sat</th></tr>';

   var Day_Counter = 1;
   var Loop_Counter = 1;
   for (var j = 1; j <= Rows; j++) {
      HTML_String += '<tr ALIGN="left" VALIGN="top">';
      for (var i = 1; i < 8; i++) {
         if ((Loop_Counter >= First_Day) && (Day_Counter <= Days_in_Month[Month])) {
            if ((Day_Counter == Today) && (Year == Current_Year) && (Month == Current_Month)) {
               HTML_String += '<td BGCOLOR="FFFFFF" BORDERCOLOR="000000"><strong><font color="red">' + Day_Counter + '</font></strong></td>';
            }
            else {
               HTML_String += '<td BGCOLOR="FFFFFF" BORDERCOLOR="000000">' + Day_Counter + '</td>';
            }
            Day_Counter++;    
         }
         else {
            HTML_String += '<td BORDERCOLOR="C0C0C0"> </td>';
         }
         Loop_Counter++;
      }
      HTML_String += '</tr>';
   }
   HTML_String += '</table></td></tr></table>';
   cross_el=ns6? document.getElementById("Calendar") : document.all.Calendar
   cross_el.innerHTML = HTML_String;
}


function Check_Nums() {
   if ((event.keyCode < 48) || (event.keyCode > 57)) {
      return false;
   }
}



function On_Year() {
   var Year = document.when.year.value;
   if (Year.length == 4) {
      Selected_Month = document.when.month.selectedIndex;
      Selected_Year = Year;
      Make_Calendar(Selected_Year, Selected_Month);
   }
}

function On_Month() {
   var Year = document.when.year.value;
   if (Year.length == 4) {
      Selected_Month = document.when.month.selectedIndex;
      Selected_Year = Year;
      Make_Calendar(Selected_Year, Selected_Month);
   }
   else {
      alert('Please enter a valid year.');
      document.when.year.focus();
   }
}


function Defaults() {
   if (!ie4&&!ns6)
   return
   var Mid_Screen = Math.round(document.body.clientWidth / 2);
   document.when.month.selectedIndex = Current_Month;
   document.when.year.value = Current_Year;
   Selected_Month = Current_Month;
   Selected_Year = Current_Year;
   Make_Calendar(Current_Year, Current_Month);
}


function Skip(Direction) {
   if (Direction == '+') {
      if (Selected_Month == 11) {
         Selected_Month = 0;
         Selected_Year++;
      }
      else {
         Selected_Month++;
      }
   }
   else {
      if (Selected_Month == 0) {
         Selected_Month = 11;
         Selected_Year--;
      }
      else {
         Selected_Month--;
      }
   }
   Make_Calendar(Selected_Year, Selected_Month);
   document.when.month.selectedIndex = Selected_Month;
   document.when.year.value = Selected_Year;
}

</script>

    </head>

    <body onLoad="Defaults()">

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="logo span4">
                        <h1><a href="">OneTouch <span class="red">POS</span></a></h1>
                   <span class="error"> Welcome</span> <?php echo $name; ?></div>
                    <div align="right">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
      <tr>
        <td width="16%" align="center" bgcolor="#EFEFEF">&nbsp;</td>
        <td width="84%" align="right"><span class="si_filters_links"> <a href="d_sales.php" class="first selected">Sales</a> <a href="register.php" class="">Users</a><a href="logout.php?link=index" class="">Log Out</a></span></td>
      </tr>
    </table>
                    </div>
                </div>
            </div>
        </div>
              <div >

              </div>

        <div class="register-container container">
            <div class="row">
              <div class="register span6">
<form action="index.php" method="post">
                        <h2>Change <span class="red"><strong>Password</strong></span></h2>
                <p><span class="error"><?php echo $msg; ?></span>
          <label for="username">Username</label>
                          <input name="username" type="text" id="username" value="<?php echo $user1; ?>" readonly="readonly" placeholder="Enter your username...">
                          <label for="c_password">Password</label>
                          <input name="password" type="password" id="password" value="<?php echo $pwd1; ?>">
                          <label for="c_password">Confirm Password</label>
                          <input name="confirm" type="password" id="confirm">
        </p>
                <p>
                  <input name="Submit" class="btn-success" type="submit" id="Submit" value="OK">
                </p>
  </form>
              </div>
              
  <div><table width="400" border="0">
  <tr>
    <td width="287"><div id=NavBar style="position:relative;width:286px;top:5px;" align="left">
<form name="when"><table cellpadding="0" cellspacing="0">
<tr>
   <td valign="top"><input type="button" value="<=" onClick="Skip('-')"></td>
   <td> </td>
   <td><select name="month" onChange="On_Month()">

<script language="JavaScript1.2">
if (ie4||ns6){
   for (j=0;j<Month_Label.length;j++) {
      document.writeln('<option value=' + j + '>' + Month_Label[j]);
   }
}
</script>

       </select>
   </td>
   <td><input type="text" name="year" size=3 maxlength=4 onKeyPress="return Check_Nums()" onKeyUp="On_Year()"></td>
   <td> </td>
   <td valign="top"><input type="button" value="=>" onClick="Skip('+')"></td>
</tr></table></form></div>
<div id=Calendar style="position:relative;width:238px;top:-2px;" align="left"></div></td>
    <td width="103"><iframe src="clock.php" name="I1" width="150" marginwidth="1" height="100" marginheight="0" scrolling="No" frameborder="0"  id="I1" border="0"> Your browser does not support inline frames or is currently configured not to display inline frames. </iframe></td>
  </tr>
</table></div>            
          </div>
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>

