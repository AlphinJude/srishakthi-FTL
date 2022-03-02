<!DOCTYPE html>
<?php
    session_start();
?>
<html>
    <head>
        <title>Clients</title>
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
                <div id="add-test" class="add-entity-container">
                    <div class="container">
                        <form action="../php/insert-tests.php" method="POST">
                            <button type="button" class="close-button" onclick="closeAddTest()">
                            <img src="../assets/icons/close.svg" alt="">
                            </button>
                            <div class="title">Add New Tests</div>
                            <table class="content-table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Test Name</th>
                                    </tr>
                                </thead>
                                <tbody id="add-test-table">
                                    <?php require_once("../php/add-test.php")?>
                                </tbody>
                            </table>
                            <div class="buttons-row">
                                <div class="button"> 
                                    <button type="button" onclick="addTestRow()">
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
                    <div class="title">Tests</div>
                    <div class="table-responsive">  
                        <table id="employee_data" class="table table-striped table-bordered">  
                            <thead>  
                                <tr>  
                                        <td>Test ID</td>  
                                        <td>Test Name</td>   
                                </tr>  
                            </thead>  
                            <?php  
                                $conn = mysqli_connect("localhost","root","", "chemical","3306");
                                $query = "SELECT * FROM tests ORDER BY test_name ASC";
                                $result = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_array($result))  
                                {  
                                    echo '  
                                    <tr>  
                                            <td>'.$row["test_id"].'</td>  
                                            <td>'.$row["test_name"].'</td>   
                                    </tr>  
                                    ';  
                                }  
                            ?>  
                        </table>
                    </div> 
                    <div class="add-entity-button-container">
                        <div class="buttons-row">
                            <div class="button"> 
                                <button type="button" onclick="addNewTest()">
                                <img src="../assets/icons/add.svg" alt="">
                                    <p>Add New Tests</p>
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