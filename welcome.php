<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com" defer></script>
</head>
<body class="text-xs font-sans text-center">
    <h1 class="text-4xl mb-10 mt-5 gap-4">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="website/home.php" class="bg-cyan-500 hover:bg-cyan-600 p-5 rounded-full text-xl">Proceed to the website</a>
        <a href="logout.php" class="bg-sky-500 hover:bg-sky-600 p-5 rounded-full text-xl">Sign Out of Your Account</a>
    </p>
</body>
</html>