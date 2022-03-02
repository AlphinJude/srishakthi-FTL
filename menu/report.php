<!DOCTYPE html>
<?php
    session_start();
?>
<html>
    <head>
        <title>Report</title>                
        <script src="..\assets\js\jquery\export\jquery-3.5.1.js"></script>
        <script src="..\assets\js\jquery\export\jquery.dataTables.min.js"></script>
        <script src="..\assets\js\jquery\export\dataTables.buttons.min.js"></script>
        <script src="..\assets\js\jquery\export\jszip.min.js"></script>
        <script src="..\assets\js\jquery\export\pdfmake.min.js"></script>
        <script src="..\assets\js\jquery\export\vfs_fonts.js"></script>
        <script src="..\assets\js\jquery\export\buttons.html5.min.js"></script>
        <script src="..\assets\js\jquery\export\buttons.print.min.js"></script>
        <link rel="stylesheet" href="..\assets\js\jquery\export\jquery.dataTables.min.css">
        <link rel="stylesheet" href="..\assets\js\jquery\export\buttons.dataTables.min.css">
        <link rel="stylesheet" href="..\assets\css\style.css">
    </head>
    <body>
    <?php
        if($_SESSION["username"]) {
    ?>
        <div class="wrapper">
            <?php include "../php/header.php" ?>
            <div class="page-container" style="padding-bottom: 0;">
                <div class="login-container">
                    <div class="title">Report</div>
                    <div class="input-box">
                        <label>Generate report based on</label>
                        <select id="report" name="report">
                            <option value="select">Select what the report should be based on</option>
                            <option value="chemical">Chemical</option>
                            <option value="client">Client</option>
                            <option value="test">Test</option>
                        </select>
                    </div>
                    <div class="button"> 
                        <button type="button" value="" onclick="displayDT()">
                            <img src="../assets/icons/report.svg" alt="">
                            <p style="margin-left: 15px;">Generate Report</p>
                        </button>
                    </div>
                </div>
            </div>
            <div id="report-table" class="page-container" style="padding-top: 0;">
                
            </div>
        </div>
        <?php
    }
        else
            header("Location:../");
?>
        <script>
            $(document).ready(function(){  
                $('#chemical-table').DataTable();
                $('#test-table').DataTable();      
            });

            function displayDT(){
                var report = document.getElementById('report').value;

                if (report == "chemical"){
                    document.querySelector('title').textContent="Chemical-Report";
                    $.ajax({
                        url: "../php/chemical-report.php",
                        success: function(response){
                            $('#report-table').html(response);
                        }
                    });
                }

                if (report == "client"){
                    document.querySelector('title').textContent="Client-Report";
                    $.ajax({
                        url: "../php/client-report.php",
                        success: function(response){
                            $('#report-table').html(response);
                        }
                    });
                }

                if (report == "test"){
                    document.querySelector('title').textContent="Test-Report";
                    $.ajax({
                        url: "../php/test-report.php",
                        success: function(response){
                            $('#report-table').html(response);
                        }
                    });
                }

            }
  
        </script>
        <script src="..\assets\js\main.js"></script>
    </body>
</html>