<?php

$server = 'localhost';
$username = 'root';
$password = '';
//$sql = "SELECT * from";

//Connexion 
$conn = new mysqli($server, $username, $password);

//Verification connexion
if($conn->connect_error){
    die('Erreur : ' .$conn->connect_error);
}else {
    echo 'Connexion réussie';
}

?>