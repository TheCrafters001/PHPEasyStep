# Simple Ad Rotation Script
In this script (very easy script), we setup 3 ads for rotation. First ad, we want it to display 70%, second ad we want to display 20% and the last one we want to display 10%

## What to do
1. Random number 1-100
if result = 1-70 (we have opportunity to display ad1, 70%)
if result = 71-90 (we have opportunity to display ad2, 20%)
if result = 91-100 (we have opportunity to display ad3, 10%)

## Example
In this script, we use ```rand(1, 100);``` to random number between 1 -100 and keep the result in variable named "```$result_random```" if result = 85 ad2 will be displayed.

## Code
```php
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
```
