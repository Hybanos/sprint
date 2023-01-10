<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="description" content="Bienvenue, Agent" />
        <meta charset="utf-8">
        <link rel="stylesheet" href="vue/style.css">
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
    <div class="container">
        <form method="post">
            <fieldset>
                <legend>Créer ou modifier une fiche patient :</legend>
                <p>ID:<br><input type="text" name="idPatient" class="gabarit" placeholder="Identifiants"></p>
                <p>Nom:<br><input type="text" name="nomPatient" class="gabarit" placeholder="Nom du patient" required></p>
                <p>Prénom:<br><input type="text" name="prenomPatient" class="gabarit" placeholder="Prénom du patient" required></p>
                <p>Adresse:<br><input type="text" name="adressePatient" class="gabarit" placeholder="Adresse du patient" required></p>
                <p>Téléphone:<br><input type="text" name="numeroPatient" class="gabarit" placeholder="Numéro de téléphone du patient" maxlength="10" oninput="testTel(this)" required></p>
                <p>Date de naissance:<br><input type="date" name="dateNaissancePatient" class="gabarit" placeholder="Date de Naissance du  patient" required></p>
                <p>Numéro de sécurité sociale:<br><input type="text" name="nss" class="gabarit" placeholder="NSS du patient" required></p>
                <p>Département et pays de naissance:<br><input type="text" name="departementPatient" class="gabarit" placeholder="Département de naissance du patient" oninput="testDepartement(this)" required></p>
                <input type="text" name="paysPatient" id="pays" placeholder="Pays de Naissance" value="France" required>
                <p>Solde:<br><input type="text" name="solde" class="gabarit" placeholder="Solde du compte" required></p>
                <br>
                <input type="submit" name="creationPatient" id="bouton" value="Créer ou modifier">  
                <input type="reset" value="Effacer">
            </fieldset>
        </form>
    </div>
    <div class="container">
        <form method="POST">
            <fieldset>
                <legend>Synthèse Patient :</legend>
                <p>Numéro de sécurité sociale:<br><input type="text" name="NSS" class="gabarit" placeholder="NSS du patient"></p>
                <input type="submit" name="synthese" class="bouton" value="synthèse patient">
                <?php echo $synthese; ?>
            </fieldset>
        </form>
    </div>
    <div class="container">
        <form method="POST">
            <fieldset>
                <legend>Trouver le NSS d'un patient :</legend>
                <p>Nom du patient:<br><input type="text" name="nom" class="gabarit" placeholder="Nom du patient" list="listeClients" required></p>
                    <dataList id="listeClients">
                        <?php echo $listeClients; ?>
                    </dataList>
                <input type="submit" name="trouver" class="bouton" id="bouton" value="Trouver">
                <?php echo $nss; ?>
            </fieldset>
        </form>
    </div>
    <div class="container">
        <form method="POST">
            <fieldset>
                <legend>Créer un rdv :</legend>
                <p>Numéro de sécurité sociale<br><input type="text" name="NSS" class="gabarit" placeholder="NSS du client" required></p>
                <p>Nom du médecin<br><input type="text" name="nom" class="gabarit" placeholder="Nom du médecin" required></p>
                <p>Motif du rendez-vous<br><select id="liste" name="motif">
                <?php echo $listeMotifs; ?>
                </select></p>
                <p>Date et heure du rendez-vous<br><input type="datetime-local" name="dateHeure" class="gabarit" id="calendrier" placeholder="Date et Heure du rendez vous" required></p>
                <input type="submit" name="creationRDV" class="bouton" id="bouton" value="Créer RDV">
                <?php echo $displayErreur; ?>
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