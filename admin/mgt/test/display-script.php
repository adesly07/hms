<?php
include("database.php");

/// edit data
if(isset($_POST['courseId'])){
    $courseId= $_POST['courseId'];
   
   $fetchData =fetchDataById($courseId);
   displayData($fetchData );

}

function fetchDataById($courseId){
    
    global $conn;
  $query ="SELECT fullName, emailAddress FROM students WHERE courseId='$courseId'";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $students= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }else{
     $students="";//[]
    }
    return $students;
}
function displayData($fetchData){
 echo '<table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <th>S.N</th>
            <th>Full Name</th>
            <th>Email Address</th>
           
        </tr>';
 if(count($fetchData)>0){
      $sn=1;
      foreach($fetchData as $data){ 
  echo "<tr>
          <td>".$sn."</td>
          <td>".$data['fullName']."</td>
          <td>".$data['emailAddress']."</td>
         
   </tr>";
       
  $sn++; 
     }
}else{
     
  echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";
}
?>