<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Foreach loop - book</title>
</head>

<body>
<?php
$book = [
    'title'     => 'PHP Solutions: Dynamic Web Design Made Easy, Third Edition',
    'author'    => 'David Powers',
    'publisher' => 'Apress',
    'ISBN'      => '978-1-4842-0636-2'
];
foreach ($book as $key => $value) {
    echo "$key: $value<br>";
}
?>
</body>
</html>
