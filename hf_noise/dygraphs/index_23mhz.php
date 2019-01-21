<html>
<head>
<link href="/style.css" media="screen" rel="stylesheet" type="text/css" />
    <title>HF Noise</title>
        <script src="jquery-1.9.1.js"></script>
        <link rel="stylesheet" href="jquery-ui.css">

        <style>
        .table-content{border-top:#CCCCCC 4px solid; width:50%;}
        .table-content th {padding:3px 5px; background: #F0F0F0;vertical-align:top;}

        .table-content td {padding:3px 5px; border-bottom: #F0F0F0 1px solid;vertical-align:top;}
        .table-content tr:nth-child(even) {background: #CCC}
        .table-content tr:nth-child(odd) {background: #F0F0F0}

        </style>
<script type="text/javascript" src="dygraph.js"></script>
<link rel="stylesheet" src="dygraph.css" />
<script src="jquery.min.js"></script>
<script src="myjs_23mhz.js"></script>
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
      <h3 class="align-center">Graph Beta Test for 23Mhz Band</h3>
	<div class="menu">
Move the mouse over the button to open the Frequency selection menu <br>
<div class="dropdown">
  <button class="dropbtn">Frequency Selection</button>
  <div class="dropdown-content">
 <a href="all_freq_2_Day.php">All frequency 2 Day graph</a>
 <a href="index.php">1 to 2 Mhz graph</a>
 <a href="index_2mhz.php">2 to 3 Mhz graph</a>
 <a href="index_3mhz.php">3 to 4 Mhz graph</a>
 <a href="index_4mhz.php">4 to 5 Mhz graph</a>
 <a href="index_5mhz.php">5 to 6 Mhz graph</a>
 <a href="index_6mhz.php">6 to 7 Mhz graph</a>
 <a href="index_7mhz.php">7 to 8 Mhz graph</a>
 <a href="index_8mhz.php">8 to 9 Mhz graph</a>
 <a href="index_9mhz.php">9 to 10 Mhz graph</a>
 <a href="index_10mhz.php">10 to 11 Mhz graph</a>
 <a href="index_11mhz.php">11 to 12 Mhz graph</a>
 <a href="index_12mhz.php">12 to 13 Mhz graph</a>
 <a href="index_13mhz.php">13 to 14 Mhz graph</a>
 <a href="index_14mhz.php">14 to 15 Mhz graph</a>
 <a href="index_15mhz.php">15 to 16 Mhz graph</a>
 <a href="index_16mhz.php">16 to 17 Mhz graph</a>
 <a href="index_17mhz.php">17 to 18 Mhz graph</a>
 <a href="index_18mhz.php">18 to 19 Mhz graph</a>
 <a href="index_19mhz.php">19 to 20 Mhz graph</a>
 <a href="index_20mhz.php">20 to 21 Mhz graph</a>
 <a href="index_21mhz.php">21 to 22 Mhz graph</a>
 <a href="index_22mhz.php">22 to 23 Mhz graph</a>
 <a href="index_23mhz.php">23 to 24 Mhz graph</a>
 <a href="index_24mhz.php">24 to 25 Mhz graph</a>
 <a href="index_25mhz.php">25 to 26 Mhz graph</a>
 <a href="index_26mhz.php">26 to 27 Mhz graph</a>
 <a href="index_27mhz.php">27 to 28 Mhz graph</a>
 <a href="index_28mhz.php">28 to 29 Mhz graph</a>
 <a href="index_29mhz.php">29 to 30 Mhz graph</a>
  </div>
</div>
</div>
	
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
//while($row = mysql_fetch_array($sql)){
//Date,zr6aic,zs6yz
//20070101,46;51;56,43;45;48
//20070102,43;48;52,48;56;63
//echo "<br>".$data_set;
$file = "data_23mhz.php";
echo "writing file";
//file_put_contents($file, $data_set);

echo "<a href=\"".$file."\">Graph_data!</a>";

?>

</body>
</html>
