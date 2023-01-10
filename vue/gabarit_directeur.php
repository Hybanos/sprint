<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="description" content="Bienvenue,Directeur" />
        <meta charset="utf-8">
        <link rel="stylesheet" href="vue/style.css">
        <title>Directeur</title>

        <script type="text/javascript">

function afficherEmployes() {
    var table = document.getElementById("tablePersonnel");
    var supp = document.getElementById("suppPersonnel");
    var button = document.getElementById("buttonEmployes");

    table.style.display = "block";
    supp.style.display = "block";
    button.value = "Cacher Employés";
    button.onclick = cacherEmployes;
}

function cacherEmployes() {
    var table = document.getElementById("tablePersonnel");
    var supp = document.getElementById("suppPersonnel");
    var button = document.getElementById("buttonEmployes");

    table.style.display = "none";
    supp.style.display = "none";
    button.value = "Afficher Employés";
    button.onclick = afficherEmployes;
}

function afficherMotifs() {
    var table = document.getElementById("tableMotif");
    var supp = document.getElementById("suppMotif");
    var button = document.getElementById("buttonMotifs");

    table.style.display = "block";
    supp.style.display = "block";
    button.value = "Cacher Motifs";
    button.onclick = cacherMotifs;
}

function cacherMotifs() {
    var table = document.getElementById("tableMotif");
    var supp = document.getElementById("suppMotif");
    var button = document.getElementById("buttonMotifs");

    table.style.display = "none";
    supp.style.display = "none";
    button.value = "Afficher Motifs";
    button.onclick = afficherMotifs;
}


function afficherMedecins() {
    var table = document.getElementById("tableMedecins");
    var supp = document.getElementById("suppMedecins");
    var button = document.getElementById("buttonMedecins");

    table.style.display = "block";
    supp.style.display = "block";
    button.value = "Cacher Medecins";
    button.onclick = cacherMedecins;
}

function cacherMedecins() {
    var table = document.getElementById("tableMedecins");
    var supp = document.getElementById("suppMedecins");
    var button = document.getElementById("buttonMedecins");

    table.style.display = "none";
    supp.style.display = "none";
    button.value = "Afficher Medecins";
    button.onclick = afficherMedecins;
}

        </script>
    </head>
    <body onload="cacherEmployes(); cacherMotifs(); cacherMedecins()">
    <div class="container">
        <form method="POST" id="personnel">
            <fieldset>
                <legend>Créer ou modifier une fiche employé :</legend>
                <p>ID du client:<br><input type="text" name="id" class="gabarit" placeholder="Id de l'employé à modifier"></p>
                <p>Catégorie:<br><select id="liste" name="categorie">
                    <option value="Agent">Agent</option>
                    <option value="Directeur">Directeur</option>
                </select></p>
                <p>Nom:<br><input type="text" name="nom" class="gabarit" placeholder="Nom"></p>
                <p>Prénom:<br><input type="text" name="prenom" class="gabarit" placeholder="Prenom"></p>
                <p>Login:<br><input type="text" name="login" class="gabarit" placeholder="Login"></p>
                <p>Mot de passe:<br><input type="text" name="mdp" class="gabarit" placeholder="Mot de passe"></p>
                <br>
                <input type="submit" name="CreerPersonnel" class="bouton" value="Créer ou modifier">
                <input type="reset" class="bouton" value="Effacer">
                <p><input type="button" value="Afficher Employés" class="bouton" id="buttonEmployes" onclick="afficherEmployes()"></p>
                <?php echo $listePersonnel; ?>
            </fieldset>
        </form>
    </div>
    <div class="container">

        <form method="POST" id="motif">
            <fieldset>
                <legend>Motifs de rendez-vous :</legend>
                <p>ID:<br><input type="text" name="id" class="gabarit" placeholder="ID du motif"></p>
                <p>Nom du motif:<br><input type="text" name="libelle" class="gabarit" placeholder="Nom du motif" required></p>
                <p>Prix du rendez-vous:<br><input type="text" name="prix" class="gabarit" placeholder="Prix du rendez-vous" required></p>
                <p>
                Pieces requises pour le motif :<?php echo $listePieces; ?></p>
                <p>
                Consignes pour le motif :<?php echo $listeConsignes; ?></p>
                <input type="submit" name="CreerMotif" class="bouton" value="Créer ou modifier">
                <input type="reset" class="bouton" value="Effacer">
                <p><input type="button" value="Afficher Motifs" class="bouton" id="buttonMotifs" onclick="afficherMotifs()"></p>
                <?php echo $listeMotif; ?>
            </fieldset>
        </form>
    </div>

    <div class="container">
        <form method="POST" id="medecin">
            <fieldset>
                <legend>Créer ou supprimer une fiche médecin:</legend>
                <p>ID:<br><input type="text" name="id" class="gabarit" placeholder="Id du mececin"> </p>
                <p>Spécialité:<br><select id="listemedecin" name="specialite"><p>
                <?php echo $listeSpecialite;?>
                </select>               
                <p>Nom:<br><input type="text" name="nom" class="gabarit" placeholder="Nom"></p>
                <p>Prénom:<br><input type="text" name="prenom" class="gabarit" placeholder="Prenom"></p>
                <p>Login:<br><input type="text" name="login" class="gabarit" placeholder="Login"></p>
                <p>Mot de passe:<br><input type="text" name="mdp" class="gabarit" placeholder="Mot de passe"></p>
                <input type="submit" name="CreerMedecin" class="bouton" value="Créer ou modifier">
                <input type="reset" class="bouton" value="Effacer">
                <p><input type="button" value="Afficher Medecins" class="bouton" id="buttonMedecins" onclick="afficherMedecins()"></p>
                <?php echo $listeMedecins; ?>
            </fieldset>
        </form>
    </div>

    <div class="container">
        <form method="POST" action="site.php">
            <p><input type="submit" class="bouton" value="Deconnexion"></p>
        </form>
    </div>
    </body>
</html>