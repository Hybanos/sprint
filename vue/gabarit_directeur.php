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
                <input type="text" name="AncienneId" id="texte" placeholder="Id de l'employe à modifier">
                <input type="text" name="id" id="texte" placeholder="Identifiants">
                <input type="text" name="mdp" id="texte" placeholder="Mot de passe">
                <select id="liste" name="fonction">
                    <option value="agent">Agent</option>
                    <option value="agent">Medeckin</option>
                    <option value="agent">Directeur</option>
                </select>
                <input type="submit" name="CreerEmploye" id="bouton" value="Création">
                <input type="submit" name="ModifierEmploye" id="bouton" value="Modification">
                <input type="reset" value="Effacer">
            </fieldset>
            <fieldset>
                <legend>Gestionnaire de rendez-vous :</legend>
                <input type="text" name="IdRDV" id="texte" placeholder="Identifiants du rendez-vous">
                <input type="text" name="PrixRDV" id="texte" placeholder="Prix du rendez-vous">
                <input type="text" name="Pieces" id="texte" placeholder="Pièces à fournir">

                <input type="submit" name="CreerRDV" id="bouton" value="Création">
                <input type="submit" name="ModifierRDV" id="bouton" value="Modification">
                <input type="submit" name="SupprimerRDV" id="bouton" value="Suppresion">
                <input type="reset" value="Effacer">
            </fieldset>

            <fieldset>
                <legend>Créer ou supprimer une fiche médecin:</legend>
                <input type="text" name="Nom" id="texte" placeholder="Nom">
                <input type="text" name="Prénom" id="texte" placeholder="Prenom">
                <input type="text" name="Specialite" id="texte" placeholder="Spécialité">
                
                <input type="submit" name="CreerMedecin" id="bouton" value="Création">
                <input type="submit" name="SupprimerMedecin" id="bouton" value="Suppresion">
                <input type="reset" value="Effacer">
            </fieldset>
        </form>
    </body>
</html>