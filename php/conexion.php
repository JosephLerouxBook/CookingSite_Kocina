<?php
function dbconexion(){
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $bdd = 'cuisineleroux';

    // Connexion à la base de données
    $connexion = mysqli_connect($server, $username, $password, $bdd);

    // Vérifier la connexion
    if (!$connexion) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }
    else {return $connexion;}
}
?>