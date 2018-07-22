<?php
echo "<html>";
echo "<body>";
echo "test";
echo "<form action=\"upload.php\" method=\"post\" enctype=\"multipart/form-data\">";
echo "            Select CSV file to upload";
echo"            <input type=\"file\" name=\"uploadedfile\" accept=\".csv\">";
echo"            <input type=\"submit\" value=\"Upload File\" name=\"submit\">";
echo"        </form>";
echo"</body>";
echo"</html>";

?>
