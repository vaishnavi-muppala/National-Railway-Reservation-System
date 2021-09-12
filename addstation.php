<?php
include "connection_dbms.php"; //the connection file we created

$station_id = $_POST['station_id'];
$station_name = $_POST['station_name'];


//echo $user_name ." ". $password . "<br/>" ;

$result = mysqli_query($db, "insert into station (station_id,station_name) values('$station_id', '$station_name')");

if (!$result) {
die('Invalid Query: '. mysqli_error($db));
}

echo $station_name. "'s data added.";

?>