<?php
require_once('../includes/connection.php');
$conn = dbConnect('read');
$getImages = 'SELECT image_id, filename FROM images';
$images = $conn->query($getImages);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta  charset="utf-8">
    <title>MySQLi: Insert Integer in SQL</title>
    <style>
        figure {
            margin: 30px;
            display:block;
        }
        figcaption {
            font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
            font-weight:bold;
            display:inline-block;
            max-width:250px;
            margin:10px;
        }
    </style>
</head>

<body>
<form action="" method="get">
    <select name="image_id">
        <?php while ($row = $images->fetch_assoc()) { ?>
            <option value="<?= $row['image_id']; ?>"
                <?php if (isset($_GET['image_id']) && $_GET['image_id'] == $row['image_id']) {
                    echo 'selected';
                } ?>
                ><?= $row['filename']; ?></option>
        <?php } ?>
    </select>
    <input type="submit" name="go" value="Display">
</form>
<?php
if (isset($_GET['image_id'])) {
    if (!is_numeric($_GET['image_id'])) {
        $image_id = 1;
    } else {
        $image_id = (int) $_GET['image_id'];
    }
    $sql = "SELECT filename, caption FROM images
            WHERE image_id = $image_id";
    $result = $conn->query($sql);
    if ($result->num_rows) {
        $row = $result->fetch_assoc();
        ?>
        <figure><img src="../images/<?php echo $row['filename']; ?>">
            <figcaption><?php echo $row['caption']; ?></figcaption>
        </figure>
    <?php } else { ?>
        <p>Image not found</p>
    <?php }
}?>
</body>
</html>