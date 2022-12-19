<?php
require_once("modele/modele.php");
// require_once("vue/vue.php");

function ctrlAfficherAcceuil() {
    // afficherAcceuil();
}

function ctrlAfficherListeListes($liste) {
    // fonction pour la VUE qui affiche toutes les listes, sinon y'en aura 15 ca va etre un enfer
    // afficherListeListes($liste)
}

// CLIENTS

function ctrlAjouterClient($nom, $prenom, $adresse, $tel, $dateNaissance, $departementNaissance, $paysNaissance, $NSS, $mdp) {
    ajouterClient($nom, $prenom, $adresse, $tel, $dateNaissance, $departementNaissance, $paysNaissance, $NSS, $mdp);
    ctrlAfficherListeListes(getClients());
}

function ctrlModifierClient($id, $nom, $prenom, $adresse, $tel, $dateNaissance, $departementNaissance, $paysNaissance, $NSS, $mdp) {
    modifierClient($id, $nom, $prenom, $adresse, $tel, $dateNaissance, $departementNaissance, $paysNaissance, $NSS, $mdp);
    ctrlAfficherListeListes(getClients());
}

function ctrlSupprimerClient($id) {
    supprimerClient($id);
    ctrlAfficherListeListes(getClients());
}

// MEDECINS

function ctrlAjouterMedecin($nom, $prenom, $login, $mdp, $spe) {
    ajouterMedecin($nom, $prenom, $login, $mdp, $spe);
    ctrlAfficherListeListes(getMedecins());
}

function ctrlModifierMedecin($id, $nom, $prenom, $login, $mdp, $spe) {
    modifierMedecin($id, $nom, $prenom, $login, $mdp, $spe);
    ctrlAfficherListeListes(getMedecins());
}

function ctrlSupprimerMedecin($id) {
    supprimerMedecin($id);
    ctrlAfficherListeListes(getMedecins());
}

// RENDEZ-VOUS

function ctrlAjouterRDV($idSpe, $idMotif, $idClient, $date) {
    ajouterRDV($idSpe, $idMotif, $idClient, $date);
    ctrlAfficherListeListes(getRDVs());
}

function ctrlModifierRDV($id, $idSpe, $idMotif, $idClient, $date) {
    modifierRDV($id, $idSpe, $idMotif, $idClient, $date);
    ctrlAfficherListeListes(getRDVs());
}

function ctrlSupprimerRDV($id) {
    supprimerRDV($id);
    ctrlAfficherListeListes(getRDVs());
}