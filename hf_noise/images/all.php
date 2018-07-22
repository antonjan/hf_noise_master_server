<?php

/*     $files = glob("NOAA18-MCIR*.png",GLOB_NOSORT);*/
echo "<html><body>";
echo "<h1>This is the automated HF Noise monitoring system operated Anton Janovsky ZR6AIC.</h1>";
echo "<b>Click on Image to enlarge.</b><br>";
$fileS = "file.csv";
$date = date('d-m-Y');
$fileD = "hf_noise_$date.png";
$filename = $fileD;
if (file_exists($filename)) {
    echo "$filename was last modified: " . date ("F d Y H:i:s.", filemtime($filename));

echo "<table>";
echo "<tr>";
echo "<td>";
  /*echo "<a>".substr($filename, 0, -4)."</a><br>";*/
  /*echo "<a>".$filename."</a><br>";*/
    echo '<a href="http://zr6aic.giga.co.za/hf_noise/images/'.$filename.'">'.$filename.'</a>'."<br>";
    echo '<a href="http://zr6aic.giga.co.za/hf_noise/images/'.$filename .'"> <img src="thumb/thumb_'.$filename .'" alt="Random image" height="150" width="200" ></a>'."<br><br>";
echo "</td>";
echo "</tr>";
echo "</table>";

}
echo '<a href="http://zr6aic.giga.co.za/hf_noise/images/june2017.php">'.'June 2017</a>'."<br>";

echo "<table>";
$dir = "/home/anton/wxsat/images";
chdir($dir);
array_multisort(array_map('filemtime', ($files = glob("*.{png,jpg}", GLOB_BRACE))), SORT_DESC, $files);
foreach($files as $filename)
{
echo '<tr bgcolor="#f0f0f0">';
echo "<td>";
  /*echo "<a>".substr($filename, 0, -4)."</a><br>";*/
  /*echo "<a>".$filename."</a><br>";*/
    echo '<a href="http://zr6aic.giga.co.za:8090/wxsat/images/'.$filename.'">'.$filename.'</a>'."<br>";
    echo '<a href="http://zr6aic.giga.co.za:8090/wxsat/images/'.$filename .'"> <img src="thumb/thumb_'.$filename .'" alt="Random image" height="150" width="200" ></a>'."<br><br>";
echo "</td>";
echo "<td>";
echo '<a href="http://zr6aic.giga.co.za:8090/wxsat/images/rotate.php/?filename='.$filename.'" >Rotate 180 Deg</a>';
echo "</td>";
echo "</tr>";
  }
session_start();
$counter_name = "counter.txt";
// Check if a text file exists. If not create one and initialize it to zero.
if (!file_exists($counter_name)) {
  $f = fopen($counter_name, "w");
  fwrite($f,"0");
  fclose($f);
}
// Read the current value of our counter file
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);
// Has visitor been counted in this session?
// If not, increase counter value by one
if(!isset($_SESSION['hasVisited'])){
  $_SESSION['hasVisited']="yes";
  $counterVal++;
  $f = fopen($counter_name, "w");
  fwrite($f, $counterVal);
  fclose($f); 
}
echo "</table>";
echo 'This system is operated by Anton Janovsky and you can contact me<a href="https://docs.google.com/spreadsheet/viewform?fromEmail=true&amp;formkey=dEZUN2tTUTU1NUdweUxldkcwNmpXNlE6MQ" target="_blank"> here. </a><br>';
echo "You are visitor number ".$counterVal." to this site";
echo "</body></html>";
 ?>
