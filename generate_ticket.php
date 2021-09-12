<?php
include "connection_dbms.php"; //the connection file we created

$actual_date = $_POST['date'];
$split_date = explode("-", $actual_date);
$year = $split_date[0]; 
$month = $split_date[1]; 
$date = $split_date[2];

$var=$_POST['class'];
$var2=$_POST['train_no'];
$seats = $_POST['seats'];
$d=$_POST['date'];


echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="utf-8">';
echo '<title>National Railway Reservation</title>';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<meta name="description" content="">';
echo '<meta name="author" content="">';
echo '<!--Less styles -->';
echo '<!-- Other Less css file //different less files has different color scheam';
echo '<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">';
echo '<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">';
echo '<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate';
echo '-->';
echo '<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/2A4F4061-B43B-BF40-94BC-442F52DACF10/main.js" charset="UTF-8"></script></head>';
echo '<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">';
echo '<script src="themes/js/less.js" type="text/javascript"></script> -->';
echo '';
echo '<!-- Bootstrap style -->';
echo '<link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>';
echo '<link href="themes/css/base.css" rel="stylesheet" media="screen"/>';
echo '<!-- Bootstrap style responsive -->';
echo '<!-- <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/> -->';
echo '<!-- <link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css"> -->';
echo '<!-- Google-code-prettify -->';
echo '<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>';
echo '<!-- fav and touch icons -->';
echo '<link rel="shortcut icon" href="themes/images/ico/favicon.ico">';
echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">';
echo '<!-- <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png"> -->';
echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">';
echo '<link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">';
echo '<link rel=\'stylesheet\' href=\'https://unpkg.com/purecss@1.0.0/build/pure-min.css\' integrity=\'sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w\' crossorigin=\'anonymous\'>';
echo '<style type="text/css" id="enject"></style>';
echo '<!--Import Google Icon Font-->';
echo '';
echo '<!--Let browser know website is optimized for mobile-->';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
echo '<link rel="stylesheet" href="try1.css">';
echo '</head>';

echo '<body>';
echo '<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>';
echo '';
echo '<div id="header">';
echo '';
echo '<!-- Navbar ================================================== -->';
echo '<div id="logoArea" class="navbar">';
echo '<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">';
echo '<span class="icon-bar"></span>';
echo '<span class="icon-bar"></span>';
echo '<span class="icon-bar"></span>';
echo '</a>';
echo '<div class="navbar-inner">';
echo '<a class="brand" href="index.html" style="color:#ffffff;font-size:20px">National Railway Reservation System</a>';
echo '';
echo '<ul id="topMenu" class="nav pull-right">';
echo '<li class=""><a href="contact.html">Contact</a></li>';
echo '<li class=""><a href="logout.php">Logout</a></li>';
echo '<li class="">';
echo '</li>';
echo '</ul>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div id="mainBody">';
echo '<div class="container">';
echo '<ul class="breadcrumb">';
echo '<li><a href="train_enquiry.html">Home</a> /<span class="divider"></span></li>';
echo '<li class="">Book_Ticket /&nbsp;</li>';
echo '<li class="">passenger_details /&nbsp;</li>';
echo '<li class="active">Your ticket&nbsp;</li>';
echo '</ul>';


$result = mysqli_query($db, "SELECT get_seat_no('$_POST[train_no]', '$_POST[date]', $_POST[class]' ) " );

