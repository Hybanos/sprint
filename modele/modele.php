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
                       $paysNaissance, $NSS, $solde) {
    $connection=getConnect();
    $query="INSERT INTO CLIENT
     VALUES (0, '$nom', '$prenom', '$adresse', $tel, '$dateNaissance', '$departementNaissance', '$paysNaissance', $NSS, $solde)";
    $res=$connection->query($query);
    $res->closeCursor();
}

function modifierClient($id, $nom, $prenom, $adresse,
                       $tel, $dateNaissance, $departementNaissance,
                       $paysNaissance, $NSS, $solde) {
    $connection=getConnect();
    $query="UPDATE CLIENT
    SET (0, '$nom', '$prenom', '$adresse', '$tel', '$dateNaissance', '$departementNaissance', '$paysNaissance', $NSS, $solde)
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

function getClient($id){
    $connection=getConnect();
    $requete="SELECT * FROM CLIENT where IDCLIENT=$id";
    $resultat=$connection->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=$resultat->fetchall();
    $resultat->closeCursor();
    return $client;
}

function getClientNSS($NSS){
    $connection=getConnect();
    $requete="SELECT * FROM CLIENT where NSS=$NSS";
    $resultat=$connection->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $client=$resultat->fetch();
    $resultat->closeCursor();
    return $client;
}

function getNSS($nom){
    $connection=getConnect();
    $requete="SELECT NSS FROM CLIENT where NOM='$nom'";
    $resultat=$connection->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $nss=$resultat->fetch();
    $resultat->closeCursor();
    return $nss;
}

function modifierSolde($id, $montant) {
    $connection=getConnect();
    $query="UPDATE CLIENT SET SOLDE=SOLDE+$montant where IDCLIENT=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

// PERSONNEL

function loginMdp($login, $mdp) {
    $connection=getConnect();
    $query="SELECT * FROM PERSONNEL WHERE LOGIN='$login' AND MDP='$mdp'";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $resultat=$res->fetchAll();
    $res->closeCursor();
    return $resultat;
}

function ajouterPersonnel($idCategorie, $nom, $prenom, $login, $mdp) {
    $connection=getConnect();
    $query="INSERT INTO PERSONNEL VALUES (0, $idCategorie, '$nom', '$prenom', '$login', '$mdp')";
    $res=$connection->query($query);
    $id=$connection->lastInsertId();
    $res->closeCursor();
    return $id;
}

function modifierPersonnel($id, $idCategorie, $nom, $prenom, $login, $mdp) {
    $connection=getConnect();
    $query="UPDATE PERSONNEL SET IDPERSONNEL=$id,IDCATEGORIE=$idCategorie,NOM='$nom',PRENOM='$prenom',LOGIN='$login',MDP='$mdp'
    WHERE IDPERSONNEL=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function supprimerPersonnel($id) {
    $connection=getConnect();
    $query="DELETE FROM PERSONNEL WHERE IDPERSONNEL=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function getPersonnels() {
    $connection=getConnect();
    $query="SELECT * FROM PERSONNEL";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $medecins=$res->fetchall();
    $res->closeCursor();
    return $medecins;
}

function getPersonnel($id) {
    $connection=getConnect();
    $query="SELECT * FROM PERSONNEL WHERE IDPERSONNEL=$id";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $medecins=$res->fetch();
    $res->closeCursor();
    return $medecins;
}

// MEDECIN

function ajouterMedecin($idSpe, $idPers, $nom, $prenom, $login, $mdp) {
    $connection=getConnect();
    $query="INSERT INTO `MEDECIN`(`IDSPECIALITE`, `IDPERSONNEL`) VALUES ($idSpe, $idPers)";
    $res=$connection->query($query);
    $res->closeCursor();
}

function modifierMedecin($idSpe, $idPers, $nom, $prenom, $login, $mdp) {
    $connection=getConnect();
    $query="UPDATE MEDECIN SET ($idSpe, $idPers, '$nom', '$prenom', '$login', '$mdp')
    WHERE IDMEDECIN=$idPers";
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
    $query="SELECT MEDECIN.IDPERSONNEL, SPECIALITE.LIBELLESPECIALITE, PERSONNEL.NOM, PERSONNEL.PRENOM FROM `MEDECIN` JOIN PERSONNEL ON MEDECIN.IDPERSONNEL=PERSONNEL.IDPERSONNEL JOIN SPECIALITE ON MEDECIN.IDSPECIALITE=SPECIALITE.IDSPECIALITE";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $medecins=$res->fetchall();
    $res->closeCursor();
    return $medecins;
}

function getMedecin($id) {
    $connection=getConnect();
    $query="SELECT * FROM `MEDECIN` WHERE IDPERSONNEL=$id";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $medecins=$res->fetch();
    $res->closeCursor();
    return $medecins;
}

function getMedecinNom($nom) {
    $connection=getConnect();
    $query="SELECT * FROM `MEDECIN` JOIN PERSONNEL ON PERSONNEL.IDPERSONNEL=MEDECIN.IDPERSONNEL WHERE PERSONNEL.NOM='$nom'";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $medecin=$res->fetch();
    $res->closeCursor();
    return $medecin;
}

// RENDEZ-VOUS

function ajouterRDV($idSpe, $idMotif, $idClient, $date) {
    $connection=getConnect();
    $query="INSERT INTO RDV VALUES (0, $idSpe, $idMotif, $idClient, '$date')";
    $res=$connection->query($query);
    $res->closeCursor();
}

function supprimerRDV($id) {
    $connection=getConnect();
    $query="DELETE FROM RDV WHERE IDRDV=$id";
    $res=$connection->query($query);
    $res->closeCursor();
}

function getClientRDVs($id) {
    $connection=getConnect();
    $query="SELECT * from MEDECIN natural join MOTIF natural join RDV natural join SPECIALITE where IDCLIENT=$id";
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
    $id = $connection->lastInsertId();   
    $res->closeCursor();
    return $id;
}

function modifierMotif($id, $libelle, $montant) {
    $connection=getConnect();
    $query="UPDATE MOTIF SET LIBELLEMOTIF='$libelle', MONTANT=$montant WHERE IDMOTIF=$id";
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

function getMotif($id) {
    $connection=getConnect();
    $query="SELECT * FROM MOTIF WHERE IDMOTIF=$id";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $motifs=$res->fetch();
    $res->closeCursor();
    return $motifs;
}

// PIECE

function getPiece() {
    $connection=getConnect();
    $query="SELECT * FROM PIECE";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $pieces=$res->fetchAll();
    $res->closeCursor();
    return $pieces;
}

function getPiecesMotif($id) {
    $connection=getConnect();
    $query="select * from MOTIF natural join REQUIERT natural join PIECE where IDMOTIF=$id";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $pieces=$res->fetchAll();
    $res->closeCursor();
    return $pieces;
}

// REQUIERT

function ajouterRequiert($idMotif, $idPiece) {
    $connection=getConnect();
    $query="INSERT INTO REQUIERT VALUES ($idPiece, $idMotif)";
    $res=$connection->query($query);
    $res->closeCursor();
}

function supprimerRequiert($idMotif) {
    $connection=getConnect();
    $query="DELETE FROM REQUIERT WHERE IDMOTIF=$idMotif";
    $res=$connection->query($query);
    $res->closeCursor();
}

function getRequiert() {
    $connection=getConnect();
    $query="SELECT * FROM REQUIERT";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $pieces=$res->fetchAll();
    $res->closeCursor();
    return $pieces;
}

// CONSIGNE

function getConsigne() {
    $connection=getConnect();
    $query="SELECT * FROM CONSIGNE";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $consignes=$res->fetchAll();
    $res->closeCursor();
    return $consignes;
}

function getConsignesMotif($id) {
    $connection=getConnect();
    $query="SELECT * FROM MOTIF NATURAL JOIN NECESSITE NATURAL JOIN CONSIGNE WHERE IDMOTIF=$id";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $pieces=$res->fetchAll();
    $res->closeCursor();
    return $pieces;
}

// NECESSITE

function ajouterNecessite($idMotif, $idConsigne) {
    $connection=getConnect();
    $query="INSERT INTO NECESSITE VALUES ($idConsigne, $idMotif)";
    $res=$connection->query($query);
    $res->closeCursor();
}

function supprimerNecessite($idMotif) {
    $connection=getConnect();
    $query="DELETE FROM NECESSITE WHERE IDMOTIF=$idMotif";
    $res=$connection->query($query);
    $res->closeCursor();
}

function getNecessite() {
    $connection=getConnect();
    $query="SELECT * FROM NECESSITE";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $pieces=$res->fetchAll();
    return $pieces;
}

//  TACHE ADMIN

function ajouterTache($date, $idPersonnel) {
    $connection=getConnect();
    $query="INSERT INTO TACHEADMIN VALUES (0, '$date', $idPersonnel)";
    $res=$connection->query($query);
    $res->closeCursor();
}

function testConflictTache($id, $date) {
    $connection=getConnect();
    $query="SELECT * FROM TACHEADMIN WHERE IDPERSONNEL=$id AND DATEHEURE='$date'";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $taches=$res->fetchAll();
    return $taches;
}

function getTacheMedecin($id) {
    $connection=getConnect();
    $query="SELECT * FROM TACHEADMIN WHERE IDPERSONNEL=$id";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $taches=$res->fetchAll();
    return $taches;
}

// CATEGORIE


function getCategorie() {
    $connection=getConnect();
    $query="SELECT * FROM CATEGORIE";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $taches=$res->fetchAll();
    return $taches;
}

// SPECIALITE

function getSpecialite() {
    $connection=getConnect();
    $query="SELECT * FROM SPECIALITE";
    $res=$connection->query($query);
    $res->setFetchMode(PDO::FETCH_OBJ);
    $taches=$res->fetchAll();
    return $taches;
}