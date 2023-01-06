<?php
require_once("controleur/controleur.php");

try {
    if (isset($_POST["Connexion"])) {
        ctrlLogin($_POST["id"], $_POST["mdp"]);

    } else if (isset($_POST["envoyerCreneauxBloques"])) {
        foreach ($_POST as $key=>$val) {
            if (str_starts_with($key, "addedfield") && isset($val)) {
                echo $_POST["idhidden"];
                // ajouterTache(date($val), 0);
            }
        }
    } else {
        ctrlAfficherAcceuil();
    }

} catch(Exception $e) {
    echo $e;
}