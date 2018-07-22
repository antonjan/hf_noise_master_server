<?php
// the message
$msg = "Please follow the following instructions to enable your remote station to send noise recordings to the Master Noise server.\n Please check out the following file from the git repository.";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("anton.janovsky@gmail.com","Remote Station Registration",$msg);
echo "Sending mail";
?> 
