<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="description" content="Bienvenue, Agent" />
        <meta charset="utf-8">
        <title>Agent</title>

        <script type="text/javascript">
        
function testDepartement(input) {
    var dep = input.value;
    pays = document.getElementById("pays");


    if (dep == 99) {
        pays.style.display = "inline";
        pays.value = "";
    } else {
        pays.style.display = "none";
        pays.value = "France";
    }
}

function hidePays() {
    var input = document.getElementById("pays");

    input.style.display = "none";
}

function testTel(input) {
    if (input.value.length !== 10) {
        input.style.backgroundColor = "#fba";
        return false;
    }
        for (let i = 0; i < input.value.length; i++) {
            if (isNaN(input.value[i])) {
                input.style.backgroundColor = "#fba";
                return false;
            }
        }
    input.style.backgroundColor = "";
    return true;
}


        </script>
    </head>
    <body onload="hidePays()">
        <form method="post">
            <fieldset>
                <legend>Créer ou modifier une fiche patient :</legend>
                <input type="text" name="idPatient" id="texte" placeholder="Identifiants">
                <input type="text" name="nomPatient" id="texte" placeholder="Nom du patient" required>
                <input type="text" name="prenomPatient" id="texte" placeholder="Prénom du patient" required>
                <input type="text" name="adressePatient" id="texte" placeholder="Adresse du patient" required>
                <input type="text" name="numeroPatient" id="texte" placeholder="Numéro de téléphone du patient" maxlength="10" oninput="testTel(this)" required>
                <input type="date" name="dateNaissancePatient" id="texte" placeholder="Date de Naissance du  patient" required>
                <input type="text" name="nss" id="texte" placeholder="NSS du patient" required>
                <input type="text" name="departementPatient" id="texte" placeholder="Département de naissance du patient" oninput="testDepartement(this)" required>
                <input type="text" name="paysPatient" id="pays" placeholder="Pays de Naissance" value="France" required>
                <input type="text" name="solde" placeholder="Solde du compte" required>
                <br>
                <input type="submit" name="creationPatient" id="bouton" value="Créer ou modifier">  
                <input type="reset" value="Effacer">
            </fieldset>
        </form>
        <form method="POST">
            <fieldset>
                <legend>Synthèse Patient :</legend>
                <input type="text" name="NSS" id="texte" placeholder="NSS du patient">
                <input type="submit" name="synthese" value="synthèse patient">
                <?php echo $synthese; ?>
            </fieldset>
        </form>
        <form method="POST">
            <fieldset>
                <legend>Trouver le NSS d'un patient :</legend>
                <input type="text" name="nom" id="texte" placeholder="Nom du patient" list="listeClients" required>
                    <dataList id="listeClients">
                        <?php echo $listeClients; ?>
                    </dataList>
                <input type="submit" name="trouver" id="bouton" value="Trouver">
                <?php echo $nss; ?>
            </fieldset>
        </form>
        <form method="POST">
            <fieldset>
                <legend>Créer un rdv :</legend>
                <input type="text" name="NSS" id="texte" placeholder="NSS du client" required>
                <input type="text" name="nom" id="texte" placeholder="Nom du médecin" required>
                <select id="liste" name="motif">
                <?php echo $listeMotifs; ?>
                </select>
                <input type="datetime-local" name="dateHeure" id="calendrier" placeholder="Date et Heure du rendez vous" required>
                <input type="submit" name="creationRDV" id="bouton" value="Créer RDV">
                <?php echo $displayErreur; ?>
            </fieldset>
        </form>

        <form method="POST" action="site.php">
            <p><input type="submit" value="Deconnexion"></p>
        </form>
    </body>
</html>