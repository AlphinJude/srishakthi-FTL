<?php
    include("config.php");

    $itemCount = count($_POST["client_name"]);
    $itemValues=0;
    $query = "INSERT INTO client_list (client_name, client_address, client_gst, client_contact) VALUES ";

    for($i=0;$i<$itemCount;$i++) {

        if(!empty($_POST["client_name"][$i])) {
            $trimName=trim($_POST["client_name"][$i]);
            $trimAddress=trim($_POST["client_address"][$i]);
            $trimGST=trim($_POST["client_gst"][$i]);
            if($trimGST == '')
                $trimGST = 'NA';
            if(($trimName!='')&&($trimAddress!='')){
                $countQuery = "select count(*) from client_list where client_contact = '" . $_POST["client_contact"][$i] . "'";
                $countResult = mysqli_query($conn, $countQuery);
                $countRow=mysqli_fetch_row($countResult);
                $count = $countRow[0];
                $queryValue = "";

                if($count == 0){
                    $itemValues++;
                    $queryValue = "('" . $trimName . "','" . $trimAddress . "','" . $trimGST . "','" . $_POST["client_contact"][$i] . "')";
                    $sql = $query.$queryValue;
                    mysqli_query($conn, $sql);
                }
            }    
        }
    }

    if($itemValues==0) {
        echo "<script>
                    alert('Client already exists, or you are trying insert empty spaces!');
                    window.location = '../menu/clients.php';
                </script>";
    }
    
    else{
        echo "<script>
                alert('$itemValues New Client(s) Added!');
                window.location = '../menu/clients.php';
            </script>";
    }
        
?>