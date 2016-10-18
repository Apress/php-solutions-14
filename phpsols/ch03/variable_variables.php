<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Variable variables</title>
</head>

<body>
<?php
/*$location = 'city';
$$location = 'London';
echo $city . '<br>';*/
$fields = [
    'name'     => 'David',
    'email'    => 'david@example.com',
    'comments' => "What's a variable variable?"
];
foreach ($fields as $key => $value) {
    $$key = $value;
}
echo $name . '<br>';
echo $email . '<br>';
echo $comments;
?>
</body>
</html>