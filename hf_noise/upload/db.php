<?php

       //ENTER YOUR DATABASE CONNECTION INFO BELOW:
         $hostname="localhost";
         $database="hf_noise";
         $username="root";
         $password="mysql123";

   //DO NOT EDIT BELOW THIS LINE
     $link = mysql_connect($hostname, $username, $password);
     mysql_select_db($database) or die('Could not select database');
 ?> 
