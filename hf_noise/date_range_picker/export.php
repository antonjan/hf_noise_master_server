<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=export.csv');
$servername = "localhost";
$username = "rfnoise";
$password = "djd89%jk0G4#";
$dbname = "rfnoise";
$conn = new mysqli($servername, $username, $password, $dbname);

//	$conn = mysqli_connect("localhost", "rfnoise", "djd89%jk0G4#", "hrnoise");
	
	$post_at = "";
	$post_at_to_date = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"]["post_at"])) {			
		$post_at = $_POST["search"]["post_at"];
		list($fid,$fim,$fiy) = explode("-",$post_at);
		
		$post_at_todate = date('Y-m-d');
		if(!empty($_POST["search"]["post_at_to_date"])) {
			$post_at_to_date = $_POST["search"]["post_at_to_date"];
			list($tid,$tim,$tiy) = explode("-",$_POST["search"]["post_at_to_date"]);
			$post_at_todate = "$tiy-$tim-$tid";
		}
//		$queryCondition .= "WHERE date  BETWEEN '$fiy-$fim-$fid' AND '" . $post_at_todate . "'" AND Remote_Station_ID = 'zr6aic';
		$queryCondition .= "WHERE date  BETWEEN '$fiy-$fim-$fid' AND '" . $post_at_todate . "'";
	}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

	$sql = "SELECT * from hf_noise_data " . $queryCondition . " ORDER BY id_hf_noise_data desc";
	$result = mysqli_query($conn,$sql);

//if($_GET['action'] == 'export') {
//header to give the order to the browser
// Create connection
// Check connection
echo "Id,Time,Date,Samples,1Mhz Data,2Mhz Data,3Mhz Data,4Mhz Data,5Mhz Data,6Mhz Data,7Mhz Data,8Mhz Data,9Mhz Data,10Mhz Data,11Mhz Data,12Mhz Data,13Mhz Data,14Mhz Data,15Mhz Data,16Mhz Data,17Mhz Data,18Mhz Data,19Mhz Data,20Mhz Data,21Mhz Data,22Mhz Data,23Mhz Data,24Mhz Data,25Mhz Data,26Mhz Data,27Mhz Data,28Mhz Data,29Mhz Data,Station Coordinates Lat,Station Coordinates Long,Remote Station ID\n";
//$sql = "SELECT * from hf_noise_data;";
//$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id_hf_noise_data"]. ",". $row["Time"]. ",". $row["Date"]. ",". $row["samples"]. "," . $row["1Mhz_data"]. "," . $row["2Mhz_data"]. "," . $row["3Mhz_data"]. "," . $row["4Mhz_data"]. "," . $row["5Mhz_data"]. "," . $row["6Mhz_data"]. "," . $row["7Mhz_data"]. "," . $row["8Mhz_data"]."," . $row["9Mhz_data"]."," . $row["10Mhz_data"]."," . $row["11Mhz_data"]."," . $row["12Mhz_data"]."," . $row["13Mhz_data"]. "," . $row["14Mhz_data"]."," . $row["15Mhz_data"]."," . $row["16Mhz_data"]."," . $row["17Mhz_data"]."," . $row["18Mhz_data"]."," . $row["19Mhz_data"]."," . $row["20Mhz_data"]."," . $row["21Mhz_data"]."," . $row["22Mhz_data"]."," . $row["23Mhz_data"]."," . $row["24Mhz_data"]."," . $row["25Mhz_data"]."," . $row["26Mhz_data"]."," . $row["27Mhz_data"]."," . $row["28Mhz_data"]."," . $row["29Mhz_data"].",". $row["station_coordinates_lat"].",".$row["station_coordinates_long"].",". $row["Remote_Station_ID"]."\n";
    }
} else {
    echo "0 results";
}
$conn->close();
//}
?>

