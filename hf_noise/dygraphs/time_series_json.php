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
                while($row = mysqli_fetch_array($result)) {
//{ "name":"John", "age":30, "car":null } 
?>
{row:

       { 
        "ID":<?php echo $row["id_hf_noise_data"]; ?>,
        "Callsign":<?php echo $row["Remote_Station_ID"]; ?>,
        "Date":<?php echo $row["Date"]; ?>,
        "Time":<?php echo $row["Time"]; ?>,
        "1Mhz":<?php echo $row["1Mhz_data"]; ?>,
        "2Mhz":<?php echo $row["2Mhz_data"]; ?>,
        "3Mhz":<?php echo $row["3Mhz_data"]; ?>,
        "4Mhz":<?php echo $row["4Mhz_data"]; ?>,
        "5Mhz":<?php echo $row["5Mhz_data"]; ?>,
        "6Mhz":<?php echo $row["6Mhz_data"]; ?>,
        "7Mhz":<?php echo $row["7Mhz_data"]; ?>,
        "8Mhz":<?php echo $row["8Mhz_data"]; ?>,
        "9Mhz":<?php echo $row["9Mhz_data"]; ?>,
        "10Mhz":<?php echo $row["10Mhz_data"]; ?>,
        "11Mhz":<?php echo $row["11Mhz_data"]; ?>,
        "12Mhz":<?php echo $row["12Mhz_data"]; ?>,
        "13Mhz":<?php echo $row["13Mhz_data"]; ?>,
        "14Mhz":<?php echo $row["14Mhz_data"]; ?>,
        "15Mhz":<?php echo $row["15Mhz_data"]; ?>,
        "16Mhz":<?php echo $row["16Mhz_data"]; ?>,
        "17Mhz":<?php echo $row["17Mhz_data"]; ?>,
        "18Mhz":<?php echo $row["18Mhz_data"]; ?>,
        "19Mhz":<?php echo $row["19Mhz_data"]; ?>,
        "20Mhz":<?php echo $row["20Mhz_data"]; ?>,
        "21Mhz":<?php echo $row["21Mhz_data"]; ?>,
        "22Mhz":<?php echo $row["22Mhz_data"]; ?>,
        "23Mhz":<?php echo $row["23Mhz_data"]; ?>,
        "24Mhz":<?php echo $row["24Mhz_data"]; ?>,
        "25Mhz":<?php echo $row["25Mhz_data"]; ?>,
        "26Mhz":<?php echo $row["26Mhz_data"]; ?>,
        "27Mhz":<?php echo $row["27Mhz_data"]; ?>,
        "28Mhz":<?php echo $row["28Mhz_data"]; ?>,
        "29Mhz":<?php echo $row["29Mhz_data"]; ?>,
               } 
}
   <?php
                }
?>
