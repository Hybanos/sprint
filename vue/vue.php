<?php 

function afficherPageMedecin($medecin, $taches) {
    $nom=$medecin->NOM;
    $login=$medecin->LOGIN;
    $mdp=$medecin->MDP;
    $id=$medecin->IDPERSONNEL;

    $taches = listeTaches($taches);
    require_once("gabaritMedecin.php");
}

function afficherPageDirecteur($personnel, $motif, $pieces, $requiert, $consignes, $necessite, $medecins, $spe) {
    $listePersonnel = listePersonnel($personnel);
    $listePieces = listePieces($pieces);
    $listeConsignes = listeConsignes($consignes);
    $listeMotif = listeMotif($motif, $pieces, $requiert, $consignes, $necessite);
    $listeMedecins = listeMedecins($medecins);
    $listeSpecialite = listeSpecialite($spe);

    require("gabarit_directeur.php");
}

function afficherPageAgent($client, $rdvs, $motifs, $erreur, $clients, $nss) {

    $synthese = "";
    if ($client != null) {
        $synthese = afficherClient($client, $rdvs);
    }
    $listeMotifs = optionsMotifs($motifs);
    $listeClients = optionsClients($clients);
    $displayErreur = "";

    if ($erreur != null) {
        $displayErreur = "<p class='erreur'>$erreur</p>";
    }

    if ($nss == null) $nss = "";
    else $nss = "<br>$nss";

    require_once("gabarit_agent.php");
}

function listeTaches($taches) {

    $liste = "<table> <tr> <th>Horaires bloqués</th> </tr>";

    foreach ($taches as $ligne) {
        $liste.= "<tr>";
        $liste.= "<td>$ligne->DATEHEURE</td>";
        $liste.= "</tr>";
    }

    $liste.= "</table>";

    return $liste;
}

function listePersonnel($personnel) {
    $a=array(2=>"Medecin", 3=>"Directeur", 1=>"Agent");

    $listePersonnel = "<table id='tablePersonnel'> <tr><th>ID</th> <th>Categorie</th> <th>Nom</th> <th>Prenom</th> <th>Login</th> <th>MDP</th> <th>Séléctionner</th></tr>";
    foreach ($personnel as $ligne) {
        $cat=$a[$ligne->IDCATEGORIE];
        $listePersonnel.="<tr>";
        $listePersonnel.="<td>$ligne->IDPERSONNEL</td>";
        $listePersonnel.="<td>$cat</td>";
        $listePersonnel.="<td>$ligne->NOM</td>";
        $listePersonnel.="<td>$ligne->PRENOM</td>";
        $listePersonnel.="<td>$ligne->LOGIN</td>";
        $listePersonnel.="<td>$ligne->MDP</td>";
        $listePersonnel.="<td><input type='checkbox' name='suppPersonnelId".$ligne->IDPERSONNEL."' value='$ligne->IDPERSONNEL'></td>";
        $listePersonnel.="</tr>";
    }
    $listePersonnel.= "</table>";
    $listePersonnel.= "<input type='submit' id='suppPersonnel' name='suppPersonnel' value='Supprimer'>";
    
    return $listePersonnel;
}

function listeMotif($motif, $pieces, $requiert, $consignes, $necessite) {
    $listeMotif = "<table id='tableMotif'> <tr><th>ID</th> <th>Libellé</th> <th>Montant</th> <th>Pieces</th> <th>Consignes</th> <th>Séléctionner</th></tr>";
    foreach ($motif as $ligne) {
        $listeMotif.="<tr>";
        $listeMotif.="<td>$ligne->IDMOTIF</td>";
        $listeMotif.="<td>$ligne->LIBELLEMOTIF</td>";
        $listeMotif.="<td>$ligne->MONTANT</td><td>";

        foreach ($requiert as $l) {
            if ($ligne->IDMOTIF == $l->IDMOTIF) {
                foreach ($pieces as $p) {
                    if ($l->IDPIECE == $p->IDPIECE) {
                        $listeMotif.=$p->LIBELLEPIECE.", ";
                    }
                }
            }
        }
        $listeMotif.="</td><td>";
        foreach ($necessite as $l) {
            if ($ligne->IDMOTIF == $l->IDMOTIF) {
                foreach ($consignes as $c) {
                    if ($l->IDCONSIGNE == $c->IDCONSIGNE) {
                        $listeMotif.=$c->CONSIGNE.", ";
                    }
                }
            }
        }

        $listeMotif.="</td><td><input type='checkbox' name='suppMotifCheck' value='$ligne->IDMOTIF'></td>";
        $listeMotif.="</tr>";
    }
    $listeMotif.="</table>";
    $listeMotif.="<input type='submit' id='suppMotif' name='suppMotif' value='Supprimer'>";

    return $listeMotif;
}

