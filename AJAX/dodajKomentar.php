<?php
include "../dbConn.php";
include "../klase/koment.php";
        $korId = $_GET['korId'];
        $naziv = $_GET['naziv'];
        $cena = $_GET['cena'];
        $opis = $_GET['opis'];
        $mysqli = new mysqli("localhost", "root", "", "kolokvijumi");

        if($mysqli->connect_error){
            die("Connection failed: " . $mysqli->connect_error);
        }

        $sql = "INSERT INTO komentari VALUES ('$naziv', '$cena', '$opis', '$korId')";
        $result = mysqli_query($mysqli, $sql);

        echo "<table>
        <tr>
        <th>Naziv proizvoda</th>
        <th>Cena</th>
        <th>Komentar</th>
        <th>Korisnikov ID</th>
        </tr>";

        $querySelectKomentari = "SELECT * FROM komentari";
        $result1 = $mysqli->query($querySelectKomentari);

        while($row=mysqli_fetch_object($result1)){
            $kom = new Komentar();
            $kom->setNaziv($row->naziv);
            $kom->setCena($row->cena);
            $kom->setOpis($row->opis);
            $kom->setKorId($row->korId);
            echo "<tr>";
            echo "<td>".$kom->getNaziv()."</td>";
            echo "<td>".$kom->getCena()."</td>";
            echo "<td>".$kom->getOpis()."</td>";
            echo "<td>".$kom->getKorId()."</td>";
            echo "</tr>";
        }

        echo "</table>";

       $mysqli->close();
    ?>