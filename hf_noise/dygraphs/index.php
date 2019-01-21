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
<script src="myjs_1mhz.js"></script>
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
      <h3 class="align-center">Graph Beta Test for 1Mhz Band</h3>
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
$file = "data_1mhz.php";
echo "writing file";
file_put_contents($file, $data_set);

echo "<a href=\"".$file."\">Graph_data!</a>";

?>

</body>
</html>