function listePieces($pieces) {
    $listePieces = "<table id='tablePiece'> <tr><th>ID</th> <th>Libellé</th> <th>Seléctionner</th></tr>";
    foreach ($pieces as $ligne) {
        $listePieces.="<tr>";
        $listePieces.="<td>$ligne->IDPIECE</td>";
        $listePieces.="<td>$ligne->LIBELLEPIECE</td>";
        $listePieces.="<td><input type='checkbox' name='pieceCheck".$ligne->IDPIECE."' value='$ligne->IDPIECE'></td>";
        $listePieces.="</tr>";
    }
    $listePieces.="</table>";

    return $listePieces;
}

function listeConsignes($consignes) {
    $listeConsignes = "<table id='tableConsigne'><tr><th>ID</th><th>Libellé</th><th>Seléctionner</th></tr>";
    foreach ($consignes as $ligne) {
        $listeConsignes.="<tr>";
        $listeConsignes.="<td>$ligne->IDCONSIGNE</td>";
        $listeConsignes.="<td>$ligne->CONSIGNE</td>";
        $listeConsignes.="<td><input type='checkbox' name='consigneCheck".$ligne->IDCONSIGNE."' value='$ligne->IDCONSIGNE'></td>";
        $listeConsignes.="</tr>";
    }
    $listeConsignes.="</table>";

    return $listeConsignes;
}

function listeMedecins($medecins) {
    $listeMed = "<table id='tableMedecins'> <tr><th>ID</th> <th>Spécialité</th> <th>Nom</th> <th>Prenom</th> <th>Séléctionner</th></tr>";

    foreach ($medecins as $ligne) {
        $listeMed.="<tr>";
        $listeMed.="<td>$ligne->IDPERSONNEL</td>";
        $listeMed.="<td>$ligne->LIBELLESPECIALITE</td>";
        $listeMed.="<td>$ligne->NOM</td>";
        $listeMed.="<td>$ligne->PRENOM</td>";
        $listeMed.="<td><input type='checkbox' name='medecinCheck".$ligne->IDPERSONNEL."' value='$ligne->IDPERSONNEL'></td>";
        $listeMed.="</tr>";
    }
    $listeMed.="</table>";
    $listeMed.="<input type='submit' id='suppMedecins' name='suppMedecins' value='Supprimer'>";

    return $listeMed;
}

function listeSpecialite($spe) {
    $listeSpe = "";

    foreach ($spe as $ligne) {
        $listeSpe.="<option value='$ligne->IDSPECIALITE'>$ligne->LIBELLESPECIALITE</option>";
    }

    return $listeSpe;
}

function afficherAcceuil() {
    require_once("gabarit_acceuil.php");
}

function afficherClient($CLIENT, $rdvs){

    $synthese = "<table> <tr><th>ID</th> <th>Nom</th> <th>Prenom</th> <th>Adresse</th> <th>Numéro Tel</th> <th>Date de naisssance</th> <th>Département naiss.</th> <th>Pays naiss.</th> <th>NSS</th> <th>Solde</th> </tr>";

    $synthese.="<tr>";
    $synthese.="<td>$CLIENT->IDCLIENT</td>";
    $synthese.="<td>$CLIENT->NOM</td>";
    $synthese.="<td>$CLIENT->PRENOM</td>";
    $synthese.="<td>$CLIENT->ADRESSE</td>";
    $synthese.="<td>$CLIENT->NUMTEL</td>";
    $synthese.="<td>$CLIENT->DATENAISSANCE</td>";
    $synthese.="<td>$CLIENT->DEPARTEMENTNAISSANCE</td>";
    $synthese.="<td>$CLIENT->PAYSNAISSANCE</td>";
    $synthese.="<td>$CLIENT->NSS</td>";
    $synthese.="<td>$CLIENT->SOLDE</td>";
    $synthese.="</tr></table>";
    
    $synthese.="<br><table> <tr><th>Motif RDV</th> <th>Spécialité medecin</th> <th>Date RDV</th> <th>Montant</th></tr>";

    foreach ($rdvs as $rdv) {
        $synthese.="<tr>";
        $synthese.="<td>$rdv->LIBELLEMOTIF</td>";
        $synthese.="<td>$rdv->LIBELLESPECIALITE</td>";
        $synthese.="<td>$rdv->DATE</td>";
        $synthese.="<td>$rdv->MONTANT</td>";
        $synthese.="</tr>";
    }

    $synthese.="</table><br>";

    $synthese.="<input type='hidden' name='id' value='$CLIENT->IDCLIENT'>";
    $synthese.="<input type='text' name='ajouterSolde' placeholder='Ajouter au solde'> ";
    $synthese.="<input type='submit' name='envoyerAjouterSolde' value='Valider'>";

    return $synthese;
}

function optionsMotifs($motifs) {
    $listeMotifs = "";

    foreach ($motifs as $ligne) {
        $listeMotifs.="<option value='$ligne->IDMOTIF'>$ligne->LIBELLEMOTIF</option>";
    }

    return $listeMotifs;
}

function optionsClients($clients) {
    $listeClients = "";

    foreach ($clients as $ligne) {
        $listeClients.="<option value='$ligne->NOM'>$ligne->NOM</option>";
    }

    return $listeClients;
}