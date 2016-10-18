<!DOCTYPE HTML>
<html>
<head>
<meta  charset="utf-8">
<title>Enclosing Array Elements in Double Quotes</title>
</head>

<body>
<?php
$book = [
    'title'     => 'PHP Solutions: Dynamic Web Design Made Easy, Third Edition',
    'author'    => 'David Powers',
    'publisher' => 'Apress',
    'ISBN'      => '978-1-4302-xxxx-x'
];
echo "{$book['title']} was written by {$book['author']}.";
?>
</body>
</html>