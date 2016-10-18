<?php
$file = fopen('C:/private/users.csv', 'r');
// get the first row from the CSV file to use as titles
$titles = fgetcsv($file);
$users = [];
while (($data = fgetcsv($file)) !== false) {
    // fgetcsv() returns an array with a single null value
    // if it encounters a blank line
    if (count($data) == 1 && is_null($data[0])) {
        continue;
    }
    // array_combine() creates an associative array using
    // the first array as array keys and the second as values
    $users[] = array_combine($titles, $data);
}
fclose($file);
echo '<pre>';
print_r($users);
echo '</pre>';
