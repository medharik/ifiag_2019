<?php

// ajouter la commande dans la bd (s'il n'y existe pas deja )
$cmd = findBy("numcommande = $ui", "commandes");
if (empty($cmd)) {
    $id_commande = ajouter_commande($ui, date('d-m-Y H:i:s'));
    $_SESSION['commande_id'] = $id_commande;
}
// recuperer l'id de la commande 

// initialiser table panier par id
// delete from panier where commande_id=$commande_id
foreach ($panier as $p) {

    ajouter_panier($_SESSION['commande_id'], $p['produit_id'], $p['qte']);
} ?>
// contenu de la commande :
function cmd($commande_id){
$cnx= connecter_db();
$rp=$cnx->prepare("select produit.id as prod_id, commande.id, produit.libelle,
produit.prix, panier.qte, commande.date, commande.numero
from produit
join panier on produit.id=panier.produit_id
join commande on commande.id=panier.commande_id
where commande.id=?");
$rp->execute([$commande_id]);
$r=$rp->fetchAll();
return $r;
}