if($_POST['class'] == "GENERAL"){ 
	$result1 = mysqli_query($db, "SELECT GENERAL FROM class WHERE TRAIN_NO = '$_POST[train_no]' AND DATE = '$_POST[date]'" );
	$row1 = mysqli_fetch_assoc($result1);
    $seat_no = $row1['GENERAL'];
}
if($_POST['class'] == "SLEEPER"){ 
	$result1 = mysqli_query($db, "SELECT SLEEPER FROM class WHERE TRAIN_NO = '$_POST[train_no]' AND DATE = '$_POST[date]'" );
	$row1 = mysqli_fetch_assoc($result1);
    $seat_no = $row1['SLEEPER'];
}
if($_POST['class'] == "CHAIR_CAR"){ 
	$result1 = mysqli_query($db, "SELECT CHAIR_CAR FROM class WHERE TRAIN_NO = '$_POST[train_no]' AND DATE = '$_POST[date]'" );
	$row1 = mysqli_fetch_assoc($result1);
    $seat_no = $row1['CHAIR_CAR'];
}
if($_POST['class'] == "AC_1"){ 
	$result1 = mysqli_query($db, "SELECT AC_1 FROM class WHERE TRAIN_NO = '$_POST[train_no]' AND DATE = '$_POST[date]'" );
	$row1 = mysqli_fetch_assoc($result1);
    $seat_no = $row1['AC_1'];
}
if($_POST['class'] == "AC_2"){ 
	$result1 = mysqli_query($db, "SELECT AC_2 FROM class WHERE TRAIN_NO = '$_POST[train_no]' AND DATE = '$_POST[date]'" );
	$row1 = mysqli_fetch_assoc($result1);
    $seat_no = $row1['AC_2'];
}
if($_POST['class'] == "AC_3"){ 
	$result1 = mysqli_query($db, "SELECT AC_3 FROM class WHERE TRAIN_NO = '$_POST[train_no]' AND DATE = '$_POST[date]'" );
	$row1 = mysqli_fetch_assoc($result1);
    $seat_no = $row1['AC_3'];
}
if($_POST['class'] == "AC_CHAIR_CAR"){ 
	$result1 = mysqli_query($db, "SELECT AC_CHAIR_CAR FROM class WHERE TRAIN_NO = '$_POST[train_no]' AND DATE = '$_POST[date]'" );
	$row1 = mysqli_fetch_assoc($result1);
    $seat_no = $row1['AC_CHAIR_CAR'];
}


  // echo "<fieldset>";
	echo "<center><h2>Ticket/s</h2></center>";
	//echo "Train Number: " . $_POST['train_no'] . "<br/>";
	//echo "PNR: " . $_POST['train_no'] . $date . $month . $_POST['seats'] . "<br/>";
	//echo "Date of journey: " . $_POST['date'] . "<br/>";
	//echo "Source: " . $_POST['start_station'] . "<br/>";
	//echo "Destination: " . $_POST['stop_station'] . "<br/>";
	//echo "Departure time: " . $_POST['departure_time'] . "<br/>";
	//echo "Arrival time: " . $_POST['arrival_time'] . "<br/>";
	//echo "Class: " . $_POST['class'] . "<br/>";
	//echo "Fare: " . $_POST['payment_amount'] . "<br/>";
	
$pnr=$_POST['train_no'] . $date . $month . $_POST['seats'];
echo '<div class="box">';
echo '<div class="inner">';
echo '<h1>';
echo "PNR: " . $_POST['train_no'] . $date . $month . $_POST['seats'] . "<br/>";
echo '</h1>';
echo '<h5>';
echo "TRAIN_NO: " . $_POST['train_no'] . "&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;   &nbsp; &nbsp;";
echo "TRAIN_NAME: " . $_POST['train_name'] .""; 
echo '</h5>';
echo '<h5>';
echo "Start Station: " . $_POST['start_station'] . "&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";
echo "Stop Station: " . $_POST['stop_station'] . "<br/>";
echo '</h5>';
echo '<h5>';
echo "Departure: " . $_POST['departure_time'] . "&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;";
echo "Arrival: " . $_POST['arrival_time'] . "<br/>";
echo '</h5>';
echo '<h5>';
echo "Class: " . $_POST['class'] . "<br/>";
echo '</h5>';
echo "<br /><br />";
for($i=0; $i<$_POST['seats']; $i=$i+1){
	//echo "Name: " . $_POST['arr_name'][$i] . "<br/>";
	//echo "Age: " . $_POST['arr_age'][$i] . "<br/>";
	//echo "Gender: " . $_POST['arr_gender'][$i] . "<br/>";
	//echo "Seat number: " . ($seat_no - $i) . "<br/>";

//	echo "<br/> ";


echo '<h5>';
echo "Name: " . $_POST['arr_name'][$i] . "";
echo '</h5>';
echo '<h5>';
echo "Seat number: " . ($seat_no - $i) . "<br/>";
echo '</h5>';
echo '<h5>';
echo "Gender: " . $_POST['arr_gender'][$i] . "<br/>";
echo '</h5>';
echo '<h5>';
echo "Age: " . $_POST['arr_age'][$i] . "<br/>";
echo '</h5>';
echo '<h5>';
echo "<br />";


	$var_name=$_POST['arr_name'][$i];
	$var_age=$_POST['arr_age'][$i];
	$var_gender=$_POST['arr_gender'][$i];
	$var4=$seat_no - $i;
	$result3= mysqli_query($db, "CALL insert_into_ticket('$var2','$pnr',
	'$var_name','$var_age','$var_gender','$d','$_POST[start_station]','$_POST[stop_station]',
	'$_POST[departure_time]','$_POST[arrival_time]','$var','$var4','$_POST[payment_amount]')") or die("Query fail: " . mysqli_error($db));

}	
	//echo "</fieldset> <br/> <br/> ";

echo '<div class="total clearfix">';
echo '<h4>Ticket Fare : <p>$ '.$_POST['payment_amount'].'</p></h4>';
echo '</div>';
echo '</div>';
echo '</div>';
echo "<br/>";

$result2 = mysqli_query($db, "CALL update_seats('$seats','$var2','$var','$d')") or die("Query fail: " . mysqli_error($db));

echo '</body> </html>';
?>