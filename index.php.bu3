<?php
echo "<html>";
echo "<style>";
echo "      /* Always set the map height explicitly to define the size of the div";
echo "       * element that contains the map. */";
echo "      #map {";
echo "        height: 80%;";
echo "      }";
echo "      /* Optional: Makes the sample page fill the window. */";
echo "      html, body {";
echo "        height: 100%;";
echo "        margin: 0;";
echo "        padding: 0;";
echo "      }";
echo "    </style>";
echo "  </head>";
echo "  <body>";
include "menu.php";
echo "    <div id=\"map\"></div>";
echo "    <script>";
echo "      function initMap() {";
echo "        var myLatLng = {lat: -26.463, lng: 28.044};";
//echo "        var station1 = {lat: -27.463, lng: 28.044};";
echo "        var map = new google.maps.Map(document.getElementById('map'), {";
echo "          zoom: 6,";
echo "          center: myLatLng";
echo "        });";
//echo "        var marker = new google.maps.Marker({";
//echo "          position: myLatLng,";
//echo "          map: map,";
//echo "          title: 'HF noise remote stations'";
//echo "        });";

$servername = "localhost";
$username = "root";
$password = "mysql123";
$dbname = "hf_noise";

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
echo "var pos" . $row["Station_Call_sign"]. " = {lat:".$row["Remote_station_coordinates_lat"] .", lng:". $row["Remote_station_coordinates_long"] ."};";
echo "var " .$row["Station_Call_sign"]. " = new google.maps.Marker({";
echo "          position: pos". $row["Station_Call_sign"].",";
echo "          map: map,";
echo "          title: \"".$row["Station_Call_sign"]."\"";
echo " });";
    }
} else {
    echo "0 results";
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
echo "       }";
echo "    </script>";
echo "    <script async defer src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyDZaf2m_PtVBRoD1hYP510tyYZorJ7z9XE&callback=initMap\">";
echo "    </script>";
$servername = "localhost";
$username = "root";
$password = "mysql123";
$dbname = "hf_noise";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `Remote_Station`";
$result = $conn->query($sql);
echo "<table border = \"1\" style=\"width:100%\">";
if ($result->num_rows > 0) {
    // output data of each row
echo "<tr>";
echo "<td>ID</td><td>Call sign</td><td>Enabled</td><td>Date enabled</td><td>Station Description</td>";
echo "</tr>";
    while($row = $result->fetch_assoc()) {
echo "<tr>";
echo "<td>" . $row["Remote_Station_ID"]. "</td><td><a href=\"". $row["Station_URL"]."\" target=\"_blank\">" . $row["Station_Call_sign"]. "</a></td><td>". $row["Remote_Station_Enabled"]. "</td><td>". $row["Remote_Station_date_enabled"]. "</td><td>". $row["Station_Description"]."</td>";
echo "</tr>";
    }
} else {
    echo "0 results";
}
echo "</table>";
$conn->close();

echo "</body>";
echo "</html>";
?>

