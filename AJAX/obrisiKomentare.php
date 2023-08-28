<?php
include "../dbConn.php";

$mysqli = new mysqli("localhost", "root", "", "kolokvijumi");

if($mysqli->connect_error){
    die("Connection failed: " . $mysqli->connect_error);
}

$queryDeleteAll = "DELETE FROM komentari WHERE 1";
$result = $mysqli->query($queryDeleteAll);

echo "<table>
<tr>
<th>Naziv proizvoda</th>
<th>Cena</th>
<th>Komentar</th>
<th>Korisnikov ID</th>
</tr>";

$mysqli->close();

?>