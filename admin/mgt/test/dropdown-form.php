<?php

include('database.php');

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>     
<body>

<!--===== dependent dropdown form============-->
<div class="dependent-dropdown">
<form autocomplete="off" action="">
  <div class="input-field">
   <select id="country">
     <option value="">Select Country</option>
    
<?php

        $contryData="SELECT country_id, name from countries";
        $result=mysqli_query($conn,$contryData);
        if(mysqli_num_rows($result)>0)
        {
          while($arr=mysqli_fetch_assoc($result))
          {
          // $country_id = $arr['country_id'];   
?>

         <option value="<?php echo $arr['country_id']; ?>"><?php echo $arr['name']; ?></option>
             
<?php
}} 
?>

   </select>
   
  </div>
  <div class="input-field">
    <select id="state">
    
     <option value="">State</option>
 
   </select>
  </div>
  <div class="input-field">
    <select id="city">
     <option value="">City </option>
   </select>
  </div>
  
</form>
</div>
<!--===== dependent dropdown form============-->

<script src="jquery.min.js"></script>
<script src="ajax-script.js" type="text/javascript"></script>
</body>
</html>