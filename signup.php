<?php
include "connection_dbms.php"; //the connection file we created

$user_name = $_POST['user_name'];
$password = $_POST['password'];
$date = date('Y-m-d H:i:s');
$name = $_POST['name'];
$aadhaar_no = $_POST['aadhaar_no'];
$age = $_POST['age'];
$email_id = $_POST['email_id'];


//echo $user_name ." ". $password . "<br/>" ;

$result = mysqli_query($db, "insert into user (user_name, password, registration_date, name, aadhaar_no, age, email_id) values('$user_name', '$password', '$date', '$name', '$aadhaar_no', '$age', '$email_id')");

if (!$result) {
die('Invalid Query: '. mysqli_error($db));
}

echo "Hi " .$user_name. ", you have Signed up successfully!!";

?>