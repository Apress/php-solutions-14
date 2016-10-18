<!DOCTYPE HTML>
<html>
<head>
<meta  charset="utf-8">
<title>Read File into Array</title>
</head>

<body>
<?php
$sonnet = file('C:/private/sonnet.txt');
echo $sonnet[0];
?>
</body>
</html>