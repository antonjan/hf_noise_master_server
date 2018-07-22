<?php
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
echo " <h3>Add user</h3>";
echo " <form action=\"add_station.php\" method=\"post\">";

echo "   Station Call Sign:<br>";
echo "   <input type=\"text\" name=\"Station_Call_sign\" required><br>";

echo "   Remote station coordinates Lat:<br>";
echo "   <input type=\"text\" name=\"Remote_station_coordinates_lat\" required><br>";

echo "   Remote station coordinates Long:<br>";
echo "   <input type=\"text\" name=\"Remote_station_coordinates_long\" required><br>";

echo "   Remote_station_login_Key:<br>";
echo "   <input type=\"hididen\" name=\"Remote_station_login_Key\" required><br>";

echo "   Remote_station_Email_Address :<br>";
echo "   <input type=\"email\" name=\"Remote_station_Email_Address\" required><br>";

echo "   Remote_Station_SMS_Number:<br>";
echo "   <input type=\"text\" name=\"Remote_Station_SMS_Number\" required><br>";

echo "   Remote_Station_Address_1:<br>";
echo "   <input type=\"text\" name=\"Remote_Station_Address_1\" required><br>";

echo "   Remote_Station_Address_2 :<br>";
echo "   <input type=\"text\" name=\"Remote_Station_Address_2\" required><br>";
 
echo "   Remote_Station_Address_3 :<br>";
echo "   <input type=\"text\" name=\"Remote_Station_Address_3\" ><br>";

echo "   Remote_Station_Postal_Code :<br>";
echo "   <input type=\"text\" name=\"Remote_Station_Postal_Code\" required><br>";

echo "   Remote_Station_Enabled :<br>";
echo "   <input type=\"number\" name=\"Remote_Station_Enabled\" required><br>";

echo "   Remote_Station_login_Key_retry_count :<br>";
echo "   <input type=\"number\" name=\"Remote_Station_login_Key_retry_count\" required><br>";

echo " <input type=\"submit\" value=\"Submit\"><br>";
echo " </form>";
echo " </body>";
echo " </html>";

