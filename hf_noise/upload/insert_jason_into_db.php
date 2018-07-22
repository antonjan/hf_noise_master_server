<?php
echo "Got request to insert into db<br> ";
$link = mysqli_connect("localhost", "root", "root.amsat", "hfnoise");
//Make sure that it is a POST request.
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    throw new Exception('Request method must be POST!');
}
//Make sure that the content type of the POST request has been set to application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if(strcasecmp($contentType, 'application/json') != 0){
    throw new Exception('Content type must be: application/json');
}
//Receive the RAW post data.
$content = trim(file_get_contents('php://input'));

$decoded = parse_csv('php://input', array("to_object" => true,$link));
//echo " dump1 " . $decoded[0];
//echo " dump2 " . $decoded[1];
//echo " operation ". $data["operacion"];
//echo " content " .file_get_contents('php://input');
/* insert data into DB */
// Close connection
mysqli_close($link);
function parse_csv($file, $options = null) {
	$link = mysqli_connect("localhost", "root", "root.amsat", "hfnoise");
// Check connection
if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());
}

    $delimiter = empty($options['delimiter']) ? "," : $options['delimiter'];
    $to_object = empty($options['to_object']) ? false : true;
    $str = file_get_contents($file);
    $lines = explode("\n", $str);
//	echo "#############################################################";
//	echo "line" . var_dump($lines). "<br>";
    $field_names = explode($delimiter, array_shift($lines));
 //       echo "***********************************************************";
foreach ($lines as $line) {
        // Skip the empty line
        if (empty($line)) continue;
        $item = explode($delimiter, $line);
	echo "field count " .count($item). " ";
 if (count($item) > 2)
        {

	//echo "field " . $fields[0] . " " .$fields[1] ." ".$fields[3] ." " .$fields[3] ." " . "<br>";
	$sql = "INSERT INTO `hf_noise_data` (`Date`, `Time`, `samples`,`1Mhz_data`, `2Mhz_data`, `3Mhz_data`, `4Mhz_data`, `5Mhz_data`, `6Mhz_data`, `7Mhz_data`, `8Mhz_data`, `9Mhz_data`, `10Mhz_data`, `11Mhz_data`, `12Mhz_data`, `13Mhz_data`, `14Mhz_data`, `15Mhz_data`, `16Mhz_data`, `17Mhz_data`, `18Mhz_data`, `19Mhz_data`, `20Mhz_data`, `21Mhz_data`, `22Mhz_data`, `23Mhz_data`, `24Mhz_data`, `25Mhz_data`, `26Mhz_data`, `27Mhz_data`, `28Mhz_data`,`29Mhz_data`, `station_coordinates_lat`,`station_coordinates_long`, `Remote_Station_ID`) VALUES ('".$item[0]."','".$item[1]."','".$item[2]."','".$item[3]."','".$item[4]."','".$item[5]."','".$item[6]."','".$item[7]."','".$item[8]."','".$item[9]."','".$item[10]."','".$item[11]."','".$item[12]."','".$item[13]."','".$item[14]."','".$item[15]."','".$item[16]."','".$item[17]."','".$item[18]."','".$item[19]."','".$item[20]."','".$item[21]."','".$item[22]."','".$item[23]."','".$item[24]."','".$item[25]."','".$item[26]."','".$item[27]."','".$item[28]."','".$item[29]."','".$item[30]."','".$item[31]."','".$item[32]."','".$item[33]."','".$item[34]."')";
$curr_timestamp = date('Y-m-d H:i:s');
$sql2 = "Update `Remote_Station` SET `Last_Data_insert`=".$curr_timestamp . " WHERE `Remote_Station_ID` ="."'".$item[34] ."'" ;

	if(mysqli_query($link, $sql)){
    		echo "Records inserted successfully.";
	} else{
   	 echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
        if(mysqli_query($link, $sql2)){
                echo "Records inserted successfully.";
        } else{
         echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
        }

}

//	for ($x = 0; $x <= count($fields) ; $x++) {
//    		echo "Field " . $fields[$x]. " ";
//	} 
echo "<br>";
        }
	
    }
     // return $fields;
       return ; 
?>

