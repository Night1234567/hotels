<?php
  include_once '../config.php';
  include '../check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<form action="reservation.php" method="post">
  <div class="elem-group">
    <label for="name"> Име и презиме</label>
    <input type="text" id="name" name="visitor_name" placeholder="Име Презиме" pattern=[A-Z\sa-z]{3,20} required>
  </div>
  <div class="elem-group">
    <label for="email">Емаил адреса</label>
    <input type="email" id="email" name="visitor_email" placeholder="petar@email.com" required>
  </div>
  <div class="elem-group">
    <label for="phone">Телефонски број</label>
    <input type="tel" id="phone" name="visitor_phone" placeholder="071-500-000" pattern=(\d{3})-?\s?(\d{3})-?\s?(\d{4}) required>
  </div>
  <div class="elem-group inlined">
    <label for="adult">Возрасни</label>
    <input type="number" id="adult" name="total_adults" placeholder="2" min="1" required>
  </div>
  <div class="elem-group inlined">
    <label for="child">Деца</label>
    <input type="number" id="child" name="total_children" placeholder="2" min="0" required>
  </div>
  <div class="elem-group inlined">
    <label for="checkin-date">Дата на пристигање</label>
    <input type="date" id="checkin-date" name="checkin" required>
  </div>
  <div class="elem-group inlined">
    <label for="checkout-date">Дата на заминување</label>
    <input type="date" id="checkout-date" name="checkout" required>
  </div>

 
  <div class="elem-group">
    <label for="message">Уште нешто?</label>
    <textarea id="message" name="visitor_message" placeholder="Напишете уште нешто што би било битно." ></textarea>
  </div>
  <button type="submit" class="button">Резервирај</button>
</form>
</body>

</html>

<script>var currentDateTime = new Date();
var year = currentDateTime.getFullYear();
var month = (currentDateTime.getMonth() + 1);
var date = (currentDateTime.getDate() + 1);

if(date < 10) {
  date = '0' + date;
}
if(month < 10) {
  month = '0' + month;
}

var dateTomorrow = year + "-" + month + "-" + date;
var checkinElem = document.querySelector("#checkin-date");
var checkoutElem = document.querySelector("#checkout-date");

checkinElem.setAttribute("min", dateTomorrow);

checkinElem.onchange = function () {
    checkoutElem.setAttribute("min", this.value);
}</script>
-<style>
  body {
  width: 500px;
  margin: 0 auto;
  padding: 20px;
  background: #ccccff;
  -webkit-transform:scale(0.5);
-moz-transform:scale(0.8);
-ms-transform:scale(0.8);
transform:scale(0.8);
}
 
div.elem-group {
  margin: 5px 0;
}
 
div.elem-group.inlined {
  width: 49%;
  display: inline-block;
 
 
}
 
label {
  display: block;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  padding-bottom: 8px;
  font-size: 1.25em;
}
 
input, select, textarea {
 
  border-radius: 18px;
  border: 2px solid #3366cc;
  box-sizing: border-box;
  font-size: 1.25em;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  width: 100%;
  padding: 8px;
}
 
div.elem-group.inlined input {
  width: 95%;
  display: inline-block;
}
 
textarea {
  height: 130px;
}
 
button {
 
  appearance: none;
  background-color: #9f9fdf;
  border: 2px solid #1A1A1A;
  border-radius: 15px;
  box-sizing: border-box;
  color: #3B3B3B;
  cursor: pointer;
  display: inline-block;
  font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-size: 16px;
  font-weight: 600;
  line-height: normal;
  margin: 0;
  min-height: 60px;
  min-width: 0;
  outline: none;
  padding: 16px 24px;
  text-align: center;
  text-decoration: none;
  transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: 100%;
  will-change: transform;
}
 
.button:hover {
  color: #fff;
  background-color: #000066;
  box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
  transform: translateY(-2px);
}
 
.button:active {
  box-shadow: none;
  transform: translateY(0);
}
 
 
 
</style>