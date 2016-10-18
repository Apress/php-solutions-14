<?php
require_once '../includes/connection.php';
$conn = dbConnect('read', 'pdo');
$sql = 'SELECT filename, caption FROM images';
$result = $conn->query($sql);
$errorInfo = $conn->errorInfo();
if (isset($errorInfo[2])) {
    $error = $errorInfo[2];
} else {
    $numRows = $result->rowCount();
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Connecting with PDO</title>
</head>

<body>
<?php
if (isset($error)) {
    echo "<p>$error</p>";
} else {
    echo "<p>A total of $numRows records were found.</p>";
?>
    <table>
        <tr>
            <th>filename</th>
            <th>caption</th>
        </tr>
        <?php foreach ($conn->query($sql) as $row) { ?>
            <tr>
                <td><?= $row['filename']; ?></td>
                <td><?= $row['caption']; ?></td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>
</body>
</html>