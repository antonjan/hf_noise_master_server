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
<h1>Test Graph</h1>
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
