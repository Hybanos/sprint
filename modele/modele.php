<?php
require_once("connect.php");

function getConnect() {
    $connection=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->query('SET NAMES UTF8');
    return $connection;
}

// CLIENT

function ajouterClient($nom, $prenom, $adresse,
                       $tel, $dateNaissance, $departementNaissance,
                       $paysNaissance, $NSS, $mdp) {
    $connection=getConnect();
    $query="INSERT INTO CLIENT
     VALUES (0, '$nom', '$prenom', '$adresse', '$tel', '$dateNaissance', '$departementNaissance', '$paysNaissance', '$NSS', '$mdp', 0)";
    $res=$connection->query($query);
    $res->closeCursor();
}

function modifierClient($id, $nom, $prenom, $adresse,
                       $tel, $dateNaissance, $departementNaissance,
                       $paysNaissance, $NSS, $mdp) {
    $connection=getConnect();
    $query="UPDATE CLIENT
    SET (0, '$nom', '$prenom', '$adresse', '$tel', '$dateNaissance', '$departementNaissance', '$paysNaissance', '$NSS', '$mdp', 0)
    WHERE IDCLIENT=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function supprimerClient($id) {
    $connection=getConnect();
    $query="DELETE FROM CLIENT WHERE IDCLIENT=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function getClients() {
    $connection=getConnect();
    $query="SELECT * FROM CLIENT";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $clients=$res->fetchall();
    $res->closeCursor();
    return $clients;
}

function modifierSolde($id, $montant) {
    $connection=getConnect();
    $query="UPDATE CLIENT SET SOLDE=$montant where IDCLIENT=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

// MEDECIN

function ajouterMedecin($nom, $prenom, $login, $mdp, $spe) {
    $connection=getConnect();
    $query="INSERT INTO MEDECIN VALUES (0, '$nom', '$prenom', '$login', '$mdp', '$spe')";
    $res=$connection->query($query);
    $res->closeCursor();
}

function modifierMedecin($id, $nom, $prenom, $login, $mdp, $spe) {
    $connection=getConnect();
    $query="UPDATE MEDECIN SET (0, '$nom', '$prenom', '$login', '$mdp', '$spe')
    WHERE IDMEDECIN=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function supprimerMedecin($id) {
    $connection=getConnect();
    $query="DELETE FROM MEDECIN WHERE IDPERSONNEL=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function getMedecins() {
    $connection=getConnect();
    $query="SELECT * FROM MEDECINS";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $medecins=$res->fetchall();
    $res->closeCursor();
    return $medecins;
}

// RENDEZ-VOUS

function ajouterRDV($idSpe, $idMotif, $idClient, $date) {
    $connection=getConnect();
    $query="INSERT INTO RDV VALUES (0, $idSpe, $idMotif, $idClient, $date)";
    $res=$connection->query($query);
    $res->closeCursor();
}

function modifierRDV($id, $idSpe, $idMotif, $idClient, $date) {
    $connection=getConnect();
    $query="UPDATE RDV SET (0, $idSpe, $idMotif, $idClient, $date) WHERE IDRDV=$id";
    $res=$connection->query($query);
    $res->closeCursor();
} 

function supprimerRDV($id) {
    $connection=getConnect();
    $query="DELETE FROM RDV WHERE IDRDV=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function getRDVs() {
    $connection=getConnect();
    $query="SELECT * FROM MEDECIN";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $rdvs=$res->fetchAll();
    $res->closeCursor();
    return $rdvs;
}

// MOTIFS

function ajouterMotif($libelle, $montant) {
    $connection=getConnect();
    $query="INSERT INTO MOTIF VALUES (0, '$libelle', $montant)";
    $res=$connection->query($query);
    $res->closeCursor();
}

function modifierMotif($id, $libelle, $montant) {
    $connection=getConnect();
    $query="UPDATE MOTIF SET (0, $libelle, $montant) WHERE IDMOTIF=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function supprimerMotif($id) {
    $connection=getConnect();
    $query="DELETE FROM MOTIF WHERE IDMOTIF=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function getMotifs() {
    $connection=getConnect();
    $query="SELECT * FROM MOTIF";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $motifs=$res->fetchAll();
    $res->closeCursor();
    return $motifs;
}

// PIECE

function ajouterPiece($libelle) {
    $connection=getConnect();
    $query="INSERT INTO PIECE VALUES (0, '$libelle')";
    $res=$connection->query($query);
    $res->closeCursor();
}

function modifierPiece($id, $libelle) {
    $connection=getConnect();
    $query="UPDATE PIECE SET (0, $libelle) WHERE IDPIECE=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function supprimerPiece($id) {
    $connection=getConnect();
    $query="DELETE FROM PIECE WHERE IDPIECE=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function getPiece() {
    $connection=getConnect();
    $query="SELECT * FROM PIECE";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $pieces=$res->fetchAll();
    return $pieces;
}

// CONSIGNE

function ajouterConsigne($libelle) {
    $connection=getConnect();
    $query="INSERT INTO CONSIGNE VALUES (0, '$libelle')";
    $res=$connection->query($query);
    $res->closeCursor();
}

function modifierConsigne($id, $libelle) {
    $connection=getConnect();
    $query="UPDATE CONSIGNE SET (0, $libelle) WHERE IDPIECE=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function supprimerConsigne($id) {
    $connection=getConnect();
    $query="DELETE FROM CONSIGNE WHERE CONSIGNE=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function getConsigne() {
    $connection=getConnect();
    $query="SELECT * FROM CONSIGNE";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $consignes=$res->fetchAll();
    return $consignes;
}

//  TACHE ADMIN

function ajouterTache($date, $idPersonnel) {
    $connection=getConnect();
    $query="INSERT INTO TACHEADMIN VALUES (0, $date, $idPersonnel)";
    $res=$connection->query($query);
    $res->closeCursor();
}

function modifierTache($id, $date, $idPersonnel) {
    $connection=getConnect();
    $query="UPDATE TACHEADMIN SET (0, $date, $idPersonnel) WHERE IDTACHEADMIN=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function supprimerTache($id) {
    $connection=getConnect();
    $query="DELETE FROM TACHEADMIN WHERE IDTACHEADMIN=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function getTache() {
    $connection=getConnect();
    $query="SELECT * FROM TACHEADMIN";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $taches=$res->fetchAll();
    return $taches;
}

// CATEGORIE

function ajouterCategorie($categorie) {
    $connection=getConnect();
    $query="INSERT INTO CATEGORIE VALUES (0, $categorie)";
    $res=$connection->query($query);
    $res->closeCursor();
}

function modifierCategorie($id, $categorie) {
    $connection=getConnect();
    $query="UPDATE CATEGORIE SET (0, $categorie) WHERE IDCATEGORIE=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function supprimerCategorie($id) {
    $connection=getConnect();
    $query="DELETE FROM CATEGORIE WHERE IDCATEGORIE=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function getCategorie() {
    $connection=getConnect();
    $query="SELECT * FROM CATEGORIE";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $taches=$res->fetchAll();
    return $taches;
}

// SPECIALITE

function ajouterSpecialite($libelle) {
    $connection=getConnect();
    $query="INSERT INTO SPECIALITE VALUES (0, $libelle)";
    $res=$connection->query($query);
    $res->closeCursor();
}

function modifierSpecialite($id, $libelle) {
    $connection=getConnect();
    $query="UPDATE CATEGORIE SET (0, $libelle) WHERE IDSPECIALITE=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function supprimerSpecialite($id) {
    $connection=getConnect();
    $query="DELETE FROM SPECIALITE WHERE IDSPECIALITE=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function getSpecialite() {
    $connection=getConnect();
    $query="SELECT * FROM SPECIALITE";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $taches=$res->fetchAll();
    return $taches;
}