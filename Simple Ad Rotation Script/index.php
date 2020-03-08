<?php

// random number 1 - 100 $result_random = rand(1, 100);

// if result less than or equal 70, display ad1 (70%)
if($result_random <= 70){
echo "Display ad1";
}

// if result less than or equal 90, display ad2 (20%)
else if($result_random <= 90){
echo "Display ad2";
}

// if result less than or equal 100, display ad3 (10%)
else {
echo "Display ad3";
}

?>
