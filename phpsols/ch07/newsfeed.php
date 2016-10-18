<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Pulling in an RSS Feed</title>
    <link rel="stylesheet" href="../styles/newsfeed.css" type="text/css">
</head>

<body>
<h1>The Latest from BBC News</h1>
<?php
$url = 'http://feeds.bbci.co.uk/news/world/rss.xml';
$feed = simplexml_load_file($url, 'SimpleXMLIterator');
$filtered = new LimitIterator($feed->channel->item, 0, 4);
foreach ($filtered as $item) { ?>
    <h2><a href="<?= $item->link; ?>"><?= $item->title;?></a></h2>
    <p class="datetime"><?php $date = new DateTime($item->pubDate);
        $date->setTimezone(new DateTimeZone('America/New_York'));
        $offset = $date->getOffset();
        $timezone = ($offset == -14400) ? ' EDT' : ' EST';
        echo $date->format('M j, Y, g:ia') . $timezone; ?></p>
    <p><?php echo $item->description; ?></p>
<?php } ?>
</body>
</html>