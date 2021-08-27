<?php
    include("config.php");
    $chemical_name = $_POST['chemical_name'];
    $price = $_POST['price'];
    $quantity =$_POST['quantity'];
    if (!empty($chemical_name) || !empty($price) || !empty($quantity))
    {
        
        if (mysqli_connect_error())
        {
            die('Connect Error ('. mysqli_connect_errno() .') '
            . mysqli_connect_error());
        }
        else 
        {
            $sql = "INSERT INTO chemicals (chemical_name, price, quantity) VALUES ('$chemical_name','$price','$quantity')";
            if ($conn->query($sql))
            {
            echo "New chemicals are inserted sucessfully";
            }
            else
            {
            echo "Error: ". $sql ."". $conn->error;
            }
            $conn->close();
        }
    }
?>