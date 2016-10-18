<!DOCTYPE HTML>
<html>
<head>
<meta  charset="utf-8">
<title>Multidimensional array: print_r()</title>
</head>

<body>
<?php
$books = [
    [
        'title'     => 'PHP Solutions: Dynamic Web Design Made Easy, Third Edition',
        'author'    => 'David Powers',
        'publisher' => 'Apress',
        'ISBN'      => '978-1-4842-0636-2'
    ],
    [
        'title'     => 'Beginning PHP and MySQL: From Novice to Professional, Fourth Edition',
        'author'    => 'W. Jason Gilmore',
        'publisher' => 'Apress',
        'ISBN'      => '978-1-4302-3114-1'
    ]
];
print_r($books);
?>
</body>
</html>
