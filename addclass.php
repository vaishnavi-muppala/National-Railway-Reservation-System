<?php
include "connection_dbms.php"; //the connection file we created

$train_no = $_POST['train_no'];
$date=$_POST['date'];
$GENERAL = $_POST['GENERAL'];
$SLEEPER = $_POST['SLEEPER'];
$CHAIR_CAR = $_POST['CHAIR_CAR'];
$AC_1 = $_POST['AC_1'];
$AC_2 = $_POST['AC_2'];

//echo $user_name ." ". $password . "<br/>" ;

$result = mysqli_query($db, "insert into class (train_no,date,general,sleeper,chair_car,ac_1,ac_2) values('$train_no','$date', 
'$GENERAL','$SLEEPER','$CHAIR_CAR','$AC_1','$AC_2')");


if (!$result) {
die('Invalid Query: '. mysqli_error($db));
}

echo "Classes for ".$train_no. "'s data added.";

?>