<?php 
include("config.php");

if(isset($_POST['sub']))
{
$username = $_POST['username'];
$password = $_POST['password'];

$res = mysqli_query($conn,"SELECT * from admin where username='$username'and password='$password'");
$result=mysqli_fetch_array($res);
if($result)
{
echo "You are login Successfully ";
header("location:update-stock.php"); 
	
}
else
{
	echo "failed ";
}
}
?>