# Counter Script
Create your own a simple PHP counter script using a basic knowledge of php + mysql and keep your visitors number in database for analysis.
## Overview
In this tutorial, we create 1 PHP file for testing this code.
1. counter.php

### Steps
1. Create table "counter" in database "test".
2. Create file counter.php.

## STEP1: Create table "counter"
![](http://phpeasystep.com/imgs/db_counter.gif)
```mysql
CREATE TABLE `counter` (
`counter` int(9) NOT NULL default '0'
) TYPE=MyISAM;
```

## STEP2: Create file counter.php
```php
<?php

$host     = "localhost"; // Host name
$username = ""; // Mysql username
$password = ""; // Mysql password
$db_name  = "test"; // Database name
$tbl_name = "members"; // Table name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password") or die("cannot connect to server ");
mysql_select_db("$db_name") or die("cannot select DB");

$sql    = "SELECT * FROM $tbl_name";
$result = mysql_query($sql);

$rows    = mysql_fetch_array($result);
$counter = $rows['counter'];

// if have no counter value set counter = 1
if (empty($counter)) {
    $counter = 1;
    $sql1    = "INSERT INTO $tbl_name(counter) VALUES('$counter')";
    $result1 = mysql_query($sql1);
}

echo "You 're visitors No. ";
echo $counter;

// count more value
$addcounter = $counter + 1;
$sql2       = "update $tbl_name set counter='$addcounter'";
$result2    = mysql_query($sql2);

mysql_close();
?>

```
