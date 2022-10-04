<?php

function conectar(){
$user = "root";
$pass = "";
$host = "localhost";
$connection = mysqli_connect($host, $user, $pass);
$datab ="bakery";
$db = mysqli_select_db($connection, $datab);
return $connection;
}

?>