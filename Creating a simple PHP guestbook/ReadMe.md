# Creating a simple PHP guestbook
Creating simple PHP guestbook.
## Overview
In this tutorial, we have to create 3 files.
1. guestbook.php
2. addguestbook.php
3. viewguestbook.php

### Steps
1. Create table name "guestbook" in database "test".
2. Create file guestbook.php.
3. Create file addguestbook. php.
4. Create file viewguestbook.php

## STEP 1: Set up database
![](http://phpeasystep.com/imgs/image/guestbook_db.gif)
```mysql
CREATE TABLE `guestbook` (
`id` int(4) NOT NULL auto_increment,
`name` varchar(65) NOT NULL default '',
`email` varchar(65) NOT NULL default '',
`comment` longtext NOT NULL,
`datetime` varchar(65) NOT NULL default '',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
```
If you don't know how to create database and table, [read this tutorial](http://www.phpeasystep.com/mysqlview.php?id=2)

## STEP 2: Create file guestbook.php
![](http://phpeasystep.com/imgs/guestbook1.gif)

```php
<table width="400" border="0" align="center" cellpadding="3" cellspacing="0">
   <tr>
      <td><strong>Test Sign Guestbook </strong></td>
   </tr>
</table>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
   <tr>
      <form id="form1" name="form1" method="post" action="addguestbook.php">
         <td>
            <table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
               <tr>
                  <td width="117">Name</td>
                  <td width="14">:</td>
                  <td width="357"><input name="name" type="text" id="name" size="40" /></td>
               </tr>
               <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td><input name="email" type="text" id="email" size="40" /></td>
               </tr>
               <tr>
                  <td valign="top">Comment</td>
                  <td valign="top">:</td>
                  <td><textarea name="comment" cols="40" rows="3" id="comment"></textarea></td>
               </tr>
               <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="Submit" value="Submit" /> <input type="reset" name="Submit2" value="Reset" /></td>
               </tr>
            </table>
         </td>
      </form>
   </tr>
</table>
<table width="400" border="0" align="center" cellpadding="3" cellspacing="0">
   <tr>
      <td><strong><a href="viewguestbook.php">View Guestbook</a> </strong></td>
   </tr>
</table>
```

## STEP3: Create file addguestbook.php
![](http://phpeasystep.com/imgs/gustbook_di.gif)

```php
<?php
$host     = "localhost"; // Host name
$username = ""; // Mysql username
$password = ""; // Mysql password
$db_name  = "test"; // Database name
$tbl_name = "guestbook"; // Table name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password") or die("cannot connect server ");
mysql_select_db("$db_name") or die("cannot select DB");

$datetime = date("y-m-d h:i:s"); //date time

$sql    = "INSERT INTO $tbl_name(name, email, comment, datetime)VALUES('$name', '$email', '$comment', '$datetime')";
$result = mysql_query($sql);

//check if query successful
if ($result) {
    echo "Successful";
    echo "<BR>";
    
    // link to view guestbook page
    echo "<a href='viewguestbook.php'>View guestbook</a>";
}

else {
    echo "ERROR";
}

mysql_close();
?>
```

## STEP4: Create file viewguestbook.php
![](http://phpeasystep.com/imgs/guestbook_view.gif)

```php
<table width="400" border="0" align="center" cellpadding="3" cellspacing="0">
   <tr>
      <td><strong>View Guestbook | <a href="guestbook.php">Sign Guestbook</a> </strong></td>
   </tr>
</table>
<br>
<?php
   $host="localhost"; // Host name
   $username=""; // Mysql username
   $password=""; // Mysql password
   $db_name="test"; // Database name
   $tbl_name="guestbook"; // Table name
   
   // Connect to server and select database.
   mysql_connect("$host", "$username", "$password")or die("cannot connect server ");
   mysql_select_db("$db_name")or die("cannot select DB");
   
   $sql="SELECT * FROM $tbl_name";
   $result=mysql_query($sql);
   
   while($rows=mysql_fetch_array($result)){
   ?>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
   <tr>
      <td>
         <table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
            <tr>
               <td>ID</td>
               <td>:</td>
               <td><? echo $rows['id']; ?></td>
            </tr>
            <tr>
               <td width="117">Name</td>
               <td width="14">:</td>
               <td width="357"><? echo $rows['name']; ?></td>
            </tr>
            <tr>
               <td>Email</td>
               <td>:</td>
               <td><? echo $rows['email']; ?></td>
            </tr>
            <tr>
               <td valign="top">Comment</td>
               <td valign="top">:</td>
               <td><? echo $rows['comment']; ?></td>
            </tr>
            <tr>
               <td valign="top">Date/Time </td>
               <td valign="top">:</td>
               <td><? echo $rows['datetime']; ?></td>
            </tr>
         </table>
      </td>
   </tr>
</table>
<?php
   }
   mysql_close(); //close database
   ?>
```
