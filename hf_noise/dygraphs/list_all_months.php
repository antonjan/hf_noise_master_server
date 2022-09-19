<?php
echo "<html>";
echo "<body>";
echo "<head>";
echo "<link href=\"/style.css\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />";
echo "</head>";
#SELECT * FROM hfnoise.hf_noise_data GROUP BY YEAR(Date), MONTH(Date)ORDER BY YEAR(Date) DESC, MONTH(Date) DESC
$success = null;
$conn = mysqli_connect("localhost", "rfnoise", "djd89%jk0G4#", "rfnoise") or die("db connection error");
$result2 = mysqli_query($conn,"SELECT DISTINCT Remote_Station_ID FROM hfnoise.hf_noise_data;");
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

#$result = mysqli_query($conn,"SELECT Remote_Station_ID,Date,Time,1Mhz_data from hf_noise_data ORDER BY Date desc ,Time  desc LIMIT 20000;");
$result = mysqli_query($conn,"SELECT * FROM hfnoise.hf_noise_data GROUP BY YEAR(Date), MONTH(Date)ORDER BY YEAR(Date) DESC, MONTH(Date) DESC;");
//echo "<table>";
echo "<div class=\"menu\">
Move the mouse over the button to open the Frequency selection menu <br>";
echo "<div class=\"dropdown\">\n";
echo "<button class=\"dropbtn\">Month Selection</button>\n";
echo "<div class=\"dropdown-content\">\n";
// <a href="index.php">1 to 2 Mhz graph</a>
// <a href="index_2mhz.php">2 to 3 Mhz graph</a>

 while($row = mysqli_fetch_array($result)) {
//      $id = $row["id_hf_noise_data"];
        $remote_ID =  trim ( $row["Remote_Station_ID"]);  // $row["Remote_Station_ID"];
        $Date = date("Y/m/d", strtotime($row["Date"]));//$row["Date"]; //Date format new Date(Date.UTC(y, m, d, hh + n, 0, 0 EG 2009/07/25 08:0o
        $Time = $row["Time"];
        $D1Mhz = $row["1Mhz_data"];
        //$int1 = floatval($D1Mhz);
        $min = $D1Mhz - 3;
        $max = $D1Mhz + 3;
//echo "<tr>";
//echo "<td>".$Date."</td><td>".$remote_ID."</td>";
echo "<a href=\"index.php?date=".$Date."\">".$Date."</a>\n";
//echo "</tr>"; 

}
//echo "</table>";
echo "  </div>
</div>
</div>
";
echo "</body>";
echo "</html>";
?>


