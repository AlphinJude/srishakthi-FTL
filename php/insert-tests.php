<?php
    include("config.php");

    $itemCount = count($_POST["test_name"]);
    $itemValues=0;
    $query = "INSERT INTO tests (test_name) VALUES ";

    for($i=0;$i<$itemCount;$i++) {

        if(!empty($_POST["test_name"][$i])) {

            $trimName=trim($_POST["test_name"][$i]);
            if($trimName!=''){

                $countQuery = "select count(*) from tests where test_name = '" . $trimName . "'";
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
    if($itemValues == 0) {
        echo "<script>
                alert('Test already exists, or you are trying insert empty spaces!');
                window.location = '../menu/tests.php';
            </script>";
    }
    else{
    echo "<script>
            alert('$itemValues New Test(s) Added!');
            window.location = '../menu/tests.php';
        </script>";
    }  
?>