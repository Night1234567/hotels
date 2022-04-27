<?php
require_once "../config.php";
 // Taking all 5 values from the form data(input)
// Closing the connection.
 $Name =  isset($_POST['Name']) ? $_POST['Name'] : '';
 $lokacija = isset($_POST['lokacija']) ? $_POST['lokacija'] : '';
 $cena =  isset($_POST['cena']) ? $_POST['cena'] : '';
 // If file upload form is submitted 
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
            $insert = $link->query("INSERT into hotels (slika, created) VALUES ('$imgContent', NOW())"); 
             
            if($insert){ 
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
echo $statusMsg; 
   
 // Performing insert query execution
 // here our table name is college
 $sql = "INSERT INTO hotels VALUES ('$Name','$lokacija','$cena')";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header class="header">
		<h1 class="logo" style="color:#154c79 "><a href="#">Hotels|</a></h1>
      <ul class="main-nav">
          <li><a href="admin.php">Admin</a></li>
          <li><a href="home.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="../logout.php"><b>Log Out</b></a></li>
      </ul>
	</header> 
<form action="admin.php" method="post" enctype="multipart/form-data">
    <p>
        <label for="firstName">Име на хотелот:</label>
        <input type="text" name="Name" id="firstName">
    </p>                  
    <p>
        <label for="lastName">Локација:</label>
        <input type="text" name="lokacija" id="lastName">
    </p>            
    <p>
    <label for="Gender">Цена:</label>
        <input type="text" name="cena" id="Gender">
    </p>
    <p>
    <label>Select Image File:</label>
        <input type="file" name="image">
    </p>
    <input type="submit" value="Submit">
</form>
    
<style>
@import url('https://fonts.googleapis.com/css?family=Lato:200,400|Playfair+Display');
body {
  background-image: linear-gradient(190deg, rgba(0, 0, 99, .05) 10%, rgba(0, 0, 255, .19) 100%);
  padding: 0;
  margin: 0;
}
.wrapper {
  float: left;
  width: 30%;
  min-width: 300px;
  background-color: #f1f1f1;
  margin: 1.5%;
  padding: 2em 1em;
  box-sizing: border-box;
  box-shadow: 0 1px 30px rgba(0, 0, 0, 0.12), 0 3px 5px rgba(0, 0, 0, 0.24);
  text-align: center;
}
.wrapper>h1 {
  font-family: "Lato", sans-serif;
  font-weight: 200;
  font-size: 1.5em;
  letter-spacing: .15em;
  color: #333;
  padding-bottom: 10px;

}
.details {
  width: 95%;
  margin: 0 auto 2em;
  padding-top: 1.5em;
  padding-bottom: 1em;
  background-color: #FFEBC8;
  color: #333;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 5px rgba(0, 0, 0, 0.24);
  transition: all ease-in 0.15s;
}

.wrapper:hover .details{
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 5px rgba(0,0,0,0.22);
  transform: translate(0px, -2px) scale(1.01);
}

.details>h1 {
  font-family: "Playfair Display";
  font-size: 1em;
}
.details>h2 {
  font-family: sans-serif;
  font-size: 1.4em;
  font-weight: 200;
  letter-spacing: 0.1em;
  padding-top: 210px;
}
.details>p {
  font-family: sans-serif;
  font-size: 1em;
  font-weight: 200;
}


.image{
  position: relative;
  z-index: 2;
  width: 85%;
  height: 191px;
  margin: 0 auto -10em;
  background-size: cover;
  background-position: center;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 10px rgba(0, 0, 0, 0.24);
  transition: all ease-in .15s;
}
.wrapper:hover .image{
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
  transform: translate(0px, -3px) scale(1.02);
}
  
.i1{
    background-image: url(https://31.media.tumblr.com/9e9ba532a3174811c79e07bc4a61ebdc/tumblr_n92w6iRSjY1r5gmiko1_500.jpg);
}

@media screen and (max-width: 1000px) {
  .wrapper{
    width: 47%;
  }
}
@media screen and(max-width:700px){
  .wrapper{
    float: none;
    width: 70%;
    margin: 1em auto;
  }
}
@media screen and(max-width:700px){
  .wrapper{
    float: none;
    width: 70%;
    margin: 1em auto;
  }
}

/* Header  */


* {
	box-sizing: border-box;
}
body {
	font-family: 'Montserrat', sans-serif;
	line-height: 1.6;
	margin: 0;
	min-height: 100vh;
}
ul {
  margin: 0;
  padding: 0;
  list-style: none;
}





.logo {
	margin: 0;
	font-size: 1.85em;
  font-family: "Garamond";
  font-weight: bold;
}

.main-nav {
	margin-top: 5px;

}
.logo a,
.main-nav a {
	padding: 10px 15px;
	text-transform: uppercase;
	text-align: center;
	display: block;
}

.main-nav a {
	color: #34495e;
	font-size: .99em;
}

.main-nav a:hover {
	color: #718daa;
}



.header {
	padding-top: .5em;
	padding-bottom: .5em;
	border: 1px solid #a2a2a2;
	background-color: #f4f4f4;
	-webkit-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.75);
	box-shadow: 0px 0px 14px 0px rgba(0,0,0,0.75);
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
}


/* ================================= 
  Media Queries
==================================== */




@media (min-width: 769px) {
	.header,
	.main-nav {
		display: flex;
	}
	.header {
		flex-direction: column;
		align-items: center;
		width: 80%;
		margin: 0 auto;
		max-width: 1150px;
	}
	}



@media (min-width: 1025px) {
	.header {
		flex-direction: row;
		justify-content: space-between;
	}

}

.section{
        padding-top: 3%;
        padding-bottom: 3%;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-weight: bold;
        font-size: 25px;
    }
    .hr {
    border-top: 1px solid rgb(0, 0, 0);
    margin: 5px;
    }
.row{
    padding: 10px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
</style>
</body>
</html>