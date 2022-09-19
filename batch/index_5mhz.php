<?php
$success = null;
#$conn = mysqli_connect("localhost", "root", "root.amsat", "hfnoise") or die("db connection error");
$conn = mysqli_connect("localhost", "rfnoise", "djd89%jk0G4#", "rfnoise") or die("db connection error");
$result2 = mysqli_query($conn,"SELECT DISTINCT Remote_Station_ID FROM rfnoise.hf_noise_data;");
$data_set = "";
$station_IDs= array();
while($row = mysqli_fetch_array($result2)) {
	$id = trim ( $row["Remote_Station_ID"]);  //$row["Remote_Station_ID"];
	$data_set .= ",".$id;
	//echo " ====== ".$id;
	array_push($station_IDs,$id);
}
$data_set .= "\n";
echo " station id array ".print_r($station_IDs)."######<br>";
$temp_Data_Araay = array();
//$scores = [1,2,3,4,9];
foreach ($station_IDs as &$station_ID) {
	echo "station id = " .$station_ID. "\n";
}

$result = mysqli_query($conn,"SELECT Remote_Station_ID,Date,Time,5Mhz_data from hf_noise_data ORDER BY Date desc ,Time  desc LIMIT 20000;");
 while($row = mysqli_fetch_array($result)) {
//      $id = $row["id_hf_noise_data"];
        $remote_ID =  trim ( $row["Remote_Station_ID"]);  // $row["Remote_Station_ID"];
        $Date = date("Y/m/d", strtotime($row["Date"]));//$row["Date"]; //Date format new Date(Date.UTC(y, m, d, hh + n, 0, 0 EG 2009/07/25 08:0o
        $Time = $row["Time"]; 
        $D1Mhz = $row["5Mhz_data"];
	//$int1 = floatval($D1Mhz);
	$min = $D1Mhz - 3;
        $max = $D1Mhz + 3;
	$temp_Data_Araay = array(",",",",",",",",",",",");
	//************************************************************* 
	//foreach ($station_IDs as &$station_ID) {
	$array_count = sizeof($station_IDs) -1;
	echo "array count" .$array_count."\n";
	for ($x = 0; $x <= $array_count ; $x++){
			//echo "station id = " .$station_IDs[$x]. " and ".$remote_ID. "\n";
			if (strcasecmp($remote_ID, $station_IDs[$x]) == 0) {
				echo "station id2 = " .$station_IDs[$x]. " and ".$remote_ID. "\n";
				//echo " array 000 " .$station_ID[0]. " ".$Date ." ". $Time.",".$min.";".$D1Mhz.";".$max ."<br>";
    				//$data_set .= $Date ." ". $Time.",".$min.";".$D1Mhz.";".$max."\n";
				$begin_of_string = str_repeat(",", $x+1);
				$end_of_string = str_repeat(",", $array_count - $x);
        			//$temp_Data_Araay[$x] = $Date ." ". $Time.",".$min.";".$D1Mhz.";".$max .",,,\n";
				$temp_Data_Araay[$x] = $Date ." ". $Time.$begin_of_string.$min.";".$D1Mhz.";".$max .$end_of_string."\n";
				echo "array = ".$x ." ".$temp_Data_Araay[$x];
        			$data_set .= $temp_Data_Araay[$x];
			} else {
			echo "done";
			}
		}
}

//*************************************************************

//Date,zr6aic,zs6yz
//20070101,46;51;56,43;45;48
//20070102,43;48;52,48;56;63
echo "writing file";
//echo "<br>".$data_set;
#$file = "/home/anton/html/hf_noise/dygraphs/data_5mhz.php";
$file = "/var/www/html/rfnoise/hf_noise/dygraphs/data_5mhz.php";
file_put_contents($file, $data_set);

echo "<a href=\"".$file."\">Graph_data!</a>";

?>

</body>
</html>
