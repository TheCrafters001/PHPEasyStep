# Get full web page URL from address bar
In this tutorial, you'll learn how to get current web page url from your web browser address bar using php script.

## Syntax
```php
<?php
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
echo $url;
?>
```

## Overview
In this tutorial, you'll learn 2 functions in php to get full url from address bar.

1. ```$_SERVER['HTTP_HOST']```
2. ```$_SERVER['REQUEST_URI']```

```$_SERVER['HTTP_HOST']``` - This function will show only server name.
```$_SERVER['REQUEST_URI']``` - This function will show you the path to file of your url.

## Code 
![](http://phpeasystep.com/imgs/apple_url.gif)

In the image is a url from apple website. When you run ```$_SERVER['HTTP_HOST'];``` you'll get result "www.apple.com" only, no "http://" no "/downloads/dashboard/email_messaging/todo.html"
```php
<?php
$server=$_SERVER['HTTP_HOST'];
echo $server;
?>
```
You'll get this is result
*www.apple.com*

When you run the script "```$_SERVER['REQUEST_URI']```" you'll get the result below.
no "http://" and no "www.apple.com"
### Sample
```php
<?php
$request_url=$_SERVER['REQUEST_URI'];
echo $request_url;
?>
```
This is a result when you run ```$_SERVER['REQUEST_URI']```
*/downloads/dashboard/email_messaging/todo.html*

To get full URL from this site you, we have to use (.) to connect 2 functions together and create http:// by yourself.
```php
<?php
$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
echo $url;
?>
```

## Display URL in text box (included javascript, click to select all text in text box)
![](http://phpeasystep.com/imgs/youtube_url.gif)

This is an example of javascript and php script, click to select all text in text box like youtube.com or many other site.
```html
<html>
<head>
<title>Get url for address bar</title>

<script type="text/javascript">
function select_all()
{
var text_val=eval("document.form_name.type");
text_val.focus();
text_val.select();
}
</script>

</head>
<body>

<form name=form_name method=post action=''''>
<input name="type" type="text" id="type" value="<?php $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; echo $url; ?>" size="50" onClick="select_all();">
</form>

</body>
</html>
```
