<?php

include('../db_connect.php');
// Fetching state data
$r_type=!empty($_POST['RoomType'])?$_POST['RoomType']:'';
if(!empty($r_type))
  {
   $contryData="SELECT ID, RoomNumber from tblroom where RoomType = '$r_type' and Status = 0 and Display = 'ON'";
        $result=mysqli_query($db,$contryData);
        if(mysqli_num_rows($result)>0)
        {
			 echo "<option value=''>Select Room Number</option>";
          
          
 
     while($arr=mysqli_fetch_assoc($result))
     {
        echo "<option value='".$arr['RoomNumber']."'>".$arr['RoomNumber']."</option><br>";
        
      }
   }  
   // echo json_encode();
 }
		

if (isset($_POST['RoomType'])) {
    $r_type = $_POST['RoomType'];

    $sql = "SELECT * FROM tblroom NATURAL JOIN tblcategory WHERE RoomType = '$r_type'";
    $result = mysqli_query($db, $sql);
    if ($result) {
        $room = mysqli_fetch_assoc($result);
        echo $room['Price'];
    } else {
        echo "0";
    }
}?>