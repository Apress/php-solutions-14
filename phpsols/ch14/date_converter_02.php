<!DOCTYPE HTML>
<html>
<head>
    <meta  charset="utf-8">
    <title>Convert Date to ISO Format</title>
    <style>
        input[type="number"] {
            width:50px;
        }
    </style>
</head>

<body>
<form method="post" action="">
    <p>
        <label for="month">Month:</label>
        <select name="month" id="month">
            <?php
            $months = ['Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug', 'Sep', 'Oct', 'Nov','Dec'];
            $thisMonth = date('n');
            for ($i = 1; $i <= 12; $i++) { ?>
                <option value="<?= $i; ?>"
                    <?php
                    if ((!$_POST && $i == $thisMonth) ||
                        (isset($_POST['month']) && $i == $_POST['month'])) {
                        echo ' selected';
                    } ?>>
                    <?= $months[$i - 1]; ?>
                </option>
            <?php } ?>
        </select>
        <label for="day">Date:</label>
        <input name="day" type="number" required id="day" max="31" min="1" maxlength="2"
               value="<?php if (!$_POST) {
                   echo date('j');
               } elseif (isset($_POST['day'])) {
                   echo $_POST['day'];
               } ?>">
        <label for="year">Year:</label>
        <input name="year" type="number" required id="year" maxlength="4"
               value="<?php if (!$_POST) {
                   echo date('Y');
               } elseif (isset($_POST['year'])) {
                   echo $_POST['year'];
               } ?>">
    </p>
    <p>
        <input type="submit" name="convert" id="convert" value="Convert">
    </p>
</form>
<?php
if (isset($_POST['convert'])) {
    require_once 'utility_funcs.php';
    $converted = convertDateToISO($_POST['month'], $_POST['day'],
        $_POST['year']);
    if ($converted[0]) {
        echo 'Valid date: ' . $converted[1];
    } else {
        echo 'Error: ' . $converted[1] . '<br>';
        echo 'Input was: ' . $months[$_POST['month']-1] . ' ' .
            $_POST['day'] . ', ' . $_POST['year'];
    }
}
?>
</body>
</html>