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

        </script>
    </head>
    <body onload="hidePays()">
        <form method="post">
            <fieldset>
                <legend>Créer ou modifier une fiche patient :</legend>
                <input type="text" name="idPatient" id="texte" placeholder="Identifiants">
                <input type="text" name="nomPatient" id="texte" placeholder="Nom du patient">
                <input type="text" name="prenomPatient" id="texte" placeholder="Prénom du patient">
                <input type="text" name="adressePatient" id="texte" placeholder="Adresse du patient">
                <input type="text" name="numeroPatient" id="texte" placeholder="Numéro de téléphone du patient" maxlength="10">
                <input type="text" name="dateNaissancePatient" id="texte" placeholder="Date de Naissance du  patient">
                <input type="text" name="departementPatient" id="texte" placeholder="Département de naissance du patient" onblur="testDepartement(this)">
                <input type="text" name="paysPatient" id="pays" placeholder="Pays de Naissance" value="France">
                <br>
                <input type="submit" name="creationPatient" id="bouton" value="Créer ou modifier">  
                <input type="reset" value="Effacer">
            </fieldset>
            <fieldset>
                <legend>Synthèse Patient :</legend>
                <input type="text" name="nss" id="texte" placeholder="NSS du patient">
                <input type="submit" name="synthese" value="synthèse patient">
            </fieldset>
        </form>
    </body>
</html>