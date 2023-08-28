<?php

$servName = 'localhost';
$un = 'root';
$pw = '';
$dbName = 'kolokvijumi';

$conn = mysqli_connect($servName, $un, $pw, $dbName);

if(!$conn){
    die("Connection failed ". mysqli_connect_error());
}

?>