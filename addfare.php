<?php
include "connection_dbms.php"; //the connection file we created

$train_no = $_POST['train_no'];
$class = $_POST['class'];
$fare=$_POST['fare'];
//echo $user_name ." ". $password . "<br/>" ;

$result = mysqli_query($db, "insert into fare (train_no,class,t_fare) values('$train_no', 
'$class','$fare')");

if (!$result) {
die('Invalid Query: '. mysqli_error($db));
}

echo "Fare for ".$train_no. "'s data added.";

?>