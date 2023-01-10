<?php
require_once("modele/modele.php");
require_once("vue/vue.php");

function ctrlLogin($id, $mdp) {
    $res=loginMdp($id, $mdp);
    if ($res != null) {
        $personnel=$res[0];
        if ($personnel->IDCATEGORIE == 2) {
            ctrlAfficherPageMedecin($res[0]);
        } else if ($personnel->IDCATEGORIE == 3) {
            ctrlAfficherPageDirecteur();
        } else if ($personnel->IDCATEGORIE == 1) {
            ctrlAfficherPageAgent(null, null, null, null);
        }
    } else {
        ctrlAfficherAcceuil();
        echo "<div class='container'><fieldset><p>Login ou mdp invalide.</p></fieldset></div>";
    }
}

function ctrlCreerModifierPersonnel($id, $categorie, $nom, $prenom, $login, $mdp) {
    $cat=array("Directeur"=>3, "Medecin"=>2, "Agent"=>1);

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

function ctrlAfficherPageMedecin($id) {
    $taches = getTacheMedecin($id->IDPERSONNEL);
    afficherPageMedecin($id, $taches);
}

function ctrlAfficherPageAgent($client, $rdvs, $erreur, $nss) {
    $motifs = getMotifs();
    afficherPageAgent($client, $rdvs, $motifs, $erreur, getClients(), $nss);
}

// MODELE

// CLIENTS

function ctrlAjouterClient($nom, $prenom, $adresse, $tel, $dateNaissance, $departementNaissance, $paysNaissance, $NSS, $mdp) {
    ajouterClient($nom, $prenom, $adresse, $tel, $dateNaissance, $departementNaissance, $paysNaissance, $NSS, $mdp);
}

function ctrlModifierClient($id, $nom, $prenom, $adresse, $tel, $dateNaissance, $departementNaissance, $paysNaissance, $NSS, $mdp) {
    modifierClient($id, $nom, $prenom, $adresse, $tel, $dateNaissance, $departementNaissance, $paysNaissance, $NSS, $mdp);
}

function ctrlCreerModifierClient($id, $nom, $prenom, $adresse, $numero, $dateNaissance, $departementNaissance, $paysNaissance, $nss, $solde){
    if ($id == null) {
        $id = -1;
    }

    $client=getClient($id);
    
    if ($client == null) {
        ajouterClient($nom, $prenom, $adresse,
        $numero, $dateNaissance, $departementNaissance,
        $paysNaissance, $nss, $solde);
    } else {
        modifierClient($id, $nom, $prenom, $adresse,
        $numero, $dateNaissance, $departementNaissance,
        $paysNaissance, $nss, $solde);
    }
}

function ctrlSyntheseClient($NSS){
    ctrlAfficherPageAgent(getClientNSS($NSS),getClientRDVs(getClientNSS($NSS)->IDCLIENT), null, null);
}

function ctrlGetNSS($nom){
    $client = getNss($nom);
    if ($client == null) $nss = "";
    else $nss = $client->NSS;

    ctrlAfficherPageAgent(null, null, null, $nss);
}

function ctrlAjouterSolde($id, $solde) {
    modifierSolde($id, $solde);
}

// PERSONNEL

function ctrlAjouterPersonnel($idCategorie, $nom, $prenom, $login, $mdp, $spe) {
    ajouterPersonnel($idCategorie, $nom, $prenom, $login, $mdp, $spe);
}

function ctrlModifierPersonnel($id, $idCategorie, $nom, $prenom, $login, $mdp, $spe) {
    modifierPersonnel($id, $idCategorie, $nom, $prenom, $login, $mdp, $spe);
}

function ctrlSupprimerPersonnel($id) {
    supprimerPersonnel($id);
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
}

function ctrlSupprimerMedecin($id) {
    supprimerMedecin($id);
}

// RENDEZ-VOUS

function ctrlCreerRDV($NSS, $nom, $date, $motif) {
    $client = getClientNSS($NSS);
    if ($client == null) return "Ce client n'existe pas.";

    $medecin = getMedecinNom($nom);
    if ($medecin == null) return "Ce médecin n'existe pas.";

    $conflict = testConflictTache($medecin->IDPERSONNEL, $date);
    if ($conflict != null) return "Cet horaire est bloqué.";

    if (getMotif($motif)->MONTANT > $client->SOLDE) return "Solde insuffisant, merci de recharger";
    else ctrlAjouterSolde($client->IDCLIENT, -(getMotif($motif)->MONTANT));

    ctrlAjouterRDV($medecin->IDSPECIALITE, $motif, $client->IDCLIENT, $date);

    $erreur = "";
    $pieces = getPiecesMotif($motif);
    $consignes = getConsignesMotif($motif);

    if ($pieces != null) {
        $erreur.= "<br>Pieces à fournir pour le RDV : <br>";
        foreach ($pieces as $l) {
            $erreur.="$l->LIBELLEPIECE<br>";
        }
    }
    if ($consignes != null) {
        $erreur.= "<br>Consignes pour le RDV : <br>";
        foreach ($consignes as $l) {
            $erreur.="$l->CONSIGNE<br>";
        }
    }

    return $erreur;
}

function ctrlAjouterRDV($idSpe, $idMotif, $idClient, $date) {
    ajouterRDV($idSpe, $idMotif, $idClient, $date);
}

function ctrlSupprimerRDV($id) {
    supprimerRDV($id);
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

function ctrlModifierMotif($id, $libelle, $montant) {
    modifierMotif($id,$libelle, $montant);
}

function ctrlSupprimerMotif($id) {
    supprimerRequiert($id);
    supprimerNecessite($id);
    supprimerMotif($id);
}

// REQUIERT

function ctrlAjouterRequiert($idMotif, $idPiece) {
    ajouterRequiert($idMotif, $idPiece);
}

// NECESSITE

function ctrlAjouterNecessite($idMotif, $idConsigne) {
    ajouterNecessite($idMotif, $idConsigne);
}

// TACHE ADMIN

function ctrlAjouterTache($date, $idPersonnel) {
    ajouterTache($date, $idPersonnel);
}