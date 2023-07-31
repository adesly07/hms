<?php

include('database.php');
// Fetching state data
$country_id=!empty($_POST['country_id'])?$_POST['country_id']:'';
if(!empty($country_id))
  {
   $contryData="SELECT id, name from states where country_id = '$country_id'";
        $result=mysqli_query($conn,$contryData);
        if(mysqli_num_rows($result)>0)
        {
			 echo "<option value=''>Select State</option>";
          
          {
 
     while($arr=mysqli_fetch_assoc($result))
     {
        echo "<option value='".$arr['id']."'>".$arr['name']."</option><br>";
        
      }
   }  
   // echo json_encode();
 }
		}

   // Fetching city data
$state_id=!empty($_POST['state_id'])?$_POST['state_id']:'';
if(!empty($state_id))
  {
  $query="SELECT id, name from cities WHERE state_id= $state_id";
 $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0)

 
  {
     echo "<option value=''>Select City</option>";
    while($arr=mysqli_fetch_assoc($result))
     {
            echo "<option value='".$arr['id']."'>".$arr['name']."</option><br>";
        
     }
  }  
      //echo json_encode();

}
?>