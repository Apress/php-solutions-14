<?php
if (isset($_GET['go'])) {
    require_once '../includes/connection.php';
    $conn = dbConnect('read');
    $searchterm = '%' . $conn->real_escape_string($_GET['search']) . '%';
    $sql = "SELECT * FROM images WHERE caption LIKE '$searchterm'";
    $result = $conn->query($sql);
    if (!$result) {
        $error = $conn->error;
    } else {
        $numRows = $result->num_rows;
    }
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>MySQLi: Insert String</title>
</head>

<body>
<?php
if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<form method="get" action="">
    <input type="search" name="search" id="search">
    <input type="submit" name="go" id="go" value="Search">
</form>
<?php if (isset($numRows)) { ?>
    <p>Number of results for <b><?= htmlentities($_GET['search']); ?></b>: <?= $numRows; ?></p>
    <?php if ($numRows) { ?>
        <table>
            <tr>
                <th>image_id</th>
                <th>filename</th>
                <th>caption</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['image_id']; ?></td>
                    <td><?= $row['filename']; ?></td>
                    <td><?= $row['caption']; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php }
} ?>
</body>
</html>