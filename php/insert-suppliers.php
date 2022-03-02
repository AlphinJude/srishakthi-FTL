<?php
    include("config.php");

    $itemCount = count($_POST["supplier_name"]);
    $itemValues=0;
    $query = "INSERT INTO supplier_list (supplier_name, supplier_address, supplier_gst, supplier_contact) VALUES ";

    for($i=0;$i<$itemCount;$i++) {

        if(!empty($_POST["supplier_name"][$i])) {
            $trimName=trim($_POST["supplier_name"][$i]);
            $trimAddress=trim($_POST["supplier_address"][$i]);
            $trimGST=trim($_POST["supplier_gst"][$i]);
            if($trimGST == '')
                $trimGST = 'NA';
            if(($trimName!='')&&($trimAddress!='')){
                $countQuery = "select count(*) from supplier_list where supplier_contact = '" . $_POST["supplier_contact"][$i] . "'";
                $countResult = mysqli_query($conn, $countQuery);
                $countRow=mysqli_fetch_row($countResult);
                $count = $countRow[0];
                $queryValue = "";

                if($count == 0){
                    $itemValues++;
                    $queryValue = "('" . $trimName . "','" . $trimAddress . "','" . $trimGST . "','" . $_POST["supplier_contact"][$i] . "')";
                    $sql = $query.$queryValue;
                    mysqli_query($conn, $sql);
                }
            }    
        }
    }

    if($itemValues==0) {
        echo "<script>
                    alert('Supplier already exists, or you are trying insert empty spaces!');
                    window.location = '../menu/suppliers.php';
                </script>";
    }
    
    else{
        echo "<script>
                alert('$itemValues New Supplier(s) Added!');
                window.location = '../menu/suppliers.php';
            </script>";
    }
        
?>