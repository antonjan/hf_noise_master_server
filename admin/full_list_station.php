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
$sql = "SELECT * FROM `Remote_Station`";
$result = $conn->query($sql);
echo "<table border = \"1\">";
if ($result->num_rows > 0) {
    // output data of each row
echo "<tr>";
echo "<td>ID</td><td>Call sign</td><td>Remote Station Coordinates</td><td>Email Address</td><td>SMS Number</td><td>Address 1</td><td>Address 2</td><td>Address 3</td><td>Postal Code</td><td>Enabled</td><td>Date enabled</td><td>Login Retry</td>";
echo "</tr>";
    while($row = $result->fetch_assoc()) {
echo "<tr>";
echo "<td>" . $row["Remote_Station_ID"]. "</td><td><a href=\"edit_station.php?call_sign=". $row["Station_Call_sign"]."\">" . $row["Station_Call_sign"]. "</a></td><td> " . $row["Remote_station_coordinates"]. "</td><td>". $row["Remote_station_Email_Address"]."</td><td>". $row["Remote_Station_SMS_Number"]."</td><td>". $row["Remote_Station_Address_1"]. "</td><td>". $row["Remote_Station_Address_2"]. "</td><td>". $row["Remote_Station_Address_3"]. "</td><td>". $row["Remote_Station_Postal_Code"]. "</td><td>". $row["Remote_Station_Enabled"]. "</td><td>". $row["Remote_Station_date_enabled"]. "</td><td>". $row["Remote_Station_login_Key_retry_count"]."</td>";
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

