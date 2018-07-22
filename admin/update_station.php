<?php
echo "<html>";
echo "<body>";
include "menu.php";
require 'connection.php';
$conn    = Connect();
//$Remote_Station_ID    = $conn->real_escape_string($_POST['Remote_Station_ID']);
$Station_Call_sign   = $conn->real_escape_string($_POST['Station_Call_sign']);
$Remote_station_coordinates_lat = $conn->real_escape_string($_POST['Remote_station_coordinates_lat']);
$Remote_station_coordinates_long = $conn->real_escape_string($_POST['Remote_station_coordinates_long']);
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
//$query = "INSERT INTO `Remote_Station`(`Station_Call_sign`, `Remote_station_coordinates`, `Remote_station_login_Key`, `Remote_station_Email_Address`, `Remote_Station_SMS_Number`, `Remote_Station_Address_1`, `Remote_Station_Address_2`, `Remote_Station_Address_3`, `Remote_Station_Postal_Code`, `Remote_Station_Enabled`, `Remote_Station_login_Key_retry_count`) VALUES ('" . $Station_Call_sign . "','" . $Remote_station_coordinates . "','" . $Remote_station_login_Key . "','" . $Remote_station_Email_Address . "','" . $Remote_Station_SMS_Number . "','" . $Remote_Station_Address_1 . "','" . $Remote_Station_Address_2 . "','" . $Remote_Station_Address_3 . "','". $Remote_Station_Postal_Code . "','" . $Remote_Station_Enabled . "','" . $Remote_Station_login_Key_retry_count . "' )";

//UPDATE Remote_Station SET Station_Call_sign='zr6aic',Remote_station_coordinates_lat='-26.463',Remote_station_coordinates_long='28.044',Remote_station_login_Key='1234567890-0987654321',Remote_station_Email_Address='anton.janovsky@gmail.com',Remote_Station_SMS_Number='27834086594',Remote_Station_Address_1='19 Witstinkhout ave',Remote_Station_Address_2='Bassonia',Remote_Station_Address_3='Johanneburg',Remote_Station_Postal_Code='2061',Remote_Station_Enabled='1',Remote_Station_login_Key_retry_count='0' WHERE Station_Call_sign='zr6aic'

$query ="UPDATE Remote_Station SET Station_Call_sign='" . $Station_Call_sign . "',Remote_station_coordinates_lat='". $Remote_station_coordinates_lat ."',Remote_station_coordinates_long='". $Remote_station_coordinates_long . "',Remote_station_login_Key='" . $Remote_station_login_Key . "',Remote_station_Email_Address='" . $Remote_station_Email_Address . "',Remote_Station_SMS_Number='". $Remote_Station_SMS_Number ."',Remote_Station_Address_1='" .$Remote_Station_Address_1 . "',Remote_Station_Address_2='".$Remote_Station_Address_2 ."',Remote_Station_Address_3='" . $Remote_Station_Address_3  . "',Remote_Station_Postal_Code='" .$Remote_Station_Postal_Code  .  "',Remote_Station_Enabled='" .$Remote_Station_Enabled .  "',Remote_Station_login_Key_retry_count='".$Remote_Station_login_Key_retry_count . "' WHERE Station_Call_sign='" . $Station_Call_sign ."'";
//echo $query;
//$query2   = "INSERT into tb_cform (u_name,u_email,subj,message) VALUES('" . $name . "','" . $email . "','" . $subj . "','" . $message . "')";
$success = $conn->query($query);

if (!$success) {
    die("Couldn't enter data: ".$conn->error);
echo "Could not update information";
}

echo "Thank You For  updating the infromation <br>";
//echo " <iframe src=\"full_list_station.php\"></iframe>";
$conn->close();
echo "</body>";
echo "</html>";
?>

