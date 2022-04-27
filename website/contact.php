<?php

use PHPMailer\PHPMailer\PHPMailer;
require __DIR__ . '/vendor/autoload.php';

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }


    if (!empty($errors)) {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    } else {
        $mail = new PHPMailer();

        // specify SMTP credentials
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'd5g6bc7a7dd6c7';
        $mail->Password = '27f211b3fcad87';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;

        $mail->setFrom($email, 'Mailtrap Website');
        $mail->addAddress('martin.tancev1@gmail.com', 'Me');
        $mail->Subject = 'New message from your website';

        // Enable HTML if needed
        $mail->isHTML(true);

        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", nl2br($message)];
        $body = join('<br />', $bodyParagraphs);
        $mail->Body = $body;

        echo $body;
        if($mail->send()){

            header('Location: thank-you.html'); // redirect to 'thank you' page
        } else {
            $errorMessage = 'Oops, something went wrong. Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}

?>

<html>
<head>
  <meta charset="utf-8">
  <title>Контакт</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></head>
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
  <form action="contact.php" method="post" id="contact-form" style="margin: auto; width: 220px; margin-top:10px;">
    <h2>Contact us</h2>

    <?php echo((!empty($errorMessage)) ? $errorMessage : '') ?>
    <p>
      <label>Име:</label>
      <input name="name" type="text" value=""/>
    </p>
    <p>
      <label>Емаил адреса:</label>
      <input style="cursor: pointer;" name="email" value="@gmail.com" type="text"/>
    </p>
    <p>
      <label>Порака:</label>
      <textarea name="message"></textarea>
    </p>

    <p>
      <input type="submit" value="Send" class="btn btn-danger"/>
    </p>
  </form>
  <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
  <script>
      const constraints = {
          name: {
              presence: {allowEmpty: false}
          },
          email: {
              presence: {allowEmpty: false},
              email: true
          },
          message: {
              presence: {allowEmpty: false}
          }
      };

      const form = document.getElementById('contact-form');

      form.addEventListener('submit', function (event) {
          const formValues = {
              name: form.elements.name.value,
              email: form.elements.email.value,
              message: form.elements.message.value
          };

          const errors = validate(formValues, constraints);

          if (errors) {
              event.preventDefault();
              const errorMessage = Object
                  .values(errors)
                  .map(function (fieldValues) {
                      return fieldValues.join(', ')
                  })
                  .join("\n");

              alert(errorMessage);
          }
      }, false);
  </script>
</body>

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
</html>