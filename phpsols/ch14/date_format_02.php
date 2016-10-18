<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Formatting with date()</title>
</head>

<body>
<?php $xmas2014 = strtotime('12/25/2014'); ?>
<p>It's now <?= date('g.ia'); ?> on <?= date('l, F jS, Y'); ?></p>
<p>Christmas 2014 falls on a <?= date('l', $xmas2014); ?></p>
</body>
</html>