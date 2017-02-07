<?php

include './autoloader.php';

$e = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $up = new Upload('fileToUpload', true);
    while($up->nextFile()) {
        if ($up->isOk()) {
            $up->saveUploadedFile('./tmp/'.$up->getName());
        }
        else {
            $e .= 'Error: '.$up->getName().'<br />';
        }
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
    <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php echo $e; ?>
</body>
</html>