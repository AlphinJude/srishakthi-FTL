<?php 
session_start();
$message="";

include("config.php");

if(count($_POST)>0)
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	$dpass=mysqli_query($conn,"SELECT * FROM `login` WHERE `username` = '$username' AND `password` = PASSWORD('$password')");
	$result=mysqli_fetch_array($dpass);
	if(is_array($result))
	{
		$_SESSION["username"] = $username;
	}
	else
	{
		echo "<script>
					alert('Invalid Username or Password!');
					window.location = '../';
				</script>";
	}
	if(isset($_SESSION["username"])) {
		$_SESSION["login_time_stamp"] = time();
		header("location: ../menu/homepage.php");
	}
}
?>