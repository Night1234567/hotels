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