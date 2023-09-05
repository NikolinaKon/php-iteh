<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Niki's|LogIn </title>
        <link rel="stylesheet" href="css/prijavaStyle.css">
    </head>
    <body>
        <div class="navbar">
                    <div class="logo">
                        <img src="img/shopLogo.PNG" width="160px">
                    </div>
                    <nav>
                    <h1 class="porukaDobrodoslice">
                    <?php
                        include "klase/korisnik.php";
                        session_start();
                        if(isset($_POST['korIme']) && isset($_POST['lozinka'])){
                            $un = $_POST['korIme'];
                            $pw = $_POST['lozinka'];

                            $kor = new User();
                            
                            $conn = mysqli_connect("localhost", "root", "", "kolokvijumi");
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }


                            $sql = "SELECT name FROM user WHERE username = '$un' AND password = '$pw'";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                $name = $row['name'];
                                $kor->setName($name);
                                $kor->setUsername($un);
                                $kor->setPassword($pw);

                                $_SESSION['user']=$kor;;
                                header("Location: index.php");
                            } else {
                                echo "Pogrešno korisničko ime ili lozinka!";
                            }

                            mysqli_close($conn);
                        }
                        ?>

                    </h1>
                        <ul>
                            <li><a href="index.php">Početna</a></li>
                            <li><a href="proizvodi.php">Prodavnica</a></li>
                            <li><a href="onama.php">O nama</a></li>
                            <li><a href="prijava.php">Prijavi se</a></li>
                        </ul>
                    </nav>
        </div>
        <div class="containerLogin"  >
            <h1 class="naslov">Unesite podatke</h1>
            <form class="formPrijava" method="post">
                <label for="ime" class="nazivInputa">Korisničko ime:</label><br>
                <input type="text" id="ime" name="korIme" class="unos"><br>
                <label for="loz" class="nazivInputa">Lozinka:</label><br>
                <input type="password" id="loz" name="lozinka" class="unos"><br>
                <button type="submit" class="dugmePrijava">Prijavite se</button>
            </form>
        </div>
    </body>
    // style = "position:relative; left:-300px; top:2px"
    