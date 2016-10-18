<?php
if (isset($_GET['go'])) {
    require_once '../includes/connection.php';
    $conn = dbConnect('read', 'pdo');
    $sql = 'SELECT image_id, filename, caption FROM images
            WHERE caption LIKE :search';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':search', '%' . $_GET['search'] . '%');
    $stmt->execute();
    $errorInfo = $stmt->errorInfo();
    if (isset($errorInfo[2])) {
        $error = $errorInfo[2];
    } else {
        $stmt->bindColumn('image_id', $image_id);
        $stmt->bindColumn('filename', $filename);
        $stmt->bindColumn(3, $caption);
        $numRows = $stmt->rowCount();
    }
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>PDO Prepared Statement</title>
</head>

<body>
<?php
if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<form method="get" action="">
    <input type="search" name="search" id="search">
    <input type="submit" name="go" value="Search">
</form>
<?php if (isset($numRows)) { ?>
    <p>Number of results for <b><?= htmlentities($_GET['search']); ?></b>:
        <?= $numRows; ?></p>
    <?php if ($numRows) { ?>
        <table>
            <tr>
                <th>image_id</th>
                <th>filename</th>
                <th>caption</th>
            </tr>
            <?php while ($stmt->fetch()) { ?>
                <tr>
                    <td><?= $image_id; ?></td>
                    <td><?= $filename; ?></td>
                    <td><?= $caption; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php }
} ?>
</body>
</html>