<?php
 
 
function Connect()
{
 $dbhost = "localhost";
 $dbuser = "rfnoise";
 $dbpass = "djd89%jk0G4#";
 $dbname = "rfnoise";
 
 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
 
 return $conn;
}
 
?>
