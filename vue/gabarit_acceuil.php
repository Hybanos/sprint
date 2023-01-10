<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta name="description" content="Acceuil" />
        <meta charset="utf-8">
        <link rel="stylesheet" href="vue/style.css">
        <title>Acceuil</title>
    </head>
    <body>
        <div class="container" id="acceuil">
        <form method="post">
            <fieldset>
                <legend>Insérer vos identifiants :</legend>
                <input type="text" name="id" class="texte" placeholder="Identifiants" required>
                <input type="password" name="mdp" class="texte" placeholder="Mot de passe" required>
                <input type="submit" name="Connexion" class="bouttonAcceuil" value="Connexion">
                <input type="reset" value="Effacer" class="bouttonAcceuil">
            </fieldset>
        </form>
        </div>
    </body>
</html>