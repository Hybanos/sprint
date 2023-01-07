<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="description" content="Bienvenue, Agent" />
        <meta charset="utf-8">
        <title>Agent</title>
    </head>
    <body>
        <form method="post">
            <fieldset>
                <legend>Créer ou modifier une fiche patient :</legend>
                <input type="text" name="idPatient" id="texte" placeholder="Identifiants">
                <input type="text" name="nomPatient" id="texte" placeholder="Nom du patient">
                <input type="text" name="prenomPatient" id="texte" placeholder="Prénom du patient">
                <input type="text" name="adressePatient" id="texte" placeholder="Adresse du patient">
                <input type="text" name="numeroPatient" id="texte" placeholder="Numéro de téléphone du patient" maxlength="10">
                <input type="text" name="dateNaissancePatient" id="texte" placeholder="Date de Naissance du  patient">
                <input type="text" name="departementPatient" id="texte" placeholder="Département de naissance du patient">
                <input type="submit" name="creationPatient" id="bouton" value="Créer">
                <input type="submit" name="modificationPatient" id="texte" value="Modifier">
                <input type="reset" value="Effacer">
            </fieldset>
        </form>
    </body>
</html>