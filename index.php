<?php

include './autoloader.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $up = new Upload('fileToUpload');
    if ($up->isOk()) {
        $up->saveUploadedFile('./test/'.$up->getName());
        header('Refresh: 0');
    }
}

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>