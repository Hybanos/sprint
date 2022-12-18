<?php
require_once("connect.php");

function getConnect() {
    $connection=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->query('SET NAMES UTF8');
    return $connection;
}

function ajouterClient($nom, $prenom, $adresse,
                       $tel, $dateNaissance, $departementNaissance,
                       $paysNaissance, $NSS, $mdp) {
    $connection=getConnect();
    $query="INSERT INTO CLIENT
     VALUES (0, '$nom', '$prenom', '$adresse', '$tel', '$dateNaissance', '$departementNaissance', '$paysNaissance', '$NSS', '$mdp', 0)";
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

function ajouterMedecin($nom, $prenom, $login, $mdp, $spe) {
    $connection=getConnect();
    $query="INSERT INTO MEDECIN VALUES (0, '$nom', '$prenom', '$login', '$mdp', '$spe')";
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