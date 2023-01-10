<?php
require_once("controleur/controleur.php");

try {
    if (isset($_POST["Connexion"])) {
        ctrlLogin($_POST["id"], $_POST["mdp"]);

    } else if (isset($_POST["envoyerCreneauxBloques"])) {
        $id = $_POST["id"];
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        foreach ($_POST as $key=>$val) {
            if (str_starts_with($key, "addedfield") && isset($val)) {
                $date = substr_replace($val, " ", 10, 1);
                $date = substr_replace($date, "00", 14, 2);
                ctrlAjouterTache($date, $id);
            }
        }
        ctrlLogin($login, $mdp);
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
    } else if (isset($_POST["CreerMedecin"])) {
        $id = $_POST["id"];
        $spe = $_POST["specialite"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];

        ctrlCreerModifierMedecin($id, $spe, $nom, $prenom, $login, $mdp);

        ctrlAfficherPageDirecteur();
    } else if (isset($_POST["suppMedecins"])) {
        foreach ($_POST as $key=>$val) {
            if (str_starts_with($key, "medecinCheck")) {
                ctrlSupprimerMedecin($val);
                ctrlSupprimerPersonnel($val);
            }
        }
        ctrlAfficherPageDirecteur();
    } else if (isset($_POST["creationPatient"])) {
        $id = $_POST["idPatient"];
        $nom = $_POST["nomPatient"];
        $prenom = $_POST["prenomPatient"];
        $adresse = $_POST["adressePatient"];
        $numero = $_POST["numeroPatient"];
        $date = $_POST["dateNaissancePatient"];
        $nss = $_POST["nss"];
        $departementNaissance = $_POST["departementPatient"];
        $paysNaissance = $_POST["paysPatient"];
        $solde=$_POST["solde"];
        ctrlCreerModifierClient($id, $nom, $prenom, $adresse, $numero, $date,$departementNaissance, $paysNaissance, $nss, $solde);
        ctrlAfficherPageAgent(null, null, null, null);

    } else if (isset($_POST["synthese"])) {
        $NSS=$_POST["NSS"];
        ctrlSyntheseClient($NSS);

    } else if (isset($_POST["envoyerAjouterSolde"])) {
        $id = $_POST["id"];
        $solde = $_POST["ajouterSolde"];
        $NSS = $_POST["NSS"];
        ctrlAjouterSolde($id, $solde);
        ctrlAfficherPageAgent(null, null, null, null);

    } else if (isset($_POST["trouver"])) {
        $nom=$_POST["nom"];
        ctrlGetNSS($nom);

    } else if(isset($_POST["creationRDV"])){
        $nom=$_POST["nom"];
        $dateTime=$_POST["dateHeure"];
        $date = substr_replace($dateTime, " ", 10, 1);
        $date = substr_replace($date, "00", 14, 2);
        $NSS=$_POST["NSS"];
        $motif = $_POST["motif"];
        $erreur = ctrlCreerRDV($NSS, $nom, $date, $motif);
        ctrlAfficherPageAgent(null, null, $erreur, null);

    } else {
        ctrlAfficherAcceuil();
    }

} catch(Exception $e) {
    echo $e;
}