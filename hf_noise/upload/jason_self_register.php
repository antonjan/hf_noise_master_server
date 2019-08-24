<?php
//echo "Got request to insert into db<br> ";
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
//mysqli_close($link);
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
//      echo "#############################################################";
//      echo "line" . var_dump($lines). "<br>";
    $field_names = explode($delimiter, array_shift($lines));
//	echo "field names" . var_dump($field_names);
//       echo "***********************************************************";
//	echo "item0 = ",$field_names[0];
//	echo "field count " .count($field_names). " ";
	$ip_Adress = get_client_ip();
	$curr_timestamp = date('Y-m-d H:i:s');
	//echo "field " . $fields[0] . " " .$fields[1] ." ".$fields[3] ." " .$fields[3] ." " . "<br>";
	$sql = "INSERT INTO Remote_station_reg_status (`Station_Machine_ID`, `Station_CPU_ID`, `Callsign`,`IP_Address`, `Time_Stamp`) VALUES ('".$field_names[0]."','".$field_names[1]."','".$field_names[2]."','".$ip_Adress."','".$curr_timestamp."')";
	if(mysqli_query($link, $sql)){
 //   		echo "Records inserted successfully.";
	} else{
   	 echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
	}
//echo "<br>";
	$sql2 = "SELECT * FROM hfnoise.Remote_Station where Station_Call_sign = '".$field_names[2]."'";
//	echo $sql2;
//	$result = $conn->query($sql);
// if(mysqli_query($link, $sql2)){
//                echo "Reading  Station _config.";
//       } else{
//         echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
//        }
$result = mysqli_query($link,$sql2);
     //execute SQL statement 
     
	if (!$result)     
		die("Database access failed: " . mysqli_error()); 
    	//output error message if query execution failed 
        
		$rows = mysqli_num_rows($result); 
   		// get number of rows returned 
 /*
[station_details]
Call_sign = calsign ;Station_Call_sign
Pass_Key = 1234 ;Remote_station_login_Key
GPS_Lat = -26.34;Remote_station_coordinates_lat
GPS_Long = 27.3;Remote_station_coordinates_long
Minute = 27 ;Minutes  Minutes for upload
Hour = 23 ;Houre for upload
Bandwith = 1000 ;bandwith in Khz
Antenna_Switch = Y;Antenna_switch
SDR_Type = 0;rtl_sdr sdrplay hackrf adalm_pluto ....
Frequency_Bin = 1000 ;1000 = 1Mhz
Band_1 = Y ;hf 6m 2m 70cm
Band_2 = N
Band_3 = N
Band_4 = N
Band_5 = N
Band_6 = N
Band_7 = N
Band_8 = N
Antenna_Type = 0 ;0 = long wire 1 = Active type 1 2= Active type 2 ....
Station_Machine_ID = *

*/   
	if ($rows) {     
	while ($row = mysqli_fetch_array($result)) {         
		echo  $row['Station_Call_sign'].",".$row['Remote_station_coordinates_lat'].",".$row['Remote_station_coordinates_long'].",".$row['Remote_station_login_Key'].",".$row['SDR_type'].",".$row['Antenna_Type'].",".$row['Antenna_switch'].",".$row['Frequency_bin'].",".$row['Band_1'].",".$row['Minutes'].",".$row['Hour'];
        }
}	
mysqli_close($link);

     // return $fields;
       return ; 
}
// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>

