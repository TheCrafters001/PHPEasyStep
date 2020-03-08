# User online
This tutorial show you php script that count how many users are active on your site.
## Overview
In this tutorial, create 1 PHP file for testing this code.
1. user_online.php

### Steps
1. Create table "user_online" in mysql in database "test".
2. Create file user_online.php.

## STEP1: Create table "user_online"
![](http://phpeasystep.com/imgs/db_user_online.gif)
```mysql
CREATE TABLE `user_online` (
`session` char(100) NOT NULL default '',
`time` int(11) NOT NULL default '0'
) TYPE=MyISAM;
```

## STEP2: Create file - user_online.php
```php
<?php

session_start();
$session    = session_id();
$time       = time();
$time_check = $time - 600; //SET TIME 10 Minute

$host     = "localhost"; // Host name
$username = ""; // Mysql username
$password = ""; // Mysql password
$db_name  = "test"; // Database name
$tbl_name = "user_online"; // Table name

// Connect to server and select databse
mysql_connect("$host", "$username", "$password") or die("cannot connect to server");
mysql_select_db("$db_name") or die("cannot select DB");

$sql    = "SELECT * FROM $tbl_name WHERE session='$session'";
$result = mysql_query($sql);

$count = mysql_num_rows($result);

if ($count == "0") {
    
    $sql1    = "INSERT INTO $tbl_name(session, time)VALUES('$session', '$time')";
    $result1 = mysql_query($sql1);
}

else {
    "$sql2=UPDATE $tbl_name SET time='$time' WHERE session = '$session'";
    $result2 = mysql_query($sql2);
}

$sql3    = "SELECT * FROM $tbl_name";
$result3 = mysql_query($sql3);

$count_user_online = mysql_num_rows($result3);

echo "User online : $count_user_online ";

// if over 10 minute, delete session
$sql4    = "DELETE FROM $tbl_name WHERE time<$time_check";
$result4 = mysql_query($sql4);

// Open multiple browser page for result


// Close connection

mysql_close();
?>
```
