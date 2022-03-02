<!DOCTYPE html>
<?php
    session_start();
?>
<html>
    <head>
        <title>Sri Shakthi Food Testing Laboratory</title>
        <link rel="stylesheet" href="..\assets\css\style.css">
        </head>
    <body>
    <?php
        if($_SESSION["username"]) {
?>
        <div class="wrapper">
            <?php include "../php/header.php" ?>
            <div class="page-container">
            <h1 style="text-transform: uppercase;"> Welcome <?php echo $_SESSION["username"] ?>!</h1>
            </div>
        </div>
        <script type="text/javascript" src="index.js"></script>
        <?php
    }
        else
            header("Location:../");
?>
        <script type="text/javascript" src="..\assets\js\main.js"></script>
    </body>
</html>