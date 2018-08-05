<?php
// PHP magic here
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>My title</title>
<link href="/style.css" media="screen" rel="stylesheet" type="text/css" />
</head>

<body>

<?php include "menu.php"; ?>

<h3>This is a radio noise interference monitoring system.</h3>
<p>The purpose of this system is to record radio interference signals on the 1-30Mhz HF band.<br>More information is available in the <a href='http://rfnoise.amsatsa.org.za/about_us.html'>ABOUT US</a> section.</p>
<div style='height:600px;' id=\"map\"></div>


<script>
      function initMap() {
        var myLatLng = {lat: -26.463, lng: 28.044};
        // var station1 = {lat: -27.463, lng: 28.044};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,center: myLatLng
            });

        // var marker = new google.maps.Marker({
        //     position: myLatLng,
        //     map: map,
        //     title: 'HF noise remote stations'
        // });

        <?php

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
        $sql = "SELECT * FROM `Remote_Station`";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {        
            echo "var pos" . $row["Station_Call_sign"]. " = {lat:".$row["Remote_station_coordinates_lat"] .", lng:". $row["Remote_station_coordinates_long"] ."};\n";
            echo "var " .$row["Station_Call_sign"]. " = new google.maps.Marker({\n";
            echo "          position: pos". $row["Station_Call_sign"].",\n";
            echo "          map: map,\n";
            echo "          title: \"".$row["Station_Call_sign"]."\"\n";
            echo " });\n";
                }
        } else {
            echo "0 results\n";
        }
        $conn->close();
        
   
        ?>
        
    }
 
    </script>

    <script async defer src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyCCkNzmh6piXUeCaTJ5vJsnC_WuakyRkrg&callback=initMap\"></script>

    <?php
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
    $sql = "SELECT * FROM `Remote_Station`";
    $result = $conn->query($sql);
    ?>

    <table border = \"0\" style=\"width:100%\">
    <?php
    if ($result->num_rows > 0) {
        // output data of each row
        ?>
    <tr
        <td>ID</td>
        <td>Call sign</td>
        <td>Enabled</td>
        <td>Date enabled</td>
        <td>Last Update RED = Stale</td>
        <td>Station Description</td>
    </tr>
    <?php
        while($row = $result->fetch_assoc()) {
    //####################### get Stale stations ###############################
    $stale = '';
    $dbdate = $row["Last_Data_insert"];
    if (strtotime($dbdate) < strtotime("-1 day")){
        $stale = 1;

    ?>
    <tr>
    <td> <?php $row["Remote_Station_ID"] ?> </td>
    <td><a href='<?php $row["Station_URL"] ?>' target="_blank\"><?php  $row["Station_Call_sign"] ?> </a></td>
    <td> <?php $row["Remote_Station_Enabled"]  ?></td><td>  <?php $row["Remote_Station_date_enabled"] ?></td>
    <td><font color="red"> <?php $row["Last_Data_insert"] ?> </font></td>
    <td><?php $row["Station_Description"] ?> </td>
    </tr>
    
    <?php
    }else{
        $stale = 0;
    ?>

    <tr>
        <td> <?php $row["Remote_Station_ID"] ?> </td>
        <td><a href="<?php $row['Station_URL'] ?>" target="_blank"><?php $row["Station_Call_sign"] ?></a></td>
        <td> <?php $row["Remote_Station_Enabled"] ?> </td>
        <td> <?php $row["Remote_Station_date_enabled"] ?> </td>
        <td> <?php $row["Last_Data_insert"]  ?> </td>
        <td> <?php $row["Station_Description"]  ?> </td>
    </tr>
    <?php

    }
        }
    } else {
        ?>  0 results <?php
    }
    ?>
    </table><?php
    $conn->close();
    include("counter.php");

        ?>

    </body>
    </html>

    <?php


