<?php
include "connection_dbms.php"; //the connection file we created

echo "<br/> <br/> <br/> <br/>";
$name1 = $_POST['name1'];
echo "Name 1 is: "; 
echo $name1; 
echo "<br/> ";


    echo "<fieldset>";
	echo "<legend>Ticket</legend>";
	echo "Train Number: " . $_POST['train_no'] . "<br/>";
	echo "PNR: " . $_POST['train_no'] . "<br/>";
	echo "Date of journey: " . $_POST['date'] . "<br/>";
	echo "Source: " . $_POST['start_station'] . "<br/>";
	echo "Destination: " . $_POST['stop_station'] . "<br/>";
	echo "Departure time: " . $_POST['departure_time'] . "<br/>";
	echo "Arrival time: " . $_POST['arrival_time'] . "<br/>";
	echo "Class: " . $_POST['class'] . "<br/>";
	echo "Fare: " . $_POST['payment_amount'] . "<br/>";
	
	
	echo "Name: " . $_POST['arr_name[]'];
	echo "Age: " . $_POST['train_no'];
	echo "Gender: " . $_POST['train_no'];
	echo "Seat number: " . $_POST['seats'];
	echo "</fieldset> <br/> <br/> ";

echo "<br/>";
?>