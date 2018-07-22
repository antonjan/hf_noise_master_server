<?
$sql = "SELECT DISTINCT Remote_Station_ID FROM Remote_Station";
$con = mysql_connect("localhost","root","root1.amsat");
 $db = mysql_select_db("hfnoise",$con);
 $get=mysql_query($sql);
 while($row = mysql_fetch_assoc($get))
{
echo ($row['Station_Call_sign']."<br/>");
}
?> 
