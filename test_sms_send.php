<?php
// the message
$msg = "Your Username is ZR6AIC";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("0834086594@winsms.net","-------",$msg);
echo "Sending mail for SMS";
?> 
