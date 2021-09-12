<?php
include "connection_dbms.php"; //the connection file we created



  if(empty($_POST['start_station'])){
	echo "<script type=\"text/javascript\">window.alert('Enter a 'From' station.')</script>";
  }
  else if(empty($_POST['stop_station'])){
	echo "<script type=\"text/javascript\">window.alert('Enter a 'To' station.')</script>";
	echo "window.location.href='login2.html'";
  }
	
$result1 = mysqli_query($db, "select train_no, train_name from train where start_station in (select station_id from station where station_name='$_POST[start_station]')  and stop_station in (select station_id from station where station_name='$_POST[stop_station]') and train_no in (select train_no from class where date='$_POST[journey_date]' and $_POST[class]>0)") or die(mysqli_error($db));
$result2 = mysqli_query($db, "select departure_time, arrival_time from train where start_station in (select station_id from station where station_name='$_POST[start_station]')  and stop_station in (select station_id from station where station_name='$_POST[stop_station]') and train_no in (select train_no from class where date='$_POST[journey_date]' and $_POST[class]>0)") or die(mysqli_error($db));
 
 
echo "<head>\n";
echo "    <meta charset=\"utf-8\">\n";
echo "    <title>National Railway Reservation</title>\n";
echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
echo "    <meta name=\"description\" content=\"\">\n";
echo "    <meta name=\"author\" content=\"\">\n";
echo "<!--Less styles -->\n";
echo "   <!-- Other Less css file //different less files has different color scheam\n";
echo "	<link rel=\"stylesheet/less\" type=\"text/css\" href=\"themes/less/simplex.less\">\n";
echo "	<link rel=\"stylesheet/less\" type=\"text/css\" href=\"themes/less/classified.less\">\n";
echo "	<link rel=\"stylesheet/less\" type=\"text/css\" href=\"themes/less/amelia.less\">  MOVE DOWN TO activate\n";
echo "	-->\n";
echo "	<script type=\"text/javascript\" src=\"https://gc.kis.v2.scr.kaspersky-labs.com/2A4F4061-B43B-BF40-94BC-442F52DACF10/main.js\" charset=\"UTF-8\"></script></head>\n";
echo "	<!--<link rel=\"stylesheet/less\" type=\"text/css\" href=\"themes/less/bootshop.less\">\n";
echo "	<script src=\"themes/js/less.js\" type=\"text/javascript\"></script> -->\n";
echo "\n";
echo "<!-- Bootstrap style -->\n";
echo "    <link id=\"callCss\" rel=\"stylesheet\" href=\"themes/bootshop/bootstrap.min.css\" media=\"screen\"/>\n";
echo "    <link href=\"themes/css/base.css\" rel=\"stylesheet\" media=\"screen\"/>\n";
echo "<!-- Bootstrap style responsive -->\n";
echo "	<!-- <link href=\"themes/css/bootstrap-responsive.min.css\" rel=\"stylesheet\"/> -->\n";
echo "	<!-- <link href=\"themes/css/font-awesome.css\" rel=\"stylesheet\" type=\"text/css\"> -->\n";
echo "<!-- Google-code-prettify -->\n";
echo "	<link href=\"themes/js/google-code-prettify/prettify.css\" rel=\"stylesheet\"/>\n";
echo "<!-- fav and touch icons -->\n";
echo "    <link rel=\"shortcut icon\" href=\"themes/images/ico/favicon.ico\">\n";
echo "    <link rel=\"apple-touch-icon-precomposed\" sizes=\"144x144\" href=\"themes/images/ico/apple-touch-icon-144-precomposed.png\">\n";
echo "    <!-- <link rel=\"apple-touch-icon-precomposed\" sizes=\"114x114\" href=\"themes/images/ico/apple-touch-icon-114-precomposed.png\"> -->\n";
echo "    <link rel=\"apple-touch-icon-precomposed\" sizes=\"72x72\" href=\"themes/images/ico/apple-touch-icon-72-precomposed.png\">\n";
echo "    <link rel=\"apple-touch-icon-precomposed\" href=\"themes/images/ico/apple-touch-icon-57-precomposed.png\">\n";
echo '<link rel=\'stylesheet\' href=\'https://unpkg.com/purecss@1.0.0/build/pure-min.css\' integrity=\'sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w\' crossorigin=\'anonymous\'>';
echo "	<style type=\"text/css\" id=\"enject\"></style>\n";
echo "  <!--Import Google Icon Font-->\n";
echo " \n";
echo "     <!--Let browser know website is optimized for mobile-->\n";
echo "     <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>\n";
echo "</head>";
echo "<body>\n";
echo " <script type=\"text/javascript\" src=\"https://code.jquery.com/jquery-3.2.1.min.js\"></script>\n";
echo "<div id=\"header\">\n";
echo "\n";
echo "<!-- Navbar ================================================== -->\n";
echo "<div id=\"logoArea\" class=\"navbar\">\n";
echo "<a id=\"smallScreen\" data-target=\"#topMenu\" data-toggle=\"collapse\" class=\"btn btn-navbar\">\n";
echo "	<span class=\"icon-bar\"></span>\n";
echo "	<span class=\"icon-bar\"></span>\n";
echo "	<span class=\"icon-bar\"></span>\n";
echo "</a>\n";
echo "  <div class=\"navbar-inner\">\n";
echo "    <a class=\"brand\" href=\"index.html\" style=\"color:#ffffff;font-size:20px\">National Railway Reservation System</a>\n";
echo "\n";
echo "    <ul id=\"topMenu\" class=\"nav pull-right\">\n";
echo "	 <li class=\"\"><a href=\"login2.html\">Login</a></li>\n";
echo "	 <li class=\"\"><a href=\"signup.html\">Register</a></li>\n";
echo "	 <li class=\"\"><a href=\"contact.html\">Contact</a></li>\n";
echo "	 <li class=\"\">\n";
echo "	</li>\n";
echo "    </ul>\n";
echo "  </div>\n";
echo "</div>\n";
echo "</div>\n";
echo "<!-- Header End====================================================================== -->\n";
echo "<div id=\"mainBody\">\n";
echo "	<div class=\"container\">\n";
echo "    <ul class=\"breadcrumb\">\n";
echo "		<li><a href=\"train_enquiry.html\">Home</a> /<span class=\"divider\"></span></li>\n";
echo "      <li class=\"active\">Book_Tickets</li>\n";
echo "    </ul>\n";
echo "	<h3 style='padding-left:400px;'> Available Trains </h3>\n";
echo "	<div class=\"span4\"></div><hr class=\"soft\"/>\n";
echo "<center>\n";

