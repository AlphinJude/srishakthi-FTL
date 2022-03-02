<?php
    include("config.php");
    
    $itemCount = count($_POST["chemical_name"]);
    $itemValues = 0;
    $query = "INSERT INTO chem_list (chem_name) VALUES ";

    for($i=0;$i<$itemCount;$i++) {

        if(!empty($_POST["chemical_name"][$i])) {
            $trimName=trim($_POST["chemical_name"][$i]);
            if($trimName!=''){

            $countQuery = "select count(*) from chem_list where chem_name = '" . $trimName . "'";
            $countResult = mysqli_query($conn, $countQuery);
            $countRow=mysqli_fetch_row($countResult);
            $count = $countRow[0];
            $queryValue = "";

            if($count == 0){
                $itemValues++;
                $queryValue = "('" . $trimName . "')";
                $sql = $query.$queryValue;
                mysqli_query($conn, $sql);
            }
        }   
    } 
}
    if($itemValues == 0){
        echo "<script>
                alert('Chemical already exists, or you are trying insert empty spaces!');
                window.location = '../menu/chemicals-list.php';
            </script>";
    }
    else{
    echo "<script>
            alert('$itemValues New chemical(s) added!');
            window.location = '../menu/chemicals-list.php';
        </script>"; 
    }
?>