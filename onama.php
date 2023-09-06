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
        <title>Niki's|About us</title>
        <link rel="stylesheet" href="css/indexStyle.css">
        <style>
            .navbar ul li a{
                color:rgb(18, 55, 15);
            }
        </style>
    </head>
    
<body>
    
    <div class="navbar">
                <div class="logo">
                    <img src="img/shopLogo.PNG" width="160px">
                </div>
                <h1><?php if($user->getName()!=null){echo "   Dobrodošli, ". $user->getName(). "!";}
                          else{echo " Dobrodošli!";};?></h1>
                <nav>
                    <ul>
                        <li><a href="index.php">Početna</a></li>
                        <li><a href="proizvodi.php">Prodavnica</a></li>
                        <li><a href="onama.php">O nama</a></li>
                        <li><a href="prijava.php">Prijavi se</a></li>
                    </ul>
                </nav>
    </div>
</body>
<head>

        <div>
        <h1 style="font-size: 50px"> Prica o nama </h1>
        <p style="font-size: 26px; color: #eed1b2">   Niki's je online prodavnica koja se posvećuje pružanju svežih i zdravih namirnica direktno do vaših vrata. Naša priča započela je sa strašću i posvećenošću prema kvalitetnoj ishrani. Svesni smo koliko je važno obezbediti sebi i svojoj porodici najbolje što priroda može ponuditi.</p>
        <p style="font-size: 26px; color: #eed1b2">   Sa tim ciljem, tim stručnjaka i zaljubljenika u zdrav životni stil okupio se i osnovao Niki's. Naša misija je da olakšamo ljudima put ka zdravijem načinu ishrane, nudeći pažljivo odabrane sveže namirnice koje su pune hranljivih vrednosti i ukusa. </p>
        <p style="font-size: 26px; color: #eed1b2">   Sarađujemo direktno sa farmerima i dobavljačima koji dele našu strast prema kvalitetu. Na taj način obezbeđujemo da svaka voćka, povrće i ostali proizvodi koje nudimo budu ubrani u savršenoj zrelosti i isporučeni sa pažnjom kako bi sačuvali svoju svežinu i hranljivost. </p>
        <p style="font-size: 26px; color: #eed1b2">   Naš asortiman obuhvata široku paletu sveže hrane, uključujući organsko voće i povrće, integralne žitarice, orašaste plodove i još mnogo toga. Želimo da svako ko poseti Niki's pronađe inspiraciju za stvaranje ukusnih, hranljivih obroka koji podržavaju njihovo zdravlje i blagostanje.</p>
        <p style="font-size: 26px; color: #eed1b2">   Niki's nije samo prodavnica, već i zajednica ljudi koji dele istu strast prema zdravoj ishrani. Naša vizija je da inspirišemo ljude da se brinu o sebi putem ishrane i da pružimo resurse i podršku za ostvarivanje tog cilja.</p>
        <p style="font-size: 26px; color: #eed1b2">   Pratite nas dok nastavljamo da rastemo i širimo uticaj zdrave ishrane na živote što većeg broja ljudi. Vaša podrška nam znači mnogo, i radujemo se što možemo biti deo vašeg putovanja ka zdravijem životu sa Niki's</p>
        </div>
    <title>Ostavite komentar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f00;
        }

        .form-group label {
        }

        .form-control {
            border: 2px solid #000;
            padding: 8px;
        }
    </style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="AJAX/komentariAjax.js"></script>
    <div class="container mt-5">
        <h1 class="mb-4">Ostavite komentar</h1>
        <form method="post" onsubmit="radSaKomentarima(); return false;">
            <div class="form-group">
                <label for="naziv"><b>Naziv:</b></label>
                <input type="text" class="form-control" id="naziv" name="naziv" required>
            </div>
            <div class="form-group">
                <label for="cena"><b>Cena:</b></label>
                <input type="number" class="form-control" id="cena" name="cena" step="10" required>
            </div>
            <div class="form-group">
                <label for="opis"><b>Komentar:</b></label>
                <textarea class="form-control" id="opis" name="opis" rows="4" cols="50"></textarea>
            </div>
            <div class="form-group">
                <label for="korId"><b>Korisnikov ID:</b></label>
                <input type="number" class="form-control" id="korId" name="korId" required>
            </div>
            
            <button type="submit" class="btn btn-primary" name="submitbtn" id="submitbtn">Potvrdi</button>
            <button class="btn btn-primary" name="deletebtn" id="deletebtn" onclick="obrisiKomentare();">Obriši komentare</button>
        </form>
    </div>
</body>
<head>
    <title>Podaci baze podataka</title>
    <style>
        body {
            background-color: #FFD8D0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #D2D2D2;
        }
    </style>
</head>
<body>
    <h1>Prethodni komentari</h1>
    <?php
        $mysqli = new mysqli("localhost", "root", "", "kolokvijumi");

        if($mysqli->connect_error){
            die("Connection failed: " . $mysqli->connect_error);
        }

        $stmt = $mysqli->prepare("SELECT * FROM komentari");
        $stmt->execute();

        $stmt->bind_result($naziv, $cena, $opis, $korId,$datum);
        
        include "klase/koment.php";
        $kom = new Komentar();
        $kom->setNaziv($naziv);
        $kom->setCena($cena);
        $kom->setOpis($opis);
        $kom->setKorId($korId);
        $kom->setDatum($datum);
        

        echo "<table id='tblKomentari'>";
        echo "<tr>";
        echo "<th>Naziv proizvoda</th>";
        echo "<th>Cena</th>";
        echo "<th>Komentar</th>";
        echo "<th>Korisnikov ID</th>";
        echo "<th>Datum</th>";
        echo "</tr>";

        while($stmt->fetch()){
            $kom = new Komentar();
            $kom->setNaziv($naziv);
            $kom->setCena($cena);
            $kom->setOpis($opis);
            $kom->setKorId($korId);
            $kom->setDatum($datum);
            echo "<tr>";
            echo "<td>".$kom->getNaziv()."</td>";
            echo "<td>".$kom->getCena()."</td>";
            echo "<td>".$kom->getOpis()."</td>";
            echo "<td>".$kom->getKorId()."</td>";
            echo "<td>".$kom->getDatum()."</td>";
            echo "</tr>";
        }

        echo "</table>";

        $stmt->close();
        $mysqli->close();
    ?>
</body>
</html>
