<?php 
  include '../check.php';

if(isset($_POST['submit'])){
    $to = "martin.tancev1@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

<!DOCTYPE html>
<head>
<title>Form submission</title>
<link rel="stylesheet" href="style.css">
<script src="https://cdn.tailwindcss.com" defer></script>
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
<form action="" method="post">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Email: <input type="text" name="email"><br>
Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html> 