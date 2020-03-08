# Login script
Learn to create a simple login system with php + mysql script, this tutorial is easy to follow, teach you step by step.
## Overview
In this tutorial, we create 3 php files for testing our code.
1. main_login.php
2. checklogin.php
3. login_success.php

### Steps
1. Create table "members" in database "test".
2. Create file main_login.php.
3. Create file checklogin.php.
4. Create file login_success.php.
5. Create file logout.php

## STEP1: Create table "members"
For testing this code, we need to create database "test" and create table "members".

![](http://phpeasystep.com/imgs/db_members.gif)

```mysql
CREATE TABLE `members` (
`id` int(4) NOT NULL auto_increment,
`username` varchar(65) NOT NULL default '',
`password` varchar(65) NOT NULL default '',
PRIMARY KEY (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` VALUES (1, 'john', '1234');
```
## STEP2: Create file main_login.php
The first file we need to create is "main_login.php" which is a login form.

![](http://phpeasystep.com/imgs/member_login.gif)

```php
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
   <tr>
      <form name="form1" method="post" action="checklogin.php">
         <td>
            <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
               <tr>
                  <td colspan="3"><strong>Member Login </strong></td>
               </tr>
               <tr>
                  <td width="78">Username</td>
                  <td width="6">:</td>
                  <td width="294"><input name="myusername" type="text" id="myusername"></td>
               </tr>
               <tr>
                  <td>Password</td>
                  <td>:</td>
                  <td><input name="mypassword" type="text" id="mypassword"></td>
               </tr>
               <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="Submit" value="Login"></td>
               </tr>
            </table>
         </td>
      </form>
   </tr>
</table>
```

## STEP3: Create file checklogin.php
We have a login form in step 2, when a user submit their username and password, PHP code in checklogin.php will check that this user exist in our database or not.

If user has the right username and password, then the code will register username and password in the session and redirect to "login_success.php". If username or password is wrong the system will show "Wrong Username or Password".

```php
<?php

$host     = "localhost"; // Host name
$username = ""; // Mysql username
$password = ""; // Mysql password
$db_name  = "test"; // Database name
$tbl_name = "members"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password") or die("cannot connect");
mysql_select_db("$db_name") or die("cannot select DB");

// username and password sent from form
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql    = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result = mysql_query($sql);

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if ($count == 1) {
    
    // Register $myusername, $mypassword and redirect to file "login_success.php"
    session_register("myusername");
    session_register("mypassword");
    header("location:login_success.php");
} else {
    echo "Wrong Username or Password";
}
?>
```

## STEP4: Create file login_success.php
User can't view this page if the session is not registered.

```php
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (!session_is_registered(myusername)) {
    header("location:main_login.php");
}
?>

<html>
<body>
Login Successful
</body>
</html>
```

## STEP5: Create file Logout.php
**If you want to logout, create this file.** The code in this file will destroy the session.
```php
<?php
session_start();
session_destroy();
?>
```

## For PHP5 User - checklogin.php
```php
<?php

ob_start();
$host     = "localhost"; // Host name
$username = ""; // Mysql username
$password = ""; // Mysql password
$db_name  = "test"; // Database name
$tbl_name = "members"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password") or die("cannot connect");
mysql_select_db("$db_name") or die("cannot select DB");

// Define $myusername and $mypassword
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql    = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result = mysql_query($sql);

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if ($count == 1) {
    
    // Register $myusername, $mypassword and redirect to file "login_success.php"
    session_register("myusername");
    session_register("mypassword");
    header("location:login_success.php");
} else {
    echo "Wrong Username or Password";
}

ob_end_flush();
?>
```
