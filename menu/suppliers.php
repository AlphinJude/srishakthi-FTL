<!DOCTYPE html>
<?php
    session_start();
?>
<html>
    <head>
        <title>Suppliers</title>

        <script src="..\assets\js\jquery\2.2.0\jquery.min.js"></script>
        <link rel="stylesheet" href="..\assets\css\bootstrap\css\bootsrap.min.css" />  
        <script src="..\assets\js\jquery\jquery.dataTables.min.js"></script>  
        <script src="..\assets\js\jquery\dataTables.bootstrap.min.js"></script>            
        <link rel="stylesheet" href="..\assets\css\bootstrap\css\dataTables.bootstrap.min.css" />  
        <link rel="stylesheet" href="..\assets\css\style.css">
    </head>
    <body>
    <?php
        if($_SESSION["username"]) {
?>
        <div class="wrapper">
            <?php include "../php/header.php" ?>
            <div class="page-container">
                <div id="add-supplier" class="add-entity-container">
                    <div class="container">
                    <form action="../php/insert-suppliers.php" method="POST">
                        <button type="button" class="close-button" onclick="closeAddSupplier()">
                        <img src="../assets/icons/close.svg" alt="">
                        </button>
                        <div class="title">Add New Suppliers</div>
                        <table class="content-table" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>GST Number</th>
                                    <th>Contact</th>
                                </tr>
                            </thead>
                            <tbody id="add-supplier-table">
                                <?php require_once("../php/add-supplier.php")?>
                            </tbody>
                        </table>
                        <div class="buttons-row">
                            <div class="button"> 
                                <button type="button" onclick="addSupplierRow()">
                                <img src="../assets/icons/add.svg" alt="">
                                    <p>Add More</p>
                                </button>
                            </div>
                            <div class="button">
                                <button type="submit" value="">
                                <img src="../assets/icons/done.svg" alt="">
                                    <p>Insert</p>
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="container">
                    <div class="title">Suppliers</div>
                    <div class="table-responsive">  
                        <table id="employee_data" class="table table-striped table-bordered">  
                            <thead>  
                                <tr>
                                    <th>Supplier ID</th>
                                    <th>Name</th>  
                                    <th>Address</th>
                                    <th>GST Number</th>  
                                    <th>Contact</th>  
                                </tr>  
                            </thead>  
                            <?php  
                                $conn = mysqli_connect("localhost","root","", "chemical","3306");
                                $query = "SELECT * FROM supplier_list ORDER BY supplier_name ASC";
                                $result = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_array($result))  
                                {  
                                    echo '  
                                    <tr>
                                        <td>'.$row["supplier_id"].'</td>  
                                        <td>'.$row["supplier_name"].'</td>  
                                        <td>'.$row["supplier_address"].'</td>
                                        <td>'.$row["supplier_gst"].'</td>   
                                        <td>'.$row["supplier_contact"].'</td>
                                    </tr>  
                                    ';  
                                }  
                            ?>  
                        </table>  
                    </div>
                    <div class="add-entity-button-container">
                        <div class="buttons-row">
                            <div class="button"> 
                                <button type="button" onclick="addNewSupplier()">
                                <img src="../assets/icons/add.svg" alt="">
                                    <p>Add New Suppliers</p>
                                </button>
                            </div>
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){  
                $('#employee_data').DataTable();  
            });
        </script>
        <script type="text/javascript" src="..\assets\js\main.js"></script>
        <?php
    }
        else
            header("Location:../");
?>
    </body>
</html>