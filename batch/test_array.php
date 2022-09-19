<?php
 
$scores = [1,2,3,4,9];
foreach ($scores as &$score) {
echo  $score ;
}
//print_r($scores); // [2, 4, 6]
foreach ($scores as $score) {
echo $score;
}

//print_r($scores);
?>
