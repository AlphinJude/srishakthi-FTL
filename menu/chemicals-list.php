<!DOCTYPE html>
<?php
    session_start();
?>
<html>
    <head>
        <title>Chemicals</title>
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
                <div id="add-chemical" class="add-entity-container">
                    <div class="container">
                        <form action="../php/insert-chemicals.php" method="POST">
                            <button type="button" class="close-button" onclick="closeAddChemical()">
                                <img src="../assets/icons/close.svg" alt="">
                            </button>
                            <div class="title">Add New Chemicals</div>
                            <table class="content-table" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Chemical Name</th>
                                    </tr>
                                </thead>
                                <tbody id="add-chemical-table">
                                    <?php require_once("../php/add-chemical.php")?>
                                </tbody>
                            </table>
                            <div class="buttons-row">
                                <div class="button"> 
                                    <button type="button" onclick="addChemicalRow()">
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
                <div id="upload-chemical" class="add-entity-container">
                    <div class="container">
                        <form action="upload-chemicals.php" enctype="multipart/form-data" method="post">
                            <button type="button" class="close-button" onclick="closeUploadChemical()">
                                <img src="../assets/icons/close.svg" alt="">
                            </button>
                            <p>Import csv file :</p>
                            <input type="file" name="csv" id="csv" class="large"/>
                            <div class="buttons-row">
                                <div class="button"> 
                                    <button type="button" onclick="uploadChemical()" id="chemical-upload">
                                        <img src="../assets/icons/upload.svg" alt="">
                                        <p>Upload File</p>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="container">  
                    <div class="title">Chemicals</div>
                    <div class="table-responsive">  
                        <table id="chemical-list" class="table table-striped table-bordered">  
                            <thead>  
                                <tr>  
                                    <td>Chemical ID</td>  
                                    <td>Chemical Name</td>  
                                </tr>  
                            </thead>  
                            <?php  
                            $conn = mysqli_connect("localhost","root","", "chemical","3306");
                            $query = "SELECT * FROM chem_list ORDER BY chem_name ASC";
                            $result = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result))  
                            {  
                                echo '  
                                <tr>  
                                        <td>'.$row["chem_id"].'</td>  
                                        <td>'.$row["chem_name"].'</td>   
                                </tr>  
                                ';  
                            }  
                            ?>  
                        </table>
                    </div>
                    <div class="add-entity-button-container">
                        <div class="buttons-row">
                            <div class="button"> 
                                <button type="button" onclick="addNewChemical()" id="add-chemical">
                                    <img src="../assets/icons/add.svg" alt="">
                                    <p>Add New Chemicals</p>
                                </button>
                            </div>
                            <div class="button"> 
                                <button type="button" onclick="uploadChemical()" id="chemical-upload">
                                    <img src="../assets/icons/upload.svg" alt="">
                                    <p>Upload Chemicals</p>
                                </button>
                            </div>
                        </div> 
                    </div>  
                </div>      
            </div>
        </div>
        <script>
            $(document).ready(function(){  
                $('#chemical-list').DataTable();  
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