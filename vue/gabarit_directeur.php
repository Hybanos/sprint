<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="description" content="Bienvenue,Directeur" />
        <meta charset="utf-8">
        <title>Directeur</title>
    </head>
    <body>
        <form method="post" action="site.php">
            <fieldset>
                <legend>Créer ou modifier une fiche employé :</legend>
                <input type="text" name="id" id="texte" placeholder="Identifiants" required>
                <input type="text" name="mdp" id="texte" placeholder="Mot de passe" required>
                <select id="liste" name="fonction">
                    <option value="agent">Agent</option>
                    <option value="agent">Medeckin</option>
                    <option value="agent">Directeur</option>
                </select>
                <input type="submit" name="Créer" id="bouton" value="Création">
                <input type="reset" value="Effacer">
            </fieldset>
        </form>
    </body>
</html>