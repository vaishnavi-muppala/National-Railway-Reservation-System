<?php
include "connection_dbms.php"; //the connection file we created
	
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
echo '<li><a href="train_user.html">Home</a> /<span class="divider"></span></li>';
echo '<li class="">Ticket &nbsp;</li>';
echo '</ul>';	
	
$pnr = $_POST['pnr'];
echo "The ticket information corresponding to PNR " . $pnr . " is: ";

$result = mysqli_query($db, "select TRAIN_NO, PNR, DATE, FROM_STATION, TO_STATION, DEPARTURE_TIME, ARRIVAL_TIME, CLASS, FARE from ticket where PNR='$pnr'") or die(mysqli_error($db));
$row = mysqli_fetch_assoc($result);

echo '<div class="box">';
echo '<div class="inner">';
echo '<h1>';
echo "PNR: " . $_POST['pnr'] ."<br/>";
echo '</h1>';
echo '<h5>';
echo "TRAIN_NO: " . $row['TRAIN_NO'] . "&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;   &nbsp; &nbsp;"; 
echo '</h5>';
echo '<h5>';
echo "Start Station: " . $row['FROM_STATION'] . "&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";
echo "Stop Station: " . $row['TO_STATION'] . "<br/>";
echo '</h5>';
echo '<h5>';
echo "Departure: " . $row['DEPARTURE_TIME'] . "&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;";
echo "Arrival: " . $row['ARRIVAL_TIME'] . "<br/>";
echo '</h5>';
echo '<h5>';
echo "Class: " . $row['CLASS'] . "<br/>";
echo '</h5>';
echo '<h5>';
echo "Journey Date: " . $row['DATE'] . "<br/>";
echo '</h5>';
echo "<br /><br />";

$result1 = mysqli_query($db, "select NAME, AGE, GENDER, SEAT_NO from ticket where PNR='$pnr'") or die(mysqli_error($db));

while($row1 = mysqli_fetch_assoc($result1)){
	
echo '<h5>';
echo "Name: " . $row1['NAME'] . "";
echo '</h5>';
echo '<h5>';
echo "Seat number: " . $row1['SEAT_NO'] . "<br/>";
echo '</h5>';
echo '<h5>';
echo "Gender: " . $row1['GENDER'] . "<br/>";
echo '</h5>';
echo '<h5>';
echo "Age: " . $row1['AGE'] . "<br/>";
echo '</h5>';
echo '<h5>';
echo "<br />";
}

echo '<div class="total clearfix">';
echo '<h4>Ticket Fare : <p>$ '.$row['FARE'].'</p></h4>';
echo '</div>';
echo '</div>';
echo '</div>';
echo "<br/>";

echo '</body> </html>';
?>


