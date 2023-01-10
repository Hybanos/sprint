<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="description" content="Bienvenue,Directeur" />
        <meta charset="utf-8">
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
        <form method="POST" id="personnel">
            <fieldset>
                <legend>Créer ou modifier une fiche employé :</legend>
                <input type="text" name="id" id="texte" placeholder="Id de l'employé à modifier">
                <select id="liste" name="categorie">
                    <option value="Agent">Agent</option>
                    <option value="Directeur">Directeur</option>
                </select>
                <input type="text" name="nom" id="texte" placeholder="Nom">
                <input type="text" name="prenom" id="texte" placeholder="Prenom">
                <input type="text" name="login" id="texte" placeholder="Login">
                <input type="text" name="mdp" id="texte" placeholder="Mot de passe">
                <br>
                <input type="submit" name="CreerPersonnel" id="bouton" value="Créer ou modifier">
                <input type="reset" value="Effacer">
                <p><input type="button" value="Afficher Employés" id="buttonEmployes" onclick="afficherEmployes()"></p>
                <?php echo $listePersonnel; ?>
            </fieldset>
        </form>

        <form method="POST" id="motif">
            <fieldset>
                <legend>Motifs de rendez-vous :</legend>
                <input type="text" name="id" id="texte" placeholder="ID du motif">
                <input type="text" name="libelle" id="texte" placeholder="Nom du motif" required>
                <input type="text" name="prix" id="texte" placeholder="Prix du rendez-vous" required>
                <br>
                Pieces requises pour le motif :<?php echo $listePieces; ?>
                <br>
                Consignes pour le motif :<?php echo $listeConsignes; ?>
                <br>
                <input type="submit" name="CreerMotif" id="bouton" value="Créer ou modifier">
                <input type="reset" value="Effacer">
                <p><input type="button" value="Afficher Motifs" id="buttonMotifs" onclick="afficherMotifs()"></p>
                <?php echo $listeMotif; ?>
            </fieldset>
        </form>

        <form method="POST" id="medecin">
            <fieldset>
                <legend>Créer ou supprimer une fiche médecin:</legend>
                <input type="text" name="id" id="texte" placeholder="Id du mececin"> 
                <select id="listemedecin" name="specialite">
                <?php echo $listeSpecialite;?>
                </select>               
                <input type="text" name="nom" id="texte" placeholder="Nom">
                <input type="text" name="prenom" id="texte" placeholder="Prenom">
                <input type="text" name="login" id="texte" placeholder="Login">
                <input type="text" name="mdp" id="texte" placeholder="Mot de passe">
                <br>
                <input type="submit" name="CreerMedecin" id="bouton" value="Créer ou modifier">
                <input type="reset" value="Effacer">
                <p><input type="button" value="Afficher Medecins" id="buttonMedecins" onclick="afficherMedecins()"></p>
                <?php echo $listeMedecins; ?>
            </fieldset>
        </form>

        <form method="POST" action="site.php">
            <p><input type="submit" value="Deconnexion"></p>
        </form>
    </body>
</html>