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
echo '<li class="active">Book_Ticket</li>';
echo '</ul>';
echo '<div class="span4"></div><hr class="soft"/>';

echo "<form method='POST' action='passenger_details.php' ><center>";
echo "<center> <table id='book_ticket' border='4' class='pure-table pure-table-bordered'  cellspacing='0'>

            <tr>
            <th>Train Number</th>
            <th>Train Name</th>
			<th>Source</th>
			<th>Destination</th>
			<th>Departure time </th>
			<th>Arrival time</th>
			<th>Class</th>
			<th>Date</th>
			<th>Number of seats to book</th>
            </tr>";	

	echo "<tr>";
	echo "<td>" . $_POST['train_no'] . "</td>";
	echo "<td>" . $_POST['train_name'] . "</td>";
	echo "<td>" . $_POST['start_station'] . "</td>";
	echo "<td>" . $_POST['stop_station'] . "</td>";
	echo "<td>" . $_POST['departure_time'] . "</td>";
	echo "<td>" . $_POST['arrival_time'] . "</td>";
	echo "<td>" . $_POST['class'] . "</td>";
	echo "<td>" . $_POST['date'] . "</td>";
	echo "<td> <input type='number' name='seats' /></td>";
	echo "</tr>";
echo "</table></center>";

echo "<br/> <br/> <br/>";
echo "<td> <input type='submit' name='Proceed1' value='Proceed'/></td>";


    echo "<input type='hidden' name='train_no' value=$_POST[train_no]>";
	echo "<input type='hidden' name='train_name' value=$_POST[train_name]>";
	echo "<input type='hidden' name='start_station' value=$_POST[start_station]>";
	echo "<input type='hidden' name='stop_station' value=$_POST[stop_station]>";
	echo "<input type='hidden' name='departure_time' value=$_POST[departure_time]>";
	echo "<input type='hidden' name='arrival_time' value=$_POST[arrival_time]>";
	echo "<input type='hidden' name='class' value=$_POST[class]>";
	echo "<input type='hidden' name='date' value=$_POST[date]>";

echo "</form></center>";

if(isset($_GET['Proceed'])){

$seats = $_GET['seats'];

echo $seats; 
}

echo '</div></div>';
echo '<!-- MainBody End ============================= -->';
echo '';
echo '</body>';
echo '</html>';
?>