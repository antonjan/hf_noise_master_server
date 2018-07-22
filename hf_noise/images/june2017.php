<?php
echo "<html><body>";
echo "<h1>This is the automated HF Noise monitoring system operated Anton Janovsky ZR6AIC.</h1>";
// outputs e.g.  somefile.txt was last modified: December 29 2002 22:16:23.
$fileS = "file.csv";
$date = "??-06-2017;
$fileD = "*$date.png";
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
echo "</body></html>";
?>
