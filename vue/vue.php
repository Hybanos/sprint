<?php 

function afficherPageMedecin($medecin) {
    $nom=$medecin->NOM;
    $id=$medecin->IDPERSONNEL;
    require_once("gabaritMedecin.php");
}

function afficherPageDirecteur($personnel, $motif, $pieces, $requiert, $consignes, $necessite) {
    $listePersonnel = listePersonnel($personnel);
    $listeMotif = listeMotif($motif, $pieces, $requiert, $consignes, $necessite);
    $listePieces = listePieces($pieces);
    $listeConsignes = listeConsignes($consignes);

    require("gabarit_directeur.php");
}

function listePersonnel($personnel) {
    $a=array(2=>"Medecin", 3=>"Directeur", 4=>"Agent");

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
        $listePersonnel.="<td><input type='checkbox' name='suppPersonnelId' value='$ligne->IDPERSONNEL'></td>";
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

function afficherAcceuil() {
    require_once("gabarit_acceuil.php");
}