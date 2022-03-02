<!DOCTYPE html>

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
            // if($_SESSION["username"]) {
            ?>
            <div class="wrapper">
                <?php include "../php/header.php" ?>
                <div class="page-container">
                    <div id="add-client" class="add-entity-container">
                        <div class="container">
                        <form action="../php/insert-clients.php" method="POST">
                            <button type="button" class="close-button" onclick="closeAddClient()">
                                <img src="../assets/icons/close.svg" alt="">
                            </button>
                            <div class="title">Add New Clients</div>
                            <table class="content-table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>GST Number</th>
                                        <th>Contact</th>
                                    </tr>
                                </thead>
                                <tbody id="add-client-table">
                                    <?php require_once("../php/add-client.php")?>
                                </tbody>
                            </table>
                            <div class="buttons-row">
                                <div class="button"> 
                                    <button type="button" onclick="addClientRow()">
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
                    <div class="title">Clients</div>
                    <div class="table-responsive">  
                        <table id="employee_data" class="table table-striped table-bordered">  
                            <thead>  
                                <tr>
                                    <th> Client ID</th>  
                                    <th>Name</th>  
                                    <th>Address</th>
                                    <th>GST Number</th>  
                                    <th>Contact</th>  
                                </tr>  
                            </thead>  
                            <?php  
                                include("../php/config.php");
                                $query = "SELECT * FROM client_list ORDER BY client_name ASC";
                                $result = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_array($result))  
                                {  
                                    echo '  
                                    <tr>
                                        <td>'.$row["client_id"].'</td> 
                                        <td>'.$row["client_name"].'</td>  
                                        <td>'.$row["client_address"].'</td>
                                        <td>'.$row["client_gst"].'</td>   
                                        <td>'.$row["client_contact"].'</td>
                                    </tr>  
                                    ';  
                                }  
                            ?>  
                        </table>  
                    </div>  
                    <div class="add-entity-button-container">
                        <div class="buttons-row">
                            <div class="button"> 
                                <button type="button" onclick="addNewClient()">
                                    <img src="../assets/icons/add.svg" alt="">
                                    <p>Add New Clients</p>
                                </button>
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
        // }
        //         else
        //             header("Location:../");
            ?>
    </body>
</html>