if($result1->num_rows>0){
echo "<br/> <br/> <br/>";
 echo "<center> <table id='train_enquiry' border='4' class='pure-table pure-table-bordered' cellspacing='0'>

            <tr>
            <th>Train Number</th>
            <th>Train Name</th>
			<th>Source</th>
			<th>Destination</th>
			<th>Departure time </th>
			<th>Arrival time</th>
			<th>Class</th>
			<th>Date</th>
			<th>Booking option</th>
			
            </tr>";	

while($row1 = mysqli_fetch_assoc($result1) AND $row2 = mysqli_fetch_assoc($result2)){
	echo "<tr><form method='POST' action='book_ticket.php'>";
	echo "<td>" . $row1['train_no'] . "</td>";
	echo "<td>" . $row1['train_name'] . "</td>";
	echo "<td>" . $_POST['start_station'] . "</td>";
	echo "<td>" . $_POST['stop_station'] . "</td>";
	echo "<td>" . $row2['departure_time'] . "</td>";
	echo "<td>" . $row2['arrival_time'] . "</td>";
	echo "<td>" . $_POST['class'] . "</td>";
	echo "<td>" . $_POST['journey_date'] . "</td>";
	echo "<td>" . "<input type='submit' name='insert' value='Book' class='waves-effect waves-light btn' style='color:#df421f;font-size:14px;'>" . "</td>";
	echo "<input type='hidden' name='train_no' value=$row1[train_no]>";
	echo "<input type='hidden' name='train_name' value=$row1[train_name]>";
	echo "<input type='hidden' name='start_station' value=$_POST[start_station]>";
	echo "<input type='hidden' name='stop_station' value=$_POST[stop_station]>";
	echo "<input type='hidden' name='departure_time' value=$row2[departure_time]>";
	echo "<input type='hidden' name='arrival_time' value=$row2[arrival_time]>";
	echo "<input type='hidden' name='class' value=$_POST[class]>";
	echo "<input type='hidden' name='date' value=$_POST[journey_date]>";
	echo "</form>";
	echo "</tr>";
}
echo "</table> </center>";
}

else{
	echo "<script type=\"text/javascript\">alert(\"No trains available for your query. Search for other dates!\");</script>";
	echo "No available trains";
}
echo "</center>\n";
echo "\n";
echo "</div>";
echo "</div>\n";
echo "<!-- MainBody End ============================= -->\n";
echo "\n";
echo "</body>";
   
?>