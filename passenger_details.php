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
echo '<li class="">Book_Ticket /&nbsp;</li>';
echo '<li class="active"> Enter_passenger_details</li>';
echo '</ul>';
echo '<div class="span4"></div><hr class="soft"/>';


echo "<html> <body> <form method='POST' action='generate_ticket.php' align:'right'>";

$result = mysqli_query($db, "select t_fare from fare where class='$_POST[class]' and train_no='$_POST[train_no]'")or die(mysqli_error($db));
$result1= mysqli_query($db, "select * from class where train_no='$_POST[train_no]' and date='$_POST[date]'") or die(mysqli_error($db));


$row = mysqli_fetch_assoc($result);
$row1=mysqli_fetch_assoc($result1);
$var=$_POST['class'];
$var2=$_POST['train_no'];
$seats = $_POST['seats'];
$d=$_POST['date'];


//$result2 = mysqli_query($db, "CALL update_seats('$seats','$var2','$var','$d')") or die("Query fail: " . mysqli_error($db));


if($seats>$row1[$var]){
	echo "<center><a href='train_enquiry.html'>Click here to go back</a></center>";
	echo "<script type=\"text/javascript\">alert(\"No. of seats exceeded!  Please go back to proceed...\");</script>";
	exit;
};

echo "<h5>Total Seats booked : "; 
echo $seats; 
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "Payment amount: ";
echo $seats*$row['t_fare'];
$payment_amount= $seats*$row['t_fare'];
echo "</h5><br/> <br/>";
echo "<h4>Enter details of passengers :</h4>";
echo "<br/> ";

for($i=1; $i<=$seats; $i=$i+1){
	
	
	echo "<fieldset>";
	echo "<legend>Passenger " . $i . "</legend>";
	echo "Full Name: <br/><input type='text' name='arr_name[]' id='name'> <br/>";
	echo "Age: <br/><input type='number' name='arr_age[]' id='age'> <br/>";
	echo "Gender: <br/><select name='arr_gender[]' id='gender'> <option value='Male'>Male</option> <option value='Female'>Female</option> </select> ";
	
	echo "</fieldset> <br/> <br/> ";
}

echo "<input type='submit' name='Proceed2' value='Pay'>";
	
    echo "<input type='hidden' name='train_no' value=$_POST[train_no]>";
	echo "<input type='hidden' name='train_name' value=$_POST[train_name]>";
	echo "<input type='hidden' name='start_station' value=$_POST[start_station]>";
	echo "<input type='hidden' name='stop_station' value=$_POST[stop_station]>";
	echo "<input type='hidden' name='departure_time' value=$_POST[departure_time]>";
	echo "<input type='hidden' name='arrival_time' value=$_POST[arrival_time]>";
	echo "<input type='hidden' name='class' value=$_POST[class]>";
	echo "<input type='hidden' name='date' value=$_POST[date]>";
	echo "<input type='hidden' name='seats' value=$seats>";
	echo "<input type='hidden' name='payment_amount' value=$payment_amount>";

echo "</form>";
echo "</form> </body> </html>";
?>