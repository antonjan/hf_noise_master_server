<?php
echo "<html>";
echo "<head>";
echo "<title>Adding Remote Station</title>";
echo "</head>";
echo "<body>";
echo "<h3>List of Stations</h3>";
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

echo "</form>";
echo "</body>";
echo "</html>";
?>

