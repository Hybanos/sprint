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
    } else if (isset($_POST["CreerPersonnel"])) {
        $id = $_POST["id"];
        $categorie = $_POST["categorie"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        ctrlCreerModifierPersonnel($id, $categorie, $nom, $prenom, $login, $mdp);
    
    } else if (isset($_POST["suppPersonnel"])) {
        foreach ($_POST as $key=>$val) {
            if (str_starts_with($key, "suppPersonnelId")) {
                ctrlSupprimerPersonnel($val);
            }
        }
        ctrlAfficherPageDirecteur();

    } else if (isset($_POST["CreerMotif"])) {
        $id = $_POST["id"];
        $libelle = $_POST["libelle"];
        $prix = $_POST["prix"];
        
        $id = ctrlCreerModifierMotif($id, $libelle, $prix);
        
        foreach ($_POST as $key=>$val) {
            if (str_starts_with($key, "pieceCheck")) {
                echo $key.",".$val. " ";
                ctrlAjouterRequiert($id, $val);
            } else if (str_starts_with($key, "consigneCheck")) {
                echo $key.",".$val. " ";
                ctrlAjouterNecessite($id, $val);
            }
        }
        ctrlAfficherPageDirecteur();
    
    } else if (isset($_POST["suppMotif"])) {
        foreach ($_POST as $key=>$val) {
            if (str_starts_with($key, "suppMotifCheck")) {
                ctrlSupprimerMotif($val);
            }
        }
        ctrlAfficherPageDirecteur();
    } else {
        ctrlAfficherAcceuil();
    }

} catch(Exception $e) {
    echo $e;
}