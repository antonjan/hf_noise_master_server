<html>
<head>
<script type="text/javascript"
  src="dygraph.js"></script>
<link rel="stylesheet" src="dygraph.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="myjs.js"></script>
<script type="text/javascript" src="data.js"></script>
<script>

var graph_Data="<php echo $date_Range;?>";
</script>
<meta charset="utf-8"/>
</head>
<body>
<h1>Graph</h1>
Select a section to zoom. Move your mouse over graph to get value.<br>
<br>

<style>
  #darkbg .dygraph-axis-label { color: white; }
  .dygraph-legend { text-align: right; }
  #darkbg .dygraph-legend { background-color: #101015; }
</style>

<p>Roll period of 14 timesteps, custom range selector height and plot color.</p>
<div id="roll14" style="width:600px; height:300px;"></div>



</body>
</html>
