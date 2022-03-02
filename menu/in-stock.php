<!DOCTYPE html>

<html>
    <head>
        <title>Chemicals</title>
        <script src="..\assets\js\jquery\2.2.0\jquery.min.js"></script>
        <link rel="stylesheet" href="..\assets\css\bootstrap\css\bootsrap.min.css" />  
        <script src="..\assets\js\jquery\jquery.dataTables.min.js"></script>  
        <script src="..\assets\js\jquery\dataTables.bootstrap.min.js"></script>            
        <link rel="stylesheet" href="..\assets\css\bootstrap\css\dataTables.bootstrap.min.css" />  
        <link rel="stylesheet" href="..\assets\css\style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round"
            rel="stylesheet">
    </head>
    <body>
    <?php
        // if($_SESSION["username"]) {
?>
        <div class="wrapper">
            <?php include "../php/header.php" ?>
            <div class="page-container">
                <div class="container">  
                    <div class="title">Chemicals In Stock</div>
                    <div class="table-responsive">  
                        <table id="stock_data" class="table table-striped table-bordered">  
                            <thead>  
                                <tr>  
                                    <td>Chemical ID</td>  
                                    <td>Chemical Name</td>
                                    <td>Total Quantity</td>
                                    <td>Quantity Used</td>
                                    <td>Quantity Remaining</td>  
                                </tr>  
                            </thead>  
                            <?php  
                                $conn = mysqli_connect("localhost","root","", "chemical","3306");
                                $query = "select s.chem_id,c.chem_name, s.total_qty, s.total_qty-s.rem_qty as rem, s.rem_qty from chem_list c 
                                join chem_stock s 
                                on s.chem_id = c.chem_id;";
                                $result = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    echo '  
                                    <tr>  
                                            <td>'.$row["chem_id"].'</td>  
                                            <td>'.$row["chem_name"].'</td> 
                                            <td>'.$row["total_qty"].'</td>  
                                            <td>'.$row["rem"].'</td>
                                            <td>'.$row["rem_qty"].'</td>   
                                    </tr>  
                                    ';  
                                }  
                            ?>  
                        </table>  
                    </div>  
                </div>      
            </div>
        </div>
        <script>
            $(document).ready(function(){  
                $('#stock_data').DataTable();   
            });
        </script>
        <script type="text/javascript" src="..\assets\js\main.js"></script>
        <?php
    // }
    //     else
    //         header("Location:../");
?>
    </body>
</html>