<?php
echo "<html>";
echo "<head>";
echo "<title>Adding Remote Station</title>";
echo "</head>";
echo "<body>";
include "menu.php";
echo "<h3>Edit Station</h3>";
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
$sql = "SELECT * FROM `Remote_station_reg_status` ORDER BY `Time_Stamp` DESC LIMIT 1000";
$result = $conn->query($sql);
echo "<table border = \"1\">";
if ($result->num_rows > 0) {
    // output data of each row
echo "<tr>";
echo "<td>ID</td><td>CPU ID</td><td>CPU ID</td><td>Call Sign</td><td>IP Adress</td><td>Time Stamp</td>";
echo "</tr>";
    while($row = $result->fetch_assoc()) {
echo "<tr>";
echo "<td>" . $row["id"]. "</td><td>". $row["Station_Machine_ID"]."</td><td>" . $row["Station_CPU_ID"]. "</td><td><a href=\"edit_station.php?call_sign=" . $row["Callsign"]. "\">". $row["Callsign"]."</a></td><td><a href=\"http://api.geoiplookup.net/?query=". $row["IP_Address"]."\" target=\"_blank\">". $row["IP_Address"]. "</td><td>". $row["Time_Stamp"]."</td>";
echo "</tr>";
    }
} else {
    echo "0 results";
}
echo "</table>";
$conn->close();

echo "</form>";
echo "</body>";
echo "</html>";
?>

