<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Formatting DateTime Objects</title>
</head>

<body>
<?php
$now = new DateTime();
$xmas2014 = new DateTime('12/25/2014');
?>
<p>It's now <?= $now->format('g.ia'); ?> on <?= $now->format('l, F jS, Y'); ?></p>
<p>Christmas 2014 falls on a <?= $xmas2014->format('l'); ?></p>
</body>
</html>