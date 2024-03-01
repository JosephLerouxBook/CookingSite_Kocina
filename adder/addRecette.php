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
        // Si oui, ajoute l'étape au tableau $etapes
        echo "<br>".$value;
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




// Debut de l'envoie des requette vers la BDD
//Envoie des information de bases dbo.recette
$sql = "INSERT INTO `recette` (`idR`, `nomRecette`, `description`, `activeTime`, `totalTime`, `nbrPersonne`, `tags`, `imgSrc`) VALUES (NULL, $titre, $description, $activeTime, $totalTime, $nbrPerson, '', '/XXX/XX/X/X')";
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
echo "<br>".$sql_getidr;
$resultat = mysqli_query($connexion, $sql_getidr);     //Envoie la requette a la BDD
if($resultat){      //Verifie que la requette c'est bien passer, affiche une ligne en fonction
    $row = mysqli_fetch_assoc($resultat);
    // Vérifie si des données ont été trouvées
    if ($row) {
        // Récupère l'ID de la recette
        $idRecette = $row['idR'];
        echo "<br>".$idRecette;
    } else {
        echo "<br>Aucune idR correspondante trouvée.";
    }
}
else {
    echo "<br>R.I.P : La requete dbo.recette est un echec.";
}


//Envoie de l'auteur vers dbo.recrea 
$sql_addcrea ="INSERT INTO `recrea` (`idRecrea`, `idCreateur`, `idRec`) VALUES ('', $auteur, $idRecette);";
echo "<br>".$sql_addcrea;
$resultat = mysqli_query($connexion, $sql_addcrea);     //Envoie la requette a la BDD
if($resultat){      //Verifie que la requette c'est bien passer, affiche une ligne en fonction
    echo "<br>L'ajout de l'auteur a bien été prise en compte par la BDD";
}
else {
    echo "<br>Problemes avec l'ajout de l'auteur a la BDD.";
}

//Envoie des ingredients vers dbo.recing (use idR)
//Envoie des etapes vers dbo.recetapes (use idR)

echo ("<br>");
print_r($etapes);
echo ("<br><br><br>".$titre." ".$description." ".$activeTime." ".$totalTime." ".$nbrPerson." ".$auteur);
?>