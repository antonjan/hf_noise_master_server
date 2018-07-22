<?php
    $title = $_GET["test"]; //You have to get the form data
    $gain = $_GET["test2"];
    $offset = $_GET["test3"];
    $file = fopen('stach.txt', 'w+'); //Open your .txt file
//    ftruncate($file, 0); //Clear the file to 0bit
    $content = $title. PHP_EOL .$gain. PHP_EOL .$offset;
    fwrite($file , $content); //Now lets write it in there
    fclose($file ); //Finally close our .txt
//    die(header("Location: ".$_SERVER["HTTP_REFERER"]));
?>
<form action="stach.php" method="post">
    Channel 8 Title:<br><input type="text" name="channel0Title" value="Channel 7"><br>
    Gain:<br><input type="text" name="channel0Gain" value="4.000"><br>
    Offset:<br><input type="text" name="channel0Offset" value= "6.000"><br>
    <input type="submit" id ="submitButton" value="Submit">
</form>
