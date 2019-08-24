<?php
?>
<!DOCTYPE html>
<html>
<head>
<link href="/style.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>

<!-- Navigation -->
<?php include "menu.php"; ?>

<div class="main-container full-width">
	<div class="site-width">

		<div class="content-container top-box">
            
            <h3 class="align-center" style="margin-bottom: 5px; font-size: 18px;">SOUTHERN AFRICAN AMATEUR RADIO SATELLITE ASSOCIATION</h3>
            <h2 class="align-center" style="margin-top: 10px;">RF Noise Monitoring System</h2>   
            <div class="seperator"></div>         
            <!-- <h2 class="align-center">AMSATSA RF Noise Monitoring System</h2> -->
            
            <div class="intro-box">
                <p class="align-center intro-p">The purpose of this system is to record radio noise interference signals on the 1-30Mhz HF band.<br>
                This system consists of several remote stations, running a Linux operating system either on a Raspberry Pi or on a laptop with an RTL dongle, recording HF noise at the moment.</p>
                
                <div class="btn-box">
                    <a class="btn" href='http://rfnoise.amsatsa.org.za/about_us.php'>READ MORE</a>
                    <a class="btn btn-trans" href='#map'>VIEW STATIONS</a>
                </div>
               
            </div>
        </div><!-- content-container -->

    </div> <!-- site-width -->
</div> <!-- main-container --> 


<div id="map"></div><!-- Map -->

<?php

echo "    <script>\n";
echo "      function initMap() {\n";
echo "        var myLatLng = {lat: -26.463, lng: 28.044};\n";
//echo "        var station1 = {lat: -27.463, lng: 28.044};\n";
echo "        var map = new google.maps.Map(document.getElementById('map'), {\n";
echo "          zoom: 6,\n";
echo "          center: myLatLng\n";
echo "        });\n";
//echo "        var marker = new google.maps.Marker({";
//echo "          position: myLatLng,";
//echo "          map: map,";
//echo "          title: 'HF noise remote stations'";
//echo "        });";

$servername = "localhost";
$username = "root";
$password = "root.amsat";
$dbname = "hfnoise";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `Remote_Station`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
echo "var pos" . $row["Station_Call_sign"]. " = {lat:".$row["Remote_station_coordinates_lat"] .", lng:". $row["Remote_station_coordinates_long"] ."};\n";
echo "var " .$row["Station_Call_sign"]. " = new google.maps.Marker({\n";
echo "          position: pos". $row["Station_Call_sign"].",\n";
echo "          map: map,\n";
echo "          title: \"".$row["Station_Call_sign"]."\"\n";
echo " });\n";
    }
} else {
    echo "0 results\n";
}
$conn->close();
//echo "      }";
// Zoom to 9 when clicking on marker
//echo "var map = new google.maps.Map(mapCanvas, mapOptions);";
//echo "var marker = new google.maps.Marker({position:myCenter});";
//echo "var mapCanvas = document.getElementById("map");";
//echo " marker.setMap(map);";
//echo "  google.maps.event.addListener(marker,'click',function() {";
//echo "    map.setZoom(5);";
//echo "    map.setCenter(marker.getPosition());";
//echo "  });";
echo "       }\n";
echo "    </script>\n";
echo "    <script async defer src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyCCkNzmh6piXUeCaTJ5vJsnC_WuakyRkrg&callback=initMap\">\n";
echo "    </script>\n";
$servername = "localhost";
$username = "root";
$password = "root.amsat";
$dbname = "hfnoise";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `Remote_Station`";
$result = $conn->query($sql);
echo "<table class='properties-table' border = \"0\" style=\"width:100%\">";
if ($result->num_rows > 0) {
    // output data of each row
echo "<tr>\n";
echo "<th>ID</th><th>Call sign</th><th>Enabled</th><th>Date enabled</th><th>Last Update RED = Stale</th><th>Station Description</th>\n";
echo "</tr>\n";
    while($row = $result->fetch_assoc()) {
//####################### get Stale stations ###############################
$stale = '';
$dbdate = $row["Last_Data_insert"];
if (strtotime($dbdate) < strtotime("-1 day")){
	$stale = 1;
echo "<tr>\n";
echo "<td>" . $row["Remote_Station_ID"]. "</td><td><a href=\"". $row["Station_URL"]."\" target=\"_blank\">" . $row["Station_Call_sign"]. "</a></td><td>". $row["Remote_Station_Enabled"]. "</td><td>". $row["Remote_Station_date_enabled"]. "</td><td><font color=\"red\">". $row["Last_Data_insert"]. "</font></td><td>". $row["Station_Description"]."</td>\n";
echo "</tr>\n";

}else{
	$stale = 0;
echo "<tr>\n";
echo "<td>" . $row["Remote_Station_ID"]. "</td><td><a href=\"". $row["Station_URL"]."\" target=\"_blank\">" . $row["Station_Call_sign"]. "</a></td><td>". $row["Remote_Station_Enabled"]. "</td><td>". $row["Remote_Station_date_enabled"]. "</td><td>". $row["Last_Data_insert"]. "</td><td>". $row["Station_Description"]."</td>\n";
echo "</tr>\n";

}
    }
} else {
    echo "0 results";
}
echo "</table>\n";
$conn->close();
include("counter.php");


// echo "<img src='http://rfnoise.amsatsa.org.za/noise-bg.jpg'>\n";


echo "</body>\n";
echo "</html>\n";
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>
    $('a[href*="#"]:not([href="#"]):not([href="#show"]):not([href="#hide"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 500);
				return false;
			}
		}
	});
</script>