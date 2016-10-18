<?php
// uncomment the following life if PHP can't detect the line endings in the CSV file
//ini_set('auto_detect_line_endings', true);
if (!file_exists($userlist) || !is_readable($userlist)) {
    $error = 'Login facility unavailable. Please try later.';
} else {
    $file = fopen($userlist, 'r');
    // ignore the titles in the first row of the CSV file
    $titles = fgetcsv($file);
    // loop through the remaining lines
    while (($data = fgetcsv($file)) !== false) {
        // ignore if the first element is null
        if (is_null($data[0])) {
            continue;
        }
        // if username and password match, create session variable,
        // regenerate the session ID, and break out of the loop
        if ($data[0] == $username && $data[1] == $password) {
            $_SESSION['authenticated'] = 'Jethro Tull';
            session_regenerate_id();
            break;
        }
    }
    fclose($file);
    // if the session variable has been set, redirect
    if (isset($_SESSION['authenticated'])) {
        header("Location: $redirect");
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
