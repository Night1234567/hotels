<?php
  include_once '../config.php';
  include '../check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hotels</title>
  <script src="https://cdn.tailwindcss.com" defer></script>
  <link rel="stylesheet" href="style.css">
<body>
<header class="header">
		<h1 class="logo"><a href="#">Hotels</a></h1>
      <ul class="main-nav">
          <li><a href="admin.php">Admin</a></li>
          <li><a href="home.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="../logout.php"><b>Log Out</b></a></li>
      </ul>
	</header> 

<?php
$sql = "SELECT id, Name, cena, lokacija,slika FROM hotels";
$result = mysqli_query($link,$sql);

if ($result->num_rows>0){
    while($row = $result->fetch_assoc())
    {
      ?>
        <div class="wrapper"> 
          <h1><?php echo $row['Name']; ?></h1>
          
          <div class="details"><h1></h1>
          <div class="image" style="height: 350px;"> <?php echo '<img src="data:images;base64,'.base64_encode($row['slika']).'">'; ?></div>
          <h2><?php echo $row['lokacija']; ?></h2>
          <p>3 Days - 2 Nights</p></div>
          <h1><?php echo $row['cena']; ?>$</h1> <br>
          <button type="button" onclick="location.href = 'book.php';" class="mybtn bg-blue-500 hover:bg-blue-400 font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded active:bg-blue-500 color:white ;transition duration-150 ease-in-out }">
            Book Now
        </button>


        </div>
      <?php

    }

}
else{
    echo "0 result";
}

//Fetch resulting rows as an array

$informed = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Freeing result from the memory.

mysqli_free_result($result);


?>
</body>
</html>