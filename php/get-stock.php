<?php
    include("config.php");

    $search = $_POST['search'];

    $query = "select * from chem_stock where chem_id = $search";
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($result) ){
        $response= $row['rem_qty'];
    }
    //echo $response;
    // encoding array to json format
    echo json_encode($response);
    exit;
?>