<?php
include("config.php");

 $search =$_POST['search'];

 $query = "SELECT * FROM chem_list WHERE chem_name like'%".$search."%'";
 $result = mysqli_query($conn,$query);
 
 while($row = mysqli_fetch_array($result) ){
  $response[] = array("value"=>$row['chem_id'],"label"=>$row['chem_name']);
 }
 echo json_encode($response);
 exit;
?>