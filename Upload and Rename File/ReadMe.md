# Upload and Rename File
In this tutorial show you how to rename file when upload file to server to prevent new file overwrite an old file that exists in you server.
## Overview
In this tutorial, create 2 files
1. upload_rename.php
2. upload_rename_ac.php


### Steps
1. Create file upload_rename.php.
2. Create file upload_rename_ac.php.
2.1 Create folder "upload" for store uploaded files.
3. CHMOD your upload folder to "777" by using your ftp software(change permission).

## Step 1: Create file upload_rename.php
![](http://phpeasystep.com/imgs/single_file_upload.gif)

```html
<table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
   <tr>
      <form action="upload_rename_ac.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
         <td>
            <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
               <tr>
                  <td><strong>Single File Upload </strong></td>
               </tr>
               <tr>
                  <td>Select file
                     <input name="ufile" type="file" id="ufile" size="50" />
                  </td>
               </tr>
               <tr>
                  <td align="center"><input type="submit" name="Submit" value="Upload" /></td>
               </tr>
            </table>
         </td>
      </form>
   </tr>
</table>
```
## Step 2: Create file upload_rename_ac.php
```php
<?php

// Your file name you are uploading
$file_name = $HTTP_POST_FILES['ufile']['name'];

// random 4 digit to add to our file name
// some people use date and time in stead of random digit
$random_digit = rand(0000, 9999);

//combine random digit to you file name to create new file name
//use dot (.) to combile these two variables

$new_file_name = $random_digit . $file_name;

//set where you want to store files
//in this example we keep file in folder upload
//$new_file_name = new upload file name
//for example upload file name cartoon.gif . $path will be upload/cartoon.gif
$path = "upload/" . $new_file_name;
if ($ufile != none) {
    if (copy($HTTP_POST_FILES['ufile']['tmp_name'], $path)) {
        echo "Successful<BR/>";
        
        //$new_file_name = new file name
        //$HTTP_POST_FILES['ufile']['size'] = file size
        //$HTTP_POST_FILES['ufile']['type'] = type of file
        echo "File Name :" . $new_file_name . "<BR/>";
        echo "File Size :" . $HTTP_POST_FILES['ufile']['size'] . "<BR/>";
        echo "File Type :" . $HTTP_POST_FILES['ufile']['type'] . "<BR/>";
    } else {
        echo "Error";
    }
}
?>
```

## Step 3: CHMOD upload folder to 777 (change permission)
![](http://phpeasystep.com/imgs/rfp.gif)

This step, do it when you upload to real server. This example, I use WS-FTP, right click at upload folder > FTP Commands > CHMOD(Unix)
