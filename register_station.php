<?php
session_start();
$_SESSION = array();

include("captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
$_SESSION['capture_temp_code'] = $_SESSION['captcha']['code'];
//print_r($_SESSION);
?>

<html>
<link href="/style.css" media="screen" rel="stylesheet" type="text/css" />
<body>

<?php include "menu.php"; ?>

<div class="main-container full-width">
    <div class="site-width">
        <div class="content-container">
            <h3 class="align-center">Register Your Remote Monitoring Station</h3>
            <h5 class="align-center">Complete the following steps to to have your station linked.</h5>

            <div class="seperator"></div>

            <div class="intro-box">
                <p>By adding your HF Noise monitoring system to the main Server will allow you to have your station linked to the main index page and will put your station position on the google map.</p>
                <p>You will also receive a security Key that you will need to add to your remote station via an SMS for your station to allow it to push the rf_noise measurement recordings to the main server so it could be added and correlated with all the other station measurement information.</p>
                <p>After registration, you will receive an SMS with your key and an e-mail with your Remote station configuration instructions.</p>
            </div>
        </div>

         </div> <!-- site-width -->
         <div class="site-width">

        <div class="content-container">
            <div class="form-container register-form">

                <!-- <h4 class="align-center">Register Your Station</h4>
                <p class="align-center">Please complete the following details</p> -->
                <h4 class="align-center" style="margin-top: 0px;">Register Your Station</h4>

                <div class="seperator"></div>

                <form action="add_reg_station.php" method="post">

                    <h5 class="underline-1">Station Details</h5>

                    <label for="Station_Call_sign">Station Call Sign: (Dont use "-" in calsign)</label>
                    <input type="text" id="Station_Call_sign" name="Station_Call_sign" placeholder="ZS6ZZZ" required> <br>

                    <label for="Station_URL">Station URL: </label>
                    <input type= "text" id="Station_URL" name="Station_URL" placeholder="http://domain.com" required><br>

                    <div class="form-input-container">
                        <span class="half-input">
                            <label for="Remote_station_Email_Address">Station Email Address: </label>
                            <input type="email" id="Remote_station_Email_Address" name="Remote_station_Email_Address" placeholder="myname@domain.com" required> <br>
                        </span>

                        <span class="half-input">
                            <label for="Remote_Station_SMS_Number">Station SMS Number: </label>
                            <input type= "text" id="Remote_Station_SMS_Number" name="Remote_Station_SMS_Number" placeholder="0830000000" required> <br>
                        </span>
                    </div>     

                    <label for="Station_Description">Station Description: </label>
                    <input type= "text" id="Station_Description" name="Station_Description" placeholder="My station is this and use this antenna" required> <br>

                    <!-- <div class="seperator"></div> -->

                    <h5 class="underline-1">Station Location Details</h5>

                    <div class="form-input-container">
                        <span class="half-input">
                        <label for="Remote_station_coordinates_lat">Station coordinates Lat:</label>
                        <input type="text" id="Remote_station_coordinates_lat" name="Remote_station_coordinates_lat" placeholder="-26.34" required><br>
                        </span>

                        <span class="half-input">
                        <label for="Remote_station_coordinates_long">Station coordinates Long: </label>
                        <input type= "text" id="Remote_station_coordinates_long" name="Remote_station_coordinates_long" placeholder="27.3" required><br>
                        </span>
                    </div>

                    <label for="Remote_Station_Address_1">Station Physical Address: </label>
                    <input type= "text" id="Remote_Station_Address_1" name="Remote_Station_Address_1" placeholder="Street Address" required> <br>

                    <!-- <input type= "text" id="Remote_Station_Address_1b" name="Remote_Station_Address_1b" placeholder="Street Address Line 2" required> <br> -->

                    <!-- <label for="Remote_Station_Address_2">Station Address 2: </label> -->
                    <input type= "text" id="Remote_Station_Address_2" name="Remote_Station_Address_2" placeholder="Suburb / Town" required> <br>
                    
                    <div class="form-input-container">
                        <span class="half-input">
                            <!-- <label for="Remote_Station_Address_3">Station Address 3: </label> -->
                            <input type= "text" id="Remote_Station_Address_3" name="Remote_Station_Address_3" placeholder="City"> <br>
                        </span>

                        <span class="half-input">
                            <!-- <label for="Remote_Station_Postal_Code">Station Postal Code: </label> -->
                            <input type= "text" id="Remote_Station_Postal_Code" name="Remote_Station_Postal_Code" placeholder="Postal Code" required> <br>
                        </span>
                    </div>

                    <h5 class="underline-1">Captcha</h5>

                    <div class="form-input-container">
                        <span class="half-input">
                            <!-- Captcha image -->
                            <img class="cap-img" src="<?php echo  $_SESSION['captcha']['image_src'];?>"> <br>
                            <!-- <label for="Captcha">Enter Captcha: </label> -->
                            <input type="text" id="Captcha" name="Captcha" placeholder="Enter the captcha code" required>
                        </span>

                        <span class="half-input">
                            <input id="submit" type="submit" value="Submit">
                        </span>
                    </div>
                    
                    

                    

                </form>
            </div>
        </div>

    </div> <!-- site-width -->
</div> <!-- main-container -->

</body>
</html>

