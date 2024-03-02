<?php
require '../php/conexion.php';
$connexion = dbconexion();

// Fonction generant les listes d'ingredients
function optionCreator($connexion){
    $sql = "SELECT * FROM ingredients"; // Requette SQL
    $resultat = mysqli_query($connexion, $sql); // Execution de la requette
    echo 
    "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var addSelectBtn = document.getElementById('addIng');
            var container = document.getElementById('ingContainer');

            addSelectBtn.addEventListener('click', function() { 
                var labelElement = document.createElement('label');  //label des ingredients
                labelElement.textContent = 'Quel quantité pour cette ingrédient : ';
                container.appendChild(labelElement);

                var inputElement = document.createElement('input');  //input des ingredient (quantité)
                inputElement.type = 'text';
                inputElement.name = 'ingredientQ[]'; // Le nom du champ input
                container.appendChild(inputElement);

                var selectElement = document.createElement('select'); //selected option menu deroulant
                selectElement.id = 'newSelect';
                selectElement.name = 'newSelect[]';"; //stock les id des differents ingredients choisi

    if (mysqli_num_rows($resultat) > 0) { // Vérifier si la requête a renvoyé des résultats
        while($ligne = mysqli_fetch_assoc($resultat)) {    // Parcourir les résultats et afficher les données
            $nomIngr = $ligne['nomIngredient'];
            $metric = $ligne['metric'];
            $idIngr = $ligne['idIngr'];
            $fullIngr = $nomIngr.", ".$metric;
            echo " // Créez une ou plusieurs options et ajoutez-les à l'élément <select>
                var option1 = document.createElement('option');
                option1.value = '".$idIngr."';
                option1.text = '".$fullIngr."';
                selectElement.add(option1);";  
        }
    } else {
        return "R.I.P :  Aucun Ingredients trouvé. Verifiez la BDD.";
    }

    echo " // Ajoutez l'élément <select> au conteneur
            container.appendChild(selectElement);
            var lineBreak = document.createElement('br');
            container.appendChild(lineBreak);
            });
        });
    </script>";
}

?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>

</head>

<body>
<h1>Createur de recette</h1>
<h3>Pour ajouter une recette a la bdd</h3>
<form action="addRecette.php" method="post">
    <label for="titre">Titre :</label><br>
    <input type="text" id="titre" name="titre" placeholder="Titre de votre recette"/>
    <br><br>
    <label for="description">Description :</label><br>
    <textarea name="description" rows="10" cols="30" placeholder="tRentrer une description de votre recette"></textarea>   
    <br><br>
    <label for="activeTime">Temps de préparation :</label><br>
    <input type="text" id="activeTime" name="activeTime" placeholder="Temps necessaire a cuisiner"/>
    <br><br>
    <label for="totalTime">Temps Total :</label><br>
    <input type="text" id="totalTime" name="totalTime" placeholder="Temps total avec cuisson etc..." />
    <br><br>
    <label for="nbrPerson">Nombre de personnes :</label><br>
    <input type="text" id="nbrPerson" name="nbrPerson" placeholder="Pour combien de personnes ?"/>
    <br><br>

    <?php  //Generateur :  Liste des Auteur disponibles
    $sql = "SELECT * FROM createur"; // Requette SQL
    $resultat = mysqli_query($connexion, $sql); // Execution de la requette
    echo '<label for="auteur">Choisissez un auteur:</label> <br>
    <select id="auteur" name="auteur">';
    if (mysqli_num_rows($resultat) > 0) { // Vérifier si la requête a renvoyé des résultats
        while($ligne = mysqli_fetch_assoc($resultat)) {    // Parcourir les résultats et afficher les données
            $idCrea = $ligne["idCreator"];
            $displayname = $ligne["prenom"]." ".$ligne["nom"];
            echo '<option value="'.$idCrea.'">'.$displayname.'</option>';
        }
    } else {
        return "R.I.P :  Aucun auteur trouvé. Verifiez la BDD.";
    }
        echo '</select>';
    ?>
        <h2>Étapes de préparation :</h2>
        <div id="etapesContainer"></div>
        <button type="button" id="addEtape">Ajouter une étape</button>
        <br><br>


        <h2>Ingredients:</h2>
        <div id="ingContainer"></div>
        <button type="button" id="addIng">Ajouter un ingredients</button>
    <br><br><br><br>
    <input type="submit" value="Envoyez">

    <script>
        //Quand click sur bouton d'ajout d'étape : crée une etape suplementaire.
        document.addEventListener('DOMContentLoaded', function () {
            var addButton = document.getElementById('addEtape');    // Sélection du bouton d'ajout
            var container = document.getElementById('etapesContainer'); // Sélection du conteneur où seront ajoutés les champs textarea
            var count = 1; // Compteur pour suivre le nombre d'étapes ajoutées    
            addButton.addEventListener('click', function () {   // Fonction pour ajouter un champ textarea
                var textarea = document.createElement('textarea');  // Création d'un nouveau champ textarea
                textarea.name = 'etape' + count; // Assigner un nom unique à chaque champ textarea
                textarea.placeholder = 'Étape ' + count;
                container.appendChild(textarea); // Ajouter le champ textarea au conteneur
                count++; // Incrémenter le compteur pour suivre le nombre d'étapes
            });
        });
    </script>
    <?php optionCreator($connexion); ?>
</form>

</body>


</html>
<?

?>