<?php
require_once "../config.php";
include '../check.php';
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["slika"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["slika"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['slika']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
    
                $Name = $_POST['Name'];
                $lokacija = $_POST['lokacija'];
                $cena = $_POST['cena'];
                $sql = "INSERT INTO hotels (Name,lokacija,cena,slika) VALUES ('$Name','$lokacija','$cena','$imgContent')";   
    
            if(mysqli_query($link, $sql)){
                echo "Records added successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
            }
                
            if($sql){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
// echo $statusMsg; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com" defer></script>
    <link rel="stylesheet" href="style.css">
  </head>
<body>
<header class="header">
		<h1 class="logo" style="color:#154c79 "><a href="#">Hotels</a></h1>
      <ul class="main-nav">
          <li><a href="admin.php">Admin</a></li>
          <li><a href="home.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="../logout.php"><b>Log Out</b></a></li>
      </ul>
	</header> 
<form action="admin.php" method="post" enctype="multipart/form-data" style="margin: auto; width: 220px; margin-top:10px;">
    <p>
        <label for="Name">Име на хотелот:</label>
        <input type="text" name="Name" id="Name">
    </p>                  
    <p>
        <label for="lokacija">Локација:</label>
        <input type="text" name="lokacija" id="lokacija">
    </p>            
    <p>
        <label for="cena">Цена:</label>
        <input type="text" name="cena" id="cena">
    </p>
    <p>
        <label for="slika">Select Image File:</label>
        <input type="file" name="slika" id="slika">
    </p>
    <input type="submit" value="Submit" name="submit">
</form>
<?php
$result= mysqli_query($link,"SELECT * FROM hotels");
if (mysqli_num_rows($result) > 0) {

}
?>
  <table style="font-family: arial, sans-serif;border-collapse: collapse;width: 100%;">
  
  <tr>
    <td>Name</td>
    <td>lokacija</td>
    <td>cena</td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["Name"]; ?> <button type="button" onclick="drop()"></button></td>
    <td><?php echo $row["lokacija"]; ?></td>
    <td><?php echo $row["cena"]; ?></td>
</tr>
<?php
$i++;
// mysqli_close($link);

}
?>
</table>
<style>
  
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</body>
</html>