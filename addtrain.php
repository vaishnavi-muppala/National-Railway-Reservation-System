<?php
include "connection_dbms.php"; //the connection file we created

$train_no = $_POST['train_no'];
$train_name = $_POST['train_name'];
$start_station = $_POST['start_station'];
$stop_station = $_POST['stop_station'];
$dept_time = $_POST['dept_time'];
$arr_time = $_POST['arr_time'];

//echo $user_name ." ". $password . "<br/>" ;

$result = mysqli_query($db, "insert into train (train_no,train_name,start_station,stop_station,departure_time,arrival_time) values('$train_no', 
'$train_name','$start_station','$stop_station','$dept_time','$arr_time')");

if (!$result) {
die('Invalid Query: '. mysqli_error($db));
}

echo $train_name. "'s data added.";

?>