<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K.J. Fruis</title>
</head>
<body>
<!-- <form action="javascript:history.back()" method="POST" enctype="multipart/form-data"> -->
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
    <input type="submit" name="submit" value=/>
    </form>
</body>
</html>