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

// MOTIFS

function ctrlAjouterMotif($libelle, $montant) {
    ajouterMotif($libelle, $montant);
    ctrlAfficherListeListes(getMotifs());
}

function ctrlModifierMotif($id, $libelle, $montant) {
    modifierMotif($id, $libelle, $montant);
    ctrlModifierMotif(getMotifs());
}

function ctrlSupprimerMotif($id) {
    supprimerMotif($id);
    ctrlSupprimerMotif(getMotifs());
}

//PIECE

function ctrlAjouterPiece($libelle) {
    ajouterPiece($libelle);
    ctrlAjouterPiece(getPiece());
}

function ctrlModifierPiece($id, $libelle) {
    modifierPiece($id, $libelle);
    ctrlModifierPiece(getPiece());
}

function ctrlSupprimerPiece($id) {
    supprimerPiece($id);
    ctrlSupprimerPiece(getPiece());
}

// CONSIGNE

function ctrlAjouterConsigne($libelle) {
    ajouterConsigne($libelle);
    ctrlAjouterConsigne(getConsigne());
}

function ctrlModifierConsigne($id, $libelle) {
    modifierConsigne($id, $libelle);
    ctrlModifierConsigne(getConsigne());
}

function ctrlSupprimerConsigne($id) {
    supprimerConsigne($id);
    ctrlSupprimerConsigne(getConsigne());
}

// TACHE ADMIN

function ctrlAjouterTache($date, $idPersonnel) {
    ajouterTache($date, $idPersonnel);
    ctrlAjouterTache(getTache());
}

function ctrlModifierTache($id, $date, $idPersonnel) {
    modifierTache($id, $date, $idPersonnel);
    ctrlAjouterTache(getTache());
}

function ctrlSupprimerTache($id) {
    supprimerTache($id);
    ctrlSupprimerTache(getTache());
}

// CATEGORIE

function ctrlAjouterCategorie($categorie) {
    ajouterCategorie($categorie);
    ctrlAjouterCategorie(getCategorie());
}

function ctrlModifierCategorie($id, $categorie) {
    modifierCategorie($id, $categorie);
    ctrlModifierCategorie(getCategorie());
}

function ctrlSupprimerCategorie($id) {
    supprimerCategorie($id);
    ctrlSupprimerCategorie(getCategorie());
}

// SPECIALITE

function ctrlAjouterSpecialite($libelle) {
    ajouterSpecialite($libelle);
    ctrlAjouterSpecialite(getSpecialite());
}

function ctrlModifierSpecialite($id, $libelle) {
    modifierSpecialite($id, $libelle);
    ctrlModifierSpecialite(getSpecialite());
}

function ctrlSupprimerSpecialite($id) {
    supprimerSpecialite($id);
    ctrlSupprimerSpecialite(getSpecialite());
}