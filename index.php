<?php

echo "<!DOCTYPE html>";
echo "<html>\n";
echo "<style>\n";
echo "      /* Always set the map height explicitly to define the size of the div\n";
echo "       * element that contains the map. */\n";
echo "      #map {";
echo "        height: 80%;\n";
echo "      }";
echo "      /* Optional: Makes the sample page fill the window. */\n";
echo "      html, body {\n";
echo "        height: 100%;\n";
echo "        margin: 0;\n";
echo "        padding: 0;\n";
echo "      }\n";
//echo "    </style>\n";
echo "		tr:nth-of-type(odd) {\n";
echo "      background-color:#ccc;\n";
echo "    }\n";
echo "</style>\n";
echo "  </head>\n";
echo "  <body>\n";
include "menu.php";
echo "  <h3>This is a radio noise interference monitoring system.</h3>\n";
echo "  <p>The purpose of this system is to record radio interference signals on the 1-30Mhz HF band.<br>More information is available in the <a href='http://rfnoise.amsatsa.org.za/about_us.html'>ABOUT US</a> section.</p>\n";
echo "    <div style='height:600px;' id=\"map\"></div>\n";
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
echo "<table border = \"0\" style=\"width:100%\">";
if ($result->num_rows > 0) {
    // output data of each row
echo "<tr>\n";
echo "<td>ID</td><td>Call sign</td><td>Enabled</td><td>Date enabled</td><td>Last Update RED = Stale</td><td>Station Description</td>\n";
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

echo "</body>\n";
echo "</html>\n";
?>

