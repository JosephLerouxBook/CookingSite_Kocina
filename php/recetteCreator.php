<?php
require 'conexion.php';
$connexion = dbconexion();

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    // Récupération de la recette
    $sql = "SELECT * FROM recette where idR=$id"; // Requette SQL
    $resultat = mysqli_query($connexion, $sql); // Execution de la requette
    if (mysqli_num_rows($resultat) > 0) { // Vérifier si la requête a renvoyé des résultats
        while($ligne = mysqli_fetch_assoc($resultat)) {    // Parcourir les résultats et afficher les données
            //echo "ID: " . $ligne["idR"] . " - Nom: " . $ligne["nomRecette"] . " - activeTime: " . $ligne["activeTime"] . "<br>";
            $idrecette = $ligne["idR"];
            $nomRecette = $ligne["nomRecette"];
            $description = $ligne["description"];
            $activeTime = $ligne["activeTime"];
            $totalTime = $ligne["totalTime"];
            $nbrPersonne  = $ligne["nbrPersonne"];
            $img = $ligne["imgSrc"];
        }
    } else {
        return "Aucun résultat trouvé.";
    }

    // Récupération du créateur
    $sql_createur = "SELECT *
    FROM createur
    INNER JOIN recrea ON createur.idCreator = recrea.idCreateur
    INNER JOIN recette ON recrea.idRec = recette.idR
    WHERE recette.idR=$id;";
    $resultat_createur = mysqli_query($connexion, $sql_createur);
    if (mysqli_num_rows($resultat_createur) > 0) {
        while($ligne = mysqli_fetch_assoc($resultat_createur)) {
            //echo "ID: " . $ligne["idCreator"] . " - Nom: " . $ligne["nom"] . " - activeTime: " . $ligne["prenom"] . "<br>";
            $nom = $ligne["nom"];
            $prenom = $ligne["prenom"];
            $fullname = $nom ." ". $prenom;
        }
    } else {
        return "Aucun résultat trouvé.";
    }
// Faites quelque chose avec l'ID récupéré
} 
else {
    echo "Aucun ID n'a été envoyé.";
}



function ingredientCreator($connexion, $id){
    $sql = "SELECT *
    FROM ingredients
    INNER JOIN recing ON ingredients.idIngr = recing.idIng
    INNER JOIN recette ON recing.idRec = recette.idR
    WHERE recette.idR=$id;";
    $resultat = mysqli_query($connexion, $sql);
    // Vérifier si la requête a renvoyé des résultats
    if (mysqli_num_rows($resultat) > 0) {
        // Parcourir les résultats et afficher les données
        while($ligne = mysqli_fetch_assoc($resultat)) {
            //echo "ID: " . $ligne["idIngr"] . " - Nom: " . $ligne["nomRecette"] . " - activeTime: " . $ligne["activeTime"] . "<br>";
            $nomIngr = $ligne["nomIngredient"];
            if($ligne["metric"]){
                $metric = "de ".$ligne["metric"]." de ";
            }
            else{
                $metric = $ligne["metric"];
            }
            $quantite = $ligne["quantite"];
            echo "<li>".$quantite." ".$metric." ".$nomIngr."</li>";
        }
    } else {
        return "Aucun résultat trouvé.";
    }
}


function etapesCreator($connexion, $id){
    $sql = "SELECT * FROM etapes
    INNER JOIN recetape ON etapes.idEtape = recetape.idEtape 
    INNER JOIN recette ON recetape.idRec = recette.idR 
    WHERE recette.idR=$id
    ORDER BY etapes.numEtape ASC;";
    $resultat = mysqli_query($connexion, $sql);
    // Vérifier si la requête a renvoyé des résultats
    if (mysqli_num_rows($resultat) > 0) {
        // Parcourir les résultats et afficher les données
        while($ligne = mysqli_fetch_assoc($resultat)) {
            $numEtape = $ligne["numEtape"];
            $description = $ligne["descEtape"];
            echo '<div id="step-1" class="uk-grid-small uk-margin-medium-top" data-uk-grid>
            <div class="uk-width-auto">
              <a href="#" class="uk-step-icon" data-uk-icon="icon: check; ratio: 0.8" 
                data-uk-toggle="target: #step-1; cls: uk-step-active"></a>
            </div>
            <div class="uk-width-expand">
              <h5 class="uk-step-title uk-text-500 uk-text-uppercase uk-text-primary" data-uk-leader="fill:—">Etape '.$numEtape.'</h5>
              <div class="uk-step-content">'.$description.'</div>
            </div>
          </div>';
        }
    } 
    else {
        return "Aucun résultat trouvé.";
    }
}
?>