<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <script src="https://cdn.tailwindcss.com" defer></script>
</head>
<body>
    
<?php

require_once '../config.php';

$sql = "SELECT id, username FROM MyGuests";
$result = mysqli_query($link, $sql);

  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["id"]. " - Username: " . $row["username"]. "<br>";
  }


mysqli_close($link);

?>
</body>
</html>