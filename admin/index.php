<?php
echo "<html>";
echo "  <style>";
echo "  .menu {";
echo "     float:left;";
echo "      width:100%;";
echo "     height:50;";
echo "   }";
echo "   .mainContent {";
echo "     float:left;";
echo "     width:100%;";
echo "     height:100%;";
echo "   }";
echo "  </style>";
echo " <body>";
include "menu.php";
echo "<iframe class=\"mainContent\" src=\"full_list_station.php\"></iframe>";

echo "</body>";
echo "</html>";
?>
