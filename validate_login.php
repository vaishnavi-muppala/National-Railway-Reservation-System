<?php
session_start();
include "connection_dbms.php"; //the connection file we created

// Grab User submitted information
$users_name = $_POST["users_name"];
$password = $_POST["users_pass"];

$result = mysqli_query($db,"SELECT user_name, password,usertype FROM user WHERE user_name = '$_POST[users_name]' and password='$_POST[users_pass]'") or die(mysqli_error($db));

$row = mysqli_fetch_assoc($result);

echo "";

if($result->num_rows>0) 
	{ 
		if($row['usertype']=="admin")
		{
			echo " <br />  SUCCESSFULLY LOGIN TO USER PROFILE PAGE... <br />";
			$_SESSION['users_name']=$users_name;
			header('Location: train_admin.html');}
		else{
			header('Location: train_user.html');
		}
	}
 else if($result->num_rows==0)
	echo "<br /> SORRY... YOU ENTERED WRONG ID AND PASSWORD... PLEASE RETRY... <br />";
?>