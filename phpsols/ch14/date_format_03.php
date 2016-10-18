<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Formatting with date()</title>
</head>

<body>
<p>It's now <?= date('g.ia'); ?> on <?= date('l, F jS, Y'); ?></p>
<p>Christmas 2010 falls on a <?= date('l', strtotime('12/25/2014')); ?></p>
</body>
</html>