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
<script type="text/javascript"
  src="dygraph.js"></script>
<link rel="stylesheet" src="dygraph.css" />
</head>
<body>
<?php
include "../../menu.php";
?>
<h1>Test Graph</h1>
Select section on graph to zoom. move mouse over graph to get value<br>
<br>
<div id="graphdiv4"
  style="width:480px; height:320px;"></div>
<script type="text/javascript">
  g4 = new Dygraph(
    document.getElementById("graphdiv4"), "twonormals.csv", {
      rollPeriod: 7,
      showRoller: true,
      errorBars: true,
      valueRange: [50,125]
    }
  );
</script>
</body>
</html>
