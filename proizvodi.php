<?php
include "klase/korisnik.php";
$user = new User();
session_start();
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Niki's|Shop</title>
  <link rel="stylesheet" type="text/css" href="css/proizvodiStyle.css">
</head>
<body>
  <div class="navbar">
    <div class="logo">
      <img src="img/shopLogo.PNG" width="160px">
    </div>
    <h1><?php if($user->getName()!=null){echo "Dobrodošli, ". $user->getName(). "!";}else{echo "Dobrodošli";};?></h1>
    <nav>
      <ul>
        <li><a href="index.php">Početna</a></li>
        <li><a href="proizvodi.php">Prodavnica</a></li>
        <li><a href="onama.php">O nama</a></li>
        <li><a href="prijava.php">Prijavi se</a></li>
      </ul>
    </nav>
  </div>

  <h1>Products</h1>
  <div class="product-container">
    <div class="product">
      <img src="img/dietSendvic.jpg" alt="Sendvic">
      <h2>Diet Sendvič</h2>
      <p>cena: 380.00 din</p>
      <button onclick="dodajUKorpu('Sendvic')">Dodaj u korpu</button>
    </div>
    <div class="product">
      <img src="img/hronoTortilje.jpg" alt="Tortilje">
      <h2>Hrono Tortilje</h2>
      <p>cena: 550.00 din</p>
      <button onclick="dodajUKorpu('Tortilje')">Dodaj u korpu</button>
    </div>
    <div class="product">
      <img src="img/pastrmkaNaZaru.jpg" alt="Riba">
      <h2>Pastrmka na žaru</h2>
      <p>cena: 840,00 din</p>
      <button onclick="dodajUKorpu('Riba')">Dodaj u korpu</button>
    </div>
    <div class="product">
      <img src="img/zdravaSalata222.png" alt="Salata">
      <h2>Avokado salata</h2>
      <p>cena: 470,00 din</p>
      <button onclick="dodajUKorpu('Salata')">Dodaj u korpu</button>
    </div>
    <div class="product">
      <img src="img/vocnaSalata.jpg" alt="Vocna">
      <h2>Voćna salata</h2>
      <p>cena: 350,00 din</p>
      <button onclick="dodajUKorpu('Vocna')">Dodaj u korpu</button>
    </div>
  </div>

<div class="cart-container">
  <div id="cart-icon">&#128722;</div>
  <h1>Moja korpa  <span id="cart-items-count">0</span></h1>
  <ul id="cart-items"></ul>
</div>


  <script src="AJAX/shopping.js"></script>
</body>
</html>
