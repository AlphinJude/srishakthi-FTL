<?php
include("config.php");


 $search =$_POST['search'];

 $query = "SELECT *,test_id FROM tests WHERE test_name like'%".$search."%'";
 $result = mysqli_query($conn,$query);
 
 while($row = mysqli_fetch_array($result) ){
  $response[] = array("value"=>$row['test_id'],"label"=>$row['test_name']);
 }
 echo json_encode($response);
 exit;
?>