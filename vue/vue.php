<?php 

function afficherPageMedecin($medecin) {
    $nom=$medecin->NOM;
    $id=$medecin->IDPERSONNEL;
    require_once("gabaritMedecin.php");
}

function afficherAcceuil() {
    require_once("gabarit_acceuil.php");
}