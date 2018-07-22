<?php

require 'connection.php';
$conn    = Connect();
$Remote_Station_ID    = $conn->real_escape_string($_POST['Remote_Station_ID']);
$Station_Call_sign   = $conn->real_escape_string($_POST['Station_Call_sign']);
$Remote_station_coordinates    = $conn->real_escape_string($_POST['Remote_station_coordinates']);
$Remote_station_login_Key = $conn->real_escape_string($_POST['Remote_station_login_Key']);
$Remote_station_Email_Address = $conn->real_escape_string($_POST['Remote_station_Email_Address']);
$Remote_Station_SMS_Number = $conn->real_escape_string($_POST['Remote_Station_SMS_Number']);
$Remote_Station_Address_1 = $conn->real_escape_string($_POST['Remote_Station_Address_1']);
$Remote_Station_Address_2 = $conn->real_escape_string($_POST['Remote_Station_Address_2']);
$Remote_Station_Address_3 = $conn->real_escape_string($_POST['Remote_Station_Address_3']);
$Remote_Station_Postal_Code = $conn->real_escape_string($_POST['Remote_Station_Postal_Code']);
$Remote_Station_Enabled = $conn->real_escape_string($_POST['Remote_Station_Enabled']);
$Remote_Station_date_enabled = $conn->real_escape_string($_POST['Remote_Station_date_enabled']);
$Remote_Station_login_Key_retry_count = $conn->real_escape_string($_POST['Remote_Station_login_Key_retry_count']);
$query = "INSERT INTO `Remote_Station`(`Station_Call_sign`, `Remote_station_coordinates`, `Remote_station_login_Key`, `Remote_station_Email_Address`, `Remote_Station_SMS_Number`, `Remote_Station_Address_1`, `Remote_Station_Address_2`, `Remote_Station_Address_3`, `Remote_Station_Postal_Code`, `Remote_Station_Enabled`, `Remote_Station_login_Key_retry_count`) VALUES ('" . $Station_Call_sign . "','" . $Remote_station_coordinates . "','" . $Remote_station_login_Key . "','" . $Remote_station_Email_Address . "','" . $Remote_Station_SMS_Number . "','" . $Remote_Station_Address_1 . "','" . $Remote_Station_Address_2 . "','" . $Remote_Station_Address_3 . "','". $Remote_Station_Postal_Code . "','" . $Remote_Station_Enabled . "','" . $Remote_Station_login_Key_retry_count . "' )";
echo $query;
$query2   = "INSERT into tb_cform (u_name,u_email,subj,message) VALUES('" . $name . "','" . $email . "','" . $subj . "','" . $message . "')";
$success = $conn->query($query);

if (!$success) {
    die("Couldn't enter data: ".$conn->error);

}

echo "Thank You For Contacting Us <br>";

$conn->close();

?>
