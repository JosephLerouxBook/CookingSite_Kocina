<?php
require '../php/conexion.php';
$connexion = dbconexion();

// Gestion des Etapes
$etapes = array();
$i = 1;
foreach ($_POST as $key => $value) {
    // Vérifie si le nom du champ commence par "etape"
    $etape = 'etape'.$i;
    if (strpos($key, $etape) === 0) {
        //echo "<br>".$value;
        $etapes[] = $value; //tableau contenant les etapes
        $i++;
    }
}

//Recuperation des Informations
$titre = "'".$_POST['titre']."'";
$description = "'".$_POST['description']."'";
$activeTime = $_POST['activeTime'];
$totalTime = $_POST['totalTime'];
$nbrPerson = $_POST['nbrPerson'];
$auteur = $_POST['auteur'];

if (isset($_POST['newSelect']) && !empty($_POST['newSelect'])) {
    $ingredients = $_POST['newSelect']; //tableau contenant les ingredients
    echo ("<br>");
    print_r($ingredients);
}
if (isset($_POST['ingredientQ']) && !empty($_POST['ingredientQ'])) {
    $ingredientsQ = $_POST['ingredientQ']; //tableau contenant les ingredients
    echo ("<br>");
    print_r($ingredientsQ);
}



/////////////////////////////////////////////////
// Debut de l'envoie des requette vers la BDD //
///////////////////////////////////////////////

//Envoie des information de bases dbo.recette
$sql = "INSERT INTO `recette` (`idR`, `nomRecette`, `description`, `activeTime`, `totalTime`, `nbrPersonne`, `tags`, `imgSrc`) VALUES (NULL, $titre, $description, $activeTime, $totalTime, $nbrPerson, '', './src/img/1-Omelette-au-safran.jpg')";
echo $sql;
$resultat = mysqli_query($connexion, $sql);     //Envoie la requette a la BDD
if($resultat == true){      //Verifie que la requette c'est bien passer, affiche une ligne en fonction
    echo "<br>La requete dbo.recette est un succes !";
}
else {
    echo "<br>R.I.P : La requete dbo.recette est un echec.";
}

//Recuperation de l'IDR generer
$sql_getidr="SELECT idR FROM `recette` WHERE nomRecette=$titre AND description=$description; ";
//echo "<br>".$sql_getidr;
$resultat = mysqli_query($connexion, $sql_getidr);     //Envoie la requette a la BDD
if($resultat){      //Verifie que la requette c'est bien passer, affiche une ligne en fonction
    $row = mysqli_fetch_assoc($resultat);
    // Vérifie si des données ont été trouvées
    if ($row) {
        // Récupère l'ID de la recette
        $idRecette = $row['idR'];
       // echo "<br>".$idRecette;
    } else {
        echo "<br>Aucune idR correspondante trouvée.";
    }
}
else {
    echo "<br>R.I.P : La requete dbo.recette est un echec.";
}


//Envoie de l'auteur vers dbo.recrea 
$sql_addcrea ="INSERT INTO `recrea` (`idRecrea`, `idCreateur`, `idRec`) VALUES ('', $auteur, $idRecette);";
//echo "<br>".$sql_addcrea;
$resultat = mysqli_query($connexion, $sql_addcrea);     //Envoie la requette a la BDD
if($resultat){      //Verifie que la requette c'est bien passer, affiche une ligne en fonction
    echo "<br>L'ajout de l'auteur a bien été prise en compte par la BDD";
}
else {
    echo "<br>Problemes avec l'ajout de l'auteur a la BDD.";
}

//Envoie des Etapes au 2 tables : dbo.etapes et dbo.recetapes
$i = 0;
while ($i < count($etapes)){
    $etapeNbr = $i + 1;
    $etapeDesc = "'".$etapes[$i]."'";
    $sql_addetape ="INSERT INTO `etapes` (`idEtape`, `numEtape`, `descEtape`) VALUES (NULL, $etapeNbr, $etapeDesc);";
    //echo "<br>".$sql_addetape;
    $resultat = mysqli_query($connexion, $sql_addetape);     //Envoie la requette a la BDD
    if($resultat){      //Verifie que la requette c'est bien passer, affiche une ligne en fonction
        echo "<br>L'ajout de l'etape dans dbo.etapes a bien été prise en compte par la BDD";
        $sql_idEtape = "SELECT idEtape FROM `etapes` WHERE numEtape=$etapeNbr AND descEtape=$etapeDesc;";
        //echo "<br>".$sql_idEtape;
        $resultat = mysqli_query($connexion, $sql_idEtape);     //Envoie la requette a la BDD
        if($resultat){
            $row = mysqli_fetch_assoc($resultat);
            // Vérifie si des données ont été trouvées
            if ($row) {
                // Récupère l'ID de la recette
                $etapeID = $row['idEtape'];
                //echo "<br>Etape ID : ".$etapeID;
                $sql_addreceta = "INSERT INTO `recetape` (`idRecetape`, `idRec`, `idEtape`) VALUES ('', $idRecette, $etapeID);";
                $resultat = mysqli_query($connexion, $sql_addreceta);
                if($resultat){
                    echo "Recetape a bien été modifié.";
                    echo "<br>-------------------------------------------------------<br>";
                }
                else {
                    echo "R.I.P : Recetape a eu un probleme";
                    echo "<br>-------------------------------------------------------<br>";
                }
            } else {
                echo "<br>Aucune EtapeID correspondante trouvée.";
            }
            echo "<br>La requete de récuperation de l'ID de l'etape c'est bien passer.";
        } else {
            echo "<br>R.I.P : La requete de récuperation de l'ID de l'etape c'est mal passer.";
        }
    }
    else {
        echo "<br>Problemes avec l'ajout de de l'etape dans dbo.etapes.";
    }
    $i++;
}

//Envoie des ingredients vers dbo.recing
$i = 0;
while ($i < count($ingredients)){
    $idIng = $ingredients[$i];
    $quantite = $ingredientsQ[$i];
    $sql_addrecing = "INSERT INTO `recing` (`idRecing`, `idIng`, `idRec`, `quantite`) VALUES (NULL, $idIng, $idRecette, $quantite)";
    $resultat = mysqli_query($connexion, $sql_addrecing);
    if($resultat){
        echo "L'ajout a dbo.recing est Ok !";
    } else {
        echo "R.I.P : L'ajout a dbo.recing c'est mal passer.";
    }
    $i++;
}




echo ("<br>");
//print_r($etapes);
//echo ("<br><br><br>".$titre." ".$description." ".$activeTime." ".$totalTime." ".$nbrPerson." ".$auteur);
?>