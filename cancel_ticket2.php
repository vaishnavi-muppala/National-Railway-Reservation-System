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
echo '<li class="active">Cancel Ticket &nbsp;</li>';
echo '</ul>';

$pnr = $_POST['pnr'];

$res = mysqli_query($db, "SELECT * from ticket where PNR='$pnr'") or die(mysqli_error($db));
mysqli_query($db, "DELETE from ticket where PNR='$pnr'") or die(mysqli_error($db));

if($res->num_rows>0){
	echo "<script type=\"text/javascript\">alert(\"Cancellation Successsful!\");</script>";
	echo "Ticket with PNR " . $pnr . " is cancelled successfully. ";
}
else{
	echo "<script type=\"text/javascript\">alert(\"Sorry but no ticket with this PNR exists.\");</script>";
	echo "Sorry but no ticket with this PNR exists.";
}


echo '</body> </html>';
?>