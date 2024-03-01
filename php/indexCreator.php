<?php
require 'conexion.php';
$connexion = dbconexion();

function panelGenerator($connexion){
    $sql = "SELECT *
    FROM createur
    INNER JOIN recrea ON createur.idCreator = recrea.idCreateur
    INNER JOIN recette ON recrea.idRec = recette.idR;"; // Requette SQL
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
            $prenom = $ligne["prenom"]; 
            $nom = $ligne["nom"];
            echo '
            <form id="form_id" action="recipe.php" method="post">
            <input type="hidden" name="id" id="id_input">
            <div onclick="submitForm('.$idrecette.')">
              <div class="uk-card">
                <div class="uk-card-media-top uk-inline uk-light">
                  <img class="uk-border-rounded-medium" src="'.$img.'" alt="Course Title">
                  <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <!-- <div class="uk-position-xsmall uk-position-top-right">
                    <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                      data-uk-icon="heart"></a>            
                  </div>    -->
                </div>
                <div>
                  <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">'.$nomRecette.'</h3>
                  <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
            <!--    <div class="uk-width-auto uk-flex uk-flex-middle">
                      <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                      <span class="uk-margin-xsmall-left">5.0</span>
                      <span>(73)</span>
                    </div>   -->
                    <div class="uk-width-expand uk-text-right">by '.$prenom.' '.$nom.'</div>
                  </div>
                </div>
              </div>
            </div>
          </form>';
        }
    } else {
        return "Aucun résultat trouvé.";
    }

}

?>