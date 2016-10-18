<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>DateInterval: Add</title>
</head>

<body>
<?php
$xmas2014 = new DateTime('12/25/2014');
$xmas2014->add(new DateInterval('P12D'));
?>
<p>Twelfth Night falls on <?= $xmas2014->format('l, F jS, Y'); ?>.</p>
</body>
</html>