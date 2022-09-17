<?php
require_once('./operations.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 >Registration Form</h1>
    <div>
        <form action="display.php" method="post" class="w-50" enctype="multipart/form-data">
            <?php inputFields("Username","username","","text")?>
            <?php inputFields("","file","","file")?>
            <button class="btn btn-dark" type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>