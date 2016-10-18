<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>DateTime::createFromFormat</title>
</head>

<body>
<?php
$xmas2014 = DateTime::createFromFormat('d/m/Y', '25/12/2014');
echo $xmas2014->format('l, jS F Y');
?>
</body>
</html>