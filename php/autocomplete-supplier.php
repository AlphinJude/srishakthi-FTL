<?php
    include("config.php");

    $search =$_POST['search'];

    $query = "SELECT *, supplier_id FROM supplier_list WHERE supplier_name like'%".$search."%'";
    $result = mysqli_query($conn,$query);

    while($row = mysqli_fetch_array($result) ){
    $response[] = array("value"=>$row['supplier_id'],"label"=>$row['supplier_name']);
    }
    echo json_encode($response);
    exit;
?>