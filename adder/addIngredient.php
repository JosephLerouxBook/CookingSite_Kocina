<?php
require '../php/conexion.php';
$connexion = dbconexion();


if(isset($_POST['nomIngredient'])) {    //Verifie si un nom d'ingredient a bien été recuperer
    $nomIngredient = $_POST['nomIngredient'];   //Stock le nom de l'ingredient
    echo "Le nom de l'ingredient récupéré est : " . $nomIngredient;  //Affiche le nom recuperer
    if(isset($_POST['metric'])) {   //Verifie si une metric a été tapper
        $metric = $_POST['metric']; //Stock la metric 
        echo "<br>La metrique de l'ingredient récupéré est : " . $metric. "<br>"; //Affiche la metric
        $sql = "INSERT INTO `ingredients` (`idIngr`, `nomIngredient`, `metric`) VALUES (NULL, '".$nomIngredient."', '".$metric."');"; // Requette SQL
        $resultat = mysqli_query($connexion, $sql);     //Envoie la requette a la BDD
        if($resultat == true){ //Verifie que la requette c'est bien passer, affiche une ligne en fonction
            echo "La requete est un succes !";
        }
        else {
            echo "R.I.P : La requete est un echec.";
        }
    } else {
        echo "R.I.P : Aucune metric n'a été envoyé.";
    }
} else {
    echo "R.I.P : Aucun nom d'ingredient n'a été envoyé.";
}
?>
