<?php
require_once("modele/modele.php");
require_once("vue/vue.php");

function ctrlTestMedecin() {
    afficherTestMedecin();
}

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

// MOTIFS

function ctrlAjouterMotif($libelle, $montant) {
    ajouterMotif($libelle, $montant);
    ctrlAfficherListeListes(getMotifs());
}

function ctrlModifierMotif($id, $libelle, $montant) {
    modifierMotif($id,$libelle, $montant);
    ctrlAfficherListeListes(getMotifs());
}

function ctrlSupprimerMotif($id) {
    supprimerMotif($id);
    ctrlAfficherListeListes(getMotifs());
}

//PIECE

function ctrlAjouterPiece($libelle) {
    ajouterPiece($libelle);
    ctrlAfficherListeListes(getPiece());
}

function ctrlModifierPiece($id, $libelle) {
    modifierPiece($id, $libelle);
    ctrlAfficherListeListes(getPiece());
}

function ctrlSupprimerPiece($id) {
    supprimerPiece($id);
    ctrlAfficherListeListes(getPiece());
}

// CONSIGNE

function ctrlAjouterConsigne($libelle) {
    ajouterConsigne($libelle);
    ctrlAfficherListeListes(getConsigne());
}

function ctrlModifierConsigne($id, $libelle) {
    modifierConsigne($id, $libelle);
    ctrlAfficherListeListes(getConsigne());
}

function ctrlSupprimerConsigne($id) {
    supprimerConsigne($id);
    ctrlAfficherListeListes(getConsigne());
}

// TACHE ADMIN

function ctrlAjouterTache($date, $idPersonnel) {
    ajouterTache($date, $idPersonnel);
    ctrlAfficherListeListes(getTache());
}

function ctrlModifierTache($id, $date, $idPersonnel) {
    modifierTache($id, $date, $idPersonnel);
    ctrlAfficherListeListes(getTache());
}

function ctrlSupprimerTache($id) {
    supprimerTache($id);
    ctrlAfficherListeListes(getTache());
}

// CATEGORIE

function ctrlAjouterCategorie($categorie) {
    ajouterCategorie($categorie);
    ctrlAfficherListeListes(getCategorie());
}

function ctrlModifierCategorie($id, $categorie) {
    modifierCategorie($id, $categorie);
    ctrlAfficherListeListes(getCategorie());
}

function ctrlSupprimerCategorie($id) {
    supprimerCategorie($id);
    ctrlAfficherListeListes(getCategorie());
}

// SPECIALITE

function ctrlAjouterSpecialite($libelle) {
    ajouterSpecialite($libelle);
    ctrlAfficherListeListes(getSpecialite());
}

function ctrlModifierSpecialite($id, $libelle) {
    modifierSpecialite($id, $libelle);
    ctrlAfficherListeListes(getSpecialite());
}

function ctrlSupprimerSpecialite($id) {
    supprimerSpecialite($id);
    ctrlAfficherListeListes(getSpecialite());
}