<?php
echo "<html>";
echo "<head>";
echo "<title>Edit Remote Station</title>";
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
$Station_Call_sign  = $conn->real_escape_string($_GET['call_sign']);
//echo "dd". $Station_Call_sign ;
$sql = "SELECT * FROM `Remote_Station` where Station_Call_sign = '" . $Station_Call_sign . "'";
echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
echo "<form action=\"update_station.php\" method=\"post\">";
echo "  Remote_station_id: ";
echo " " .$row["Remote_Station_ID"]." <br>";

echo "  Station Call Sign: ";
echo "  <input type=\"text\" name=\"Station_Call_sign\" value=\"". $row["Station_Call_sign"] ."\" required><br>";

echo "  Remote station coordinates lat: ";
echo "  <input type=\"text\" name=\"Remote_station_coordinates_lat\" value=\"". $row["Remote_station_coordinates_lat"]. "\" required><br>";

echo "  Remote station coordinates long: ";
echo "  <input type=\"text\" name=\"Remote_station_coordinates_long\" value=\"". $row["Remote_station_coordinates_long"]. "\" required><br>";

echo "  Remote_station_login_Key: ";
echo "  <input type=\"hididen\" name=\"Remote_station_login_Key\" value=\"". $row["Remote_station_login_Key"]. "\" required><br>";

echo "  Remote_station_Email_Address : ";
echo "  <input type=\"email\" name=\"Remote_station_Email_Address\" value=\"". $row["Remote_station_Email_Address"]. "\" required><br>";

echo "  Remote_Station_SMS_Number: ";
echo "  <input type=\"text\" name=\"Remote_Station_SMS_Number\" value=\"". $row["Remote_Station_SMS_Number"]. "\" required><br>";

echo "  Remote_Station_Address_1: ";
echo "  <input type=\"text\" name=\"Remote_Station_Address_1\" value=\"". $row["Remote_Station_Address_1"]. "\" required><br>";

echo "  Remote_Station_Address_2 : ";
echo "  <input type=\"text\" name=\"Remote_Station_Address_2\" value=\"". $row["Remote_Station_Address_2"]. "\" required><br>";

echo " Remote_Station_Address_3 : ";
echo "  <input type=\"text\" name=\"Remote_Station_Address_3\" value=\"". $row["Remote_Station_Address_3"]. "\" required><br>";

echo "  Remote_Station_Postal_Code : ";
echo "  <input type=\"text\" name=\"Remote_Station_Postal_Code\" value=\"". $row["Remote_Station_Postal_Code"]. "\" required><br>";

echo "  Remote_Station_Enabled : ";
echo "  <input type=\"number\" name=\"Remote_Station_Enabled\" value=\"". $row["Remote_Station_Enabled"]. "\" required><br>";

echo "  Remote_Station_date_enabled : ";
echo "  <input type=\"text\" name=\"Remote_Station_date_enabled\" value=\"". $row["Remote_Station_date_enabled"]. "\" required><br>";

echo "  Remote_Station_login_Key_retry_count : ";
echo "  <input type=\"number\" name=\"Remote_Station_login_Key_retry_count\" value=\"". $row["Remote_Station_login_Key_retry_count"]. "\" required><br>";

echo "<input type=\"submit\" value=\"Submit\"><br>";
   }
} else {
    echo "0 results";
}
$conn->close();
echo "</form>";
echo "</body>";
echo "</html>";

