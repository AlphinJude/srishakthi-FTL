<?php
    include("config.php");
    
    if(isset( $_FILES['csv'] )){
        $csv_file = $_FILES['csv']['tmp_name'];
        if(is_file( $csv_file)){
            if(($handle = fopen($csv_file,"r")) !== FALSE){
                while (($csv_data = fgetcsv($handle, 1000, ",")) !== FALSE){
                    $num = count($csv_data);
                    for ($c=0; $c < $num; $c++)
                        $colum[$c] = $csv_data[$c]; 
 
                    $inserted = $conn -> query("INSERT INTO chem_list (chem_name) VALUES('$colum[0]')");
                }
                $msg = "Data uploaded successfully.";
                fclose($handle);
            }
            else
                $msg = "unable to read the format try again";
        }
        else
            $msg = "CSV format File not found";
    }
    else
        $msg = "Please try again.";
    
    echo $msg;
?>
