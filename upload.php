<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="post" enctype="multipart/form-data" action="upload.php">
    <input type="file" name="image" accept=".png,.jpg" required> 
    <input type="submit" name="upload" value="Upload">
</form>

<?php 
require('config.php');
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "hotels_ugd");

  if (isset($_POST['upload'])) {
  $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  mysqli_query($db, "insert into images values('$image')");

}
?>
    
</body>
</html>