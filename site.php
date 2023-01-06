<?php
require_once("controleur/controleur.php");

try {
    if (isset($_POST["envoyerCreneauxBloques"])) {
        foreach ($_POST as $key=>$val) {
            if (str_starts_with($key, "addedfield") && isset($val)) {
                // ajouterTache(date($val), 0);
            }
        }
    }
    ctrlTestMedecin();


} catch(Exception $e) {
    echo $e;
}