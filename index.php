<?php
include "klase/korisnik.php";
$user = new User();
session_start();
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Niki's|Home</title>
        <link rel="stylesheet" href="css/indexStyle.css">
    </head>
    <body>
    <div class="navbar">
                <div class="logo">
                    <img src="img/shopLogo.PNG" width="160px">
                </div>
                <h1><?php if($user->getName()!=null){echo "   Dobrodošli, ". $user->getName(). "!";}else{echo "Dobrodošli";};?></h1>
                <nav>
                    <ul>
                        <li><a href="index.php">Početna</a></li>
                        <li><a href="proizvodi.php">Prodavnica</a></li>
                        <li><a href="onama.php">O nama</a></li>
                        <li><a href="prijava.php">Prijavi se</a></li>
                    </ul>
                </nav>
    </div>
     <hr>
        <div class="containerGlavna">
            <div class="row">
                <div class="col-2">
                    <h1 class="moto">Eat Good,<br>    Glow Good!</h1><br>
                    <p class="poziv">Želite li da postanete naš član?</p><br>
                    <a href="prijava.php"><button class="dugmePrijava">Prijavite se</button></a>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
    </body>