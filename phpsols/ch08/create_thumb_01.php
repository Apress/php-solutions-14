<?php
$folder = 'C:/xampp/htdocs/phpsols/images/';
//$folder = '/Applications/MAMP/htdocs/phpsols/images/';
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Thumbnail</title>
</head>

<body>
<form method="post" action="">
    <p>
        <select name="pix" id="pix">
            <option value="">Select an image</option>
            <?php
            $files = new FilesystemIterator('../images');
            $images = new RegexIterator($files, '/\.(?:jpg|png|gif)$/i');
            foreach ($images as $image) {
                $filename = $image->getFilename();
                ?>
                <option value="<?= $folder . $filename; ?>"><?= $filename; ?></option>
            <?php } ?>
        </select>
    </p>
    <p>
        <input type="submit" name="create" value="Create Thumbnail">
    </p>
</form>
</body>
</html>