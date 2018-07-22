<?php
session_start();
$_SESSION = array();

include("captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
$_SESSION['capture_temp_code'] = $_SESSION['captcha']['code'];
//print_r($_SESSION);
echo "<html>";
echo "  <style>";
echo "  .menu {";
echo "     float:left;";
echo "      width:100%;";
echo "     height:50;";
echo "   }";
echo "   .mainContent {";
echo "     float:left;";
echo "     width:100%;";
echo "     height:100%;";
echo "   }";
echo "  </style>";
echo " <body>";
include "menu.php";
//echo "____________________________";
//echo " session " .$_SESSION['captcha']['code']."\n";
//echo "____________________________";
echo " <h3>Register your Remote Monitoring Station</h3>";
echo " By adding your HF Noise monitoring system to the main Server will allow you to have your station linked to the main index page and will put your station postion on the google map.<br> You will also a security Key that you will need to add to your remote ststion via an SMS for your station to allow it to push the rf_noise measurment recordings to the main server so it could be added and corelated with all the other station measuremt iformation.<br>";
echo " After registration you will receive a SMS with Key and e-mail with your Remote station configeration instructions<br>";
echo " <form action=\"add_reg_station.php\" method=\"post\">";
echo "<hr>";
//echo " <div data-tip=\"Dont use - in calsign\">";
echo "   Station Call Sign: ";
echo "   <input type=\"text\" name=\"Station_Call_sign\" placeholder=\"ZS6ZZZ\" required> Dont use \"-\" in calsign<br>";
//echo "</div>";
echo "   Station coordinates Lat: ";
echo "   <input type=\"text\" name=\"Remote_station_coordinates_lat\" placeholder=\"-26.34\" required><br>";

echo "   Station coordinates Long: ";
echo "   <input type=\"text\" name=\"Remote_station_coordinates_long\" placeholder=\"27.3\" required><br>";

echo "   Station URL: ";
echo "   <input type=\"text\" name=\"Station_URL\" placeholder=\"http://domin.com\" required><br>";

echo "   Station Email Address : ";
echo "   <input type=\"email\" name=\"Remote_station_Email_Address\" placeholder=\"myname@domain.com\" required><br>";

echo "   Station SMS_Number: ";
echo "   <input type=\"text\" name=\"Remote_Station_SMS_Number\" placeholder=\"0830000000\" required><br>";

echo "   Station Address 1: ";
echo "   <input type=\"text\" name=\"Remote_Station_Address_1\" placeholder=\"1 Street\" required><br>";

echo "   Station Address 2 : ";
echo "   <input type=\"text\" name=\"Remote_Station_Address_2\" placeholder=\"Town\" required><br>";
 
echo "   Station Address 3 : ";
echo "   <input type=\"text\" name=\"Remote_Station_Address_3\" ><br>";

echo "   Station Postal Code : ";
echo "   <input type=\"text\" name=\"Remote_Station_Postal_Code\" placeholder=\"1000\" required><br>";

echo "   Station Description :";
echo "   <input type=\"text\" name=\"Station_Description\" placeholder=\"My station is this and use this antenna\" required><br>";

echo " <img src=\"" . $_SESSION['captcha']['image_src'] ."\"><br>";
echo "   Enter Captcha :";
echo "   <input type=\"text\" name=\"Captcha\" required>";
//echo "jjj=" . $_SESSION['captcha']['image_src'] ;
//echo " <img src=\"" . $_SESSION['captcha']['image_src'] ."\"><br>";
//echo "   Remote_Station_login_Key_retry_count :<br>";
//echo "   <input type=\"number\" name=\"Remote_Station_login_Key_retry_count\" required><br>";

echo " <input type=\"submit\" value=\"Submit\"><br>";
echo " </form>";
echo " </body>";
echo " </html>";

