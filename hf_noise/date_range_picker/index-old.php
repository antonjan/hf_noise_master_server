<?php
	$conn = mysqli_connect("localhost", "root", "root.amsat", "hfnoise");
	
	$post_at = "";
	$post_at_to_date = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"]["post_at"])) {			
		$post_at = $_POST["search"]["post_at"];
		list($fid,$fim,$fiy) = explode("-",$post_at);
		
		$post_at_todate = date('Y-m-d');
		if(!empty($_POST["search"]["post_at_to_date"])) {
			$post_at_to_date = $_POST["search"]["post_at_to_date"];
			list($tid,$tim,$tiy) = explode("-",$_POST["search"]["post_at_to_date"]);
			$post_at_todate = "$tiy-$tim-$tid";
		}
		
		$queryCondition .= "WHERE date  BETWEEN '$fiy-$fim-$fid' AND '" . $post_at_todate . "'";
	}

	$sql = "SELECT * from hf_noise_data " . $queryCondition . " ORDER BY id_hf_noise_data desc LIMIT 150";
	$result = mysqli_query($conn,$sql);
?>

<html>
	<head>

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
	</head>
	
	<body>
<?php
include '../../menu.php';
?>
    	<div class="demo-content">
	<h2 class="title_with_link">HF Noise Monitoring Graph selection system.</h2>
        <form name="frmSearch" method="post" action="">
	Displaying only the last a maximum of 150 rows in the system. Select the date range and Remote station ID to Export or disply.<br>
	<input type="text" placeholder="From Date" id="post_at" name="search[post_at]"  value="<?php echo $post_at; ?>" class="input-control" />
	<input type="text" placeholder="To Date" id="post_at_to_date" name="search[post_at_to_date]" style="margin-left:10px"  value="<?php echo $post_at_to_date; ?>" class="input-control"  />
Select Remote Station CallSign: <select name="callsign">
<?php
$sql2 = "SELECT DISTINCT `Station_Call_sign` FROM `Remote_Station`";
	$result2 = mysqli_query($conn,$sql2);
while($row2 = mysqli_fetch_array($result2)) {

echo	"<option value=".$row2["Station_Call_sign"].">".$row2["Station_Call_sign"]."</option>";

}
?> 
        
        <input type="button" value="Display 150 here" onClick="this.form.action='index.php'; this.form.submit()">
        <input type="button" value="Export Everything" onClick="this.form.action='export.php';this.form.submit()">
	</p>
<?php if(!empty($result))	 { ?>
<table class="table-content">
          <thead>
        <tr>
	  <th ><span>ID</span></th>
	  <th ><span>Callsign</span></th>                    
          <th ><span>Date</span></th>
	  <th ><span>Time</span></th>
          <th ><span>1Mhz</span></th>          
          <th ><span>2Mhz</span></th>
	  <th ><span>3Mhz</span></th>                      
          <th ><span>4Mhz</span></th>
          <th ><span>5Mhz</span></th>          
          <th ><span>6Mhz</span></th>	  
	  <th ><span>7Mhz</span></th>                      
          <th ><span>8Mhz</span></th>
          <th ><span>9Mhz</span></th>          
          <th ><span>10Mhz</span></th>	  
	  <th ><span>11Mhz</span></th>                      
          <th ><span>12Mhz</span></th>
          <th ><span>13Mhz</span></th>          
          <th ><span>14Mhz</span></th>
	  <th ><span>15Mhz</span></th>          
          <th ><span>16Mhz</span></th>
	  <th ><span>17Mhz</span></th>                      
          <th ><span>18Mhz</span></th>
          <th ><span>19Mhz</span></th>          
          <th ><span>20Mhz</span></th>	  
	  <th ><span>21Mhz</span></th>                      
          <th ><span>22Mhz</span></th>
          <th ><span>23Mhz</span></th>          
          <th ><span>24Mhz</span></th>	  
	  <th ><span>25Mhz</span></th>                      
          <th ><span>26Mhz</span></th>
          <th ><span>27Mhz</span></th>          
          <th ><span>28Mhz</span></th>
	  <th ><span>29Mhz</span></th>	  
	  
	  
        </tr>
      </thead>
    <tbody>
	<?php
		while($row = mysqli_fetch_array($result)) {
	?>
        <tr>
			<td><?php echo $row["id_hf_noise_data"]; ?></td>
			<td><?php echo $row["Remote_Station_ID"]; ?></td>
			<td><?php echo $row["Date"]; ?></td>
			<td><?php echo $row["Time"]; ?></td>
			<td><?php echo $row["1Mhz_data"]; ?></td>
			<td><?php echo $row["2Mhz_data"]; ?></td>
			<td><?php echo $row["3Mhz_data"]; ?></td>
			<td><?php echo $row["4Mhz_data"]; ?></td>
			<td><?php echo $row["5Mhz_data"]; ?></td>
			<td><?php echo $row["6Mhz_data"]; ?></td>
			<td><?php echo $row["7Mhz_data"]; ?></td>
			<td><?php echo $row["8Mhz_data"]; ?></td>
			<td><?php echo $row["9Mhz_data"]; ?></td>
			<td><?php echo $row["10Mhz_data"]; ?></td>
			<td><?php echo $row["11Mhz_data"]; ?></td>
			<td><?php echo $row["12Mhz_data"]; ?></td>
			<td><?php echo $row["13Mhz_data"]; ?></td>
			<td><?php echo $row["14Mhz_data"]; ?></td>
			<td><?php echo $row["15Mhz_data"]; ?></td>
			<td><?php echo $row["16Mhz_data"]; ?></td>
			<td><?php echo $row["17Mhz_data"]; ?></td>
			<td><?php echo $row["18Mhz_data"]; ?></td>
			<td><?php echo $row["19Mhz_data"]; ?></td>
			<td><?php echo $row["20Mhz_data"]; ?></td>
			<td><?php echo $row["21Mhz_data"]; ?></td>
			<td><?php echo $row["22Mhz_data"]; ?></td>
			<td><?php echo $row["23Mhz_data"]; ?></td>
			<td><?php echo $row["24Mhz_data"]; ?></td>
			<td><?php echo $row["25Mhz_data"]; ?></td>
			<td><?php echo $row["26Mhz_data"]; ?></td>
			<td><?php echo $row["27Mhz_data"]; ?></td>
			<td><?php echo $row["28Mhz_data"]; ?></td>
			<td><?php echo $row["29Mhz_data"]; ?></td>



		</tr>
   <?php
		}
   ?>
   <tbody>
  </table>
<?php } ?>
  </form>
  </div>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$.datepicker.setDefaults({
showOn: "button",
buttonImage: "datepicker.png",
buttonText: "Date Picker",
buttonImageOnly: true,
dateFormat: 'dd-mm-yy'  
});
$(function() {
$("#post_at").datepicker();
$("#post_at_to_date").datepicker();
});
</script>
<?php

include("counter.php");

?>
</body></html>
