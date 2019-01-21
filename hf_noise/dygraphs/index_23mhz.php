<html>
<head>
<link href="/style.css" media="screen" rel="stylesheet" type="text/css" />
    <title>HF Noise</title>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

        <style>
        .table-content{border-top:#CCCCCC 4px solid; width:50%;}
        .table-content th {padding:3px 5px; background: #F0F0F0;vertical-align:top;}

        .table-content td {padding:3px 5px; border-bottom: #F0F0F0 1px solid;vertical-align:top;}
        .table-content tr:nth-child(even) {background: #CCC}
        .table-content tr:nth-child(odd) {background: #F0F0F0}

        </style>
<script type="text/javascript" src="dygraph.js"></script>
<link rel="stylesheet" src="dygraph.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="myjs2.js"></script>
<script type="text/javascript" src="data.js"></script>
<script>
var graph_Data="<php echo $date_Range;?>";
</script>
<meta charset="utf-8"/>
</head>
<body>
<?php
include "../../menu.php";
?>
<div class="main-container full-width">
  <div class="site-width">

    <div class="content-container">
      <h3 class="align-center">Graph Beta Test last month 23Mhz Band</h3>
      <h5 class="align-center">Custom graph with value hover, zoom and range selector.</h5>

      <div class="seperator"></div>

    </div> <!-- content-container -->

    <div class="content-container">
        <p class="align-center">Select a section to zoom. Move your mouse over graph to get value.</p>
        <p class="align-center">Roll period of 14 timesteps, custom range selector height and plot color.</p>
	<p class="align-center">Please note the graph do take some time to load</p>
        <div id="roll14" class="dygraph-container" style="width:1200px; height:550px;">
	</div>
      </div> <!-- content-container -->

      </div> <!-- site-width -->
</div> <!-- main-container -->
<br>

<style>
  #darkbg .dygraph-axis-label { color: white; }
  .dygraph-legend { text-align: right; }
  #darkbg .dygraph-legend { background-color: #101015; }
</style>
<?php
//*************************creating Data set for graph**************************
//$sql = "SELECT * from hf_noise_data " . $queryCondition . " ORDER BY id_hf_noise_data desc LIMIT 150";
//        $result = mysqli_query($conn,$sql);

// Create array
//SELECT DISTINCT Remote_Station_ID FROM hfnoise.hf_noise_data;
//SELECT Remote_Station_ID FROM hfnoise.hf_noise_data where Remote_Station_ID = 'ZR6AIC';
$success = null;
$conn = mysqli_connect("localhost", "root", "root.amsat", "hfnoise") or die("db connection error");
//$con = mysqli_connect("HostName","UserName","password","DBName") or die("Some error occurred during connection " . mysqli_error($con));
$result2 = mysqli_query($conn,"SELECT DISTINCT Remote_Station_ID FROM hfnoise.hf_noise_data;");
//$result2 = mysqli_query($conn,$sql2);
//$data_set_temp = "Date";
//$date_set  = date("Y/m/d", strtotime($data_set_temp));
$data_set = "";
//$date_set = "Date";
$station_ID = array();
while($row = mysqli_fetch_array($result2)) {
$id = $row["Remote_Station_ID"];
$data_set .= ",".$id;
echo " ====== ".$id;
array_push($station_ID,$id);
}
$data_set .= "\n";
//echo " station id array ".print_r($station_ID)."######<br>";
//Functionsss!
//$file = "evnormal2.php";
//file_put_contents($file, $data_set);
//}
//$sql = "SELECT * from hf_noise_data " . $queryCondition . " ORDER BY id_hf_noise_data desc LIMIT 150";
//        $result = mysqli_query($conn,$sql);
$temp_Data_Araay = array();

#$sql = mysql_query("SELECT * from hf_noise_data " . $queryCondition . " ORDER BY id_hf_noise_data desc LIMIT 150";");
$result = mysqli_query($conn,"SELECT Remote_Station_ID,Date,Time,23Mhz_data from hf_noise_data ORDER BY Date desc ,Time  desc LIMIT 140000;");
//$result = mysqli_query($conn,"SELECT * from hfnoise.hf_noise_data  WHERE Date >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 2 MONTH)), INTERVAL 1 DAY) and Date <= DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY Date desc ,Time desc;");
//$result = mysqli_query($conn,$sql);
 while($row = mysqli_fetch_array($result)) {
//      $id = $row["id_hf_noise_data"];
        $remote_ID = $row["Remote_Station_ID"];
        $Date = date("Y/m/d", strtotime($row["Date"]));//$row["Date"]; //Date format new Date(Date.UTC(y, m, d, hh + n, 0, 0 EG 2009/07/25 08:0o
        $Time = $row["Time"]; 
        $D1Mhz = $row["23Mhz_data"];
	//$int1 = floatval($D1Mhz);
	$min = $D1Mhz - 3;
        $max = $D1Mhz + 3;
//echo "ididid ".$remote_ID ." Station id array ".print_r($station_ID)."######<br>";
//if remote station id ,Date and Time is the same
$temp_Data_Araay = array(",",",",",",",",",",",");
if 	(strcasecmp($remote_ID, $station_ID[0])) {
   	//echo " array 000 " .$station_ID[0]. " ".$Date ." ". $Time.",".$min.";".$D1Mhz.";".$max ."<br>";
    	//$data_set .= $Date ." ". $Time.",".$min.";".$D1Mhz.";".$max."\n";
	$temp_Data_Araay[0] = $Date ." ". $Time.",".$min.";".$D1Mhz.";".$max .",,,\n";
	$data_set .= $temp_Data_Araay[0];
} elseif (strcasecmp($remote_ID, $station_ID[1])) {
   	//echo " array 111 " .$station_ID[1]. " ".$Date ." ". $Time.",".$min.";".$D1Mhz.";".$max ."<br>";
	//$data_set .= $Date ." ". $Time.",".$min.";".$D1Mhz.";".$max."\n";
  	$temp_Data_Araay[1] = $Date ." ". $Time.",,".$min.";".$D1Mhz.";".$max .",,\n";
	$data_set .= $temp_Data_Araay[1];
} elseif (strcasecmp($remote_ID, $station_ID[2])) {
	//echo "array 222 " .$station_ID[2]. " ".$Date ." ". $Time.",".$min.";".$D1Mhz.";".$max ."<br>";
	//$data_set .= $Date ." ". $Time.",".$min.",".$D1Mhz.",".$max;
 	$temp_Data_Araay[2] = $Date ." ". $Time.",,,".$min.";".$D1Mhz.";".$max .",\n";
	$data_set .= $temp_Data_Araay[2];
} elseif (strcasecmp($remote_ID, $station_ID[3])){
	//echo "array 333 " .$station_ID[3]. " ".$Date ." ". $Time.",".$min.";".$D1Mhz.";".$max ."<br>";
        //$data_set .= $Date ." ". $Time.",".$min.",".$D1Mhz.",".$max;
        $temp_Data_Araay[3] = $Date ." ". $Time.",,,,".$min.";".$D1Mhz.";".$max ."\n";
	$data_set .= $temp_Data_Araay[3];
} else {

echo "done ".$remote_ID ."  ".$station_ID[2]."<br>";
}
//if ($remote_ID == $remote_ID_Previose and $Time != $time_Previose){
//echo "#################111######################";
//echo $temp_Data_Araay[0].$temp_Data_Araay[1].$temp_Data_Araay[2].$temp_Data_Araay[3]."<br>";
//$data_set .= $temp_Data_Araay[0].$temp_Data_Araay[1].$temp_Data_Araay[2].$temp_Data_Araay[3];
//}elseif ($remote_id != $remote_ID_Previose and $Time == $time_Previose){
//echo "#################222######################";
//echo $temp_Data_Araay[0].$temp_Data_Araay[1].$temp_Data_Araay[2].$temp_Data_Araay[3]."<br>";
//$data_set .= $temp_Data_Araay[0].$temp_Data_Araay[1].$temp_Data_Araay[2].$temp_Data_Araay[3];
//}
$Date_Previose = $Date;
$time_Previose = $Time;
$remote_ID_Previose = $remote_ID;
}
//while($row = mysql_fetch_array($sql)){
//Date,zr6aic,zs6yz
//20070101,46;51;56,43;45;48
//20070102,43;48;52,48;56;63
echo "writing file";
//echo "<br>".$data_set;
$file = "evnormal2.php";
file_put_contents($file, $data_set);

echo "<a href=\"evnormal2.php\">Graph_data!</a>";

?>

</body>
</html>
