<?php
include("config.php");
    $search =$_POST['search'];

    $query = "SELECT CONCAT(client_name, ' - ', client_contact) as name, client_id FROM client_list WHERE client_name like '%".$search."%'";
    $result = mysqli_query($conn,$query);

    while($row = mysqli_fetch_array($result) ){
        $response[] = array("value"=>$row['client_id'],"label"=>$row['name']);
    }
    echo json_encode($response);
    exit;
?>