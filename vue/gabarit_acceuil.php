<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="description" content="Acceuil" />
        <meta charset="utf-8">
        <title>Acceuil</title>
    </head>
    <body>
        <form method="post" action="site.php">
            <fieldset>
                <legend>Insérer vos identifiants :</legend>
                <input type="text" name="id" id="texte" placeholder="Identifiants" required>
                <input type="password" name="mdp" id="texte" placeholder="Mot de passe" required>
                <input type="submit" name="Connexion" id="bouton" value="Connexion">
                <input type="reset" value="Effacer">
            </fieldset>
        </form>
    </body>
</html>