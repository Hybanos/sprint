<?php
require_once("modele/modele.php");
require_once("vue/vue.php");

function ctrlLogin($id, $mdp) {
    $res=loginMdp($id, $mdp);
    // test si login/mdp existe
    if ($res != null) {
        $personnel=$res[0];
        if ($personnel->IDCATEGORIE == 2) {
            afficherPageMedecin($res[0]);
        } else if ($personnel->IDCATEGORIE == 3) {
            ctrlAfficherPageDirecteur();
        }
    } else {
        ctrlAfficherAcceuil();
        echo "Login ou mdp invalide.";
    }
}

function ctrlCreerModifierPersonnel($id, $categorie, $nom, $prenom, $login, $mdp) {
    $cat=array("Directeur"=>3, "Medecin"=>2, "Agent"=>4);

    if ($id == null) {
        $id = -1;
    }

    $personnel=getPersonnel($id);
    
    if ($personnel == null) {
        ajouterPersonnel($cat[$categorie], $nom, $prenom, $login, $mdp);
    } else {
        modifierPersonnel($id, $cat[$categorie], $nom, $prenom, $login, $mdp);
    }
    ctrlAfficherPageDirecteur();
}

// VUE

function ctrlAfficherAcceuil() {
    afficherAcceuil();
}

function ctrlAfficherPageDirecteur() {
    afficherPageDirecteur(getPersonnels(), getMotifs(), getPiece(), getRequiert(), getConsigne(), getNecessite(), getMedecins(), getSpecialite());
}

function ctrlAfficherListeListes($liste) {
    // fonction pour la VUE qui affiche toutes les listes, sinon y'en aura 15 ca va etre un enfer
    // afficherListeListes($liste)
}


// MODELE
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

// PERSONNEL

function ctrlAjouterPersonnel($idCategorie, $nom, $prenom, $login, $mdp, $spe) {
    ajouterPersonnel($idCategorie, $nom, $prenom, $login, $mdp, $spe);
    ctrlAfficherListeListes(getPersonnels());
}

function ctrlModifierPersonnel($id, $idCategorie, $nom, $prenom, $login, $mdp, $spe) {
    modifierPersonnel($id, $idCategorie, $nom, $prenom, $login, $mdp, $spe);
    ctrlAfficherListeListes(getPersonnels());
}

function ctrlSupprimerPersonnel($id) {
    supprimerPersonnel($id);
    ctrlAfficherListeListes(getPersonnels());
}

// MEDECINS

function ctrlCreerModifierMedecin($id, $spe, $nom, $prenom, $login, $mdp) {
    // $cat=array(3=>"Directeur", 2=>"Medecin", 4=>"Agent");

    if ($id == null) {
        $id = -1;
    }

    $medecin = getMedecin($id);

    if ($medecin == null) {
        $id = ajouterPersonnel(2, $nom, $prenom, $login, $mdp);
        ajouterMedecin($spe, $id, "", "", "", "");
    } else {
        modifierPersonnel($id, 2, $nom, $prenom, $login, $mdp);
        modifierMedecin($id, $spe, "", "", "", "");
    }
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

function ctrlCreerModifierMotif($id, $libelle, $prix) {
    if ($id == null) {
        $id = -1;
    }

    $motif = getMotif($id);

    if ($motif == null) {
        $id = ajouterMotif($libelle, $prix);
        supprimerRequiert($id);
        supprimerNecessite($id);
    } else {
        supprimerRequiert($id);
        supprimerNecessite($id);
        modifierMotif($id, $libelle, $prix);
    }

    return $id;
}

function ctrlAjouterMotif($libelle, $montant) {
    ajouterMotif($libelle, $montant);
    ctrlAfficherListeListes(getMotifs());
}

function ctrlModifierMotif($id, $libelle, $montant) {
    modifierMotif($id,$libelle, $montant);
    ctrlAfficherListeListes(getMotifs());
}

function ctrlSupprimerMotif($id) {
    supprimerRequiert($id);
    supprimerNecessite($id);
    supprimerMotif($id);
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

// REQUIERT

function ctrlAjouterRequiert($idMotif, $idPiece) {
    ajouterRequiert($idMotif, $idPiece);
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

// NECESSITE

function ctrlAjouterNecessite($idMotif, $idConsigne) {
    ajouterNecessite($idMotif, $idConsigne);
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