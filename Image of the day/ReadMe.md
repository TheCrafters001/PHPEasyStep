# Image of the day
In this script, it shows you how to display image of the day. You can adapt this script to display quote of the day, knowledge of the day or something else that you want. You don't have to change image everyday just change images once a week.
## Images - [download here](http://phpeasystep.com/demo/downloads/imday/images.zip) (Zip file 91.8 KB)

## What to do?
1. Find what today is? using the date function and keep the answer in variable name "$today".
2. Compare $today with the name of day.
3. Display "Today is " ... " and display image of the day.
4. test it. Try to change your machine date and see the result!
```php
$today=date(l); // Find what today is? using date function


// If today is Monday displays message "Today is Monday" and displays image1.gif
if($today==Monday){ // Compare $today with name of the day.
echo "Today is Monday";
echo "<BR>"; // Line break
echo "<img src='images/image1.gif'>"; // images keep in forder "images"
}
```

If You want to show 1 month 31 images replace with this code
```php
$today=date(d); // display date "01", "02", "03"..."15", "16" ....
if($today==01){ .......

elseif($today==15){ .......

until $today==31
```

## Code
```php
<?php

$today=date(l);

// Find what today is? using date function

if($today==Monday){
echo "Today is Monday";
echo "<BR>";
echo "<img src='images/image1.gif'>";
}

elseif($today==Tuesday){
echo "Today is Tuesday";
echo "<BR>";
echo "<img src='images/image2.gif'>";
}

elseif($today==Wednesday){
echo "Today is Wednesday";
echo "<BR>";
echo "<img src='images/image3.gif'>";
}

elseif($today==Thursday){
echo "Today is Thursday";
echo "<BR>";
echo "<img src='images/image4.gif'>";
}

elseif($today==Friday){
echo "Today is Friday";
echo "<BR>";
echo "<img src='images/image5.gif'>";
}

elseif($today==Saturday){
echo "Today is Saturday";
echo "<BR>";
echo "<img src='images/image6.gif'>";
}

elseif($today==Sunday){
echo "Today is Sunday";
echo "<BR>";
echo "<img src='images/image7.gif'>";
}

?>
```
