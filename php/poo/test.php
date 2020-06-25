<?php

include("produit.class.php");
include("produitAlimentaire.class.php");

//instancier un objet de type Produit(class)

$hp = new Produit("sony vaio ", 10000);
// $hp->ajouter();
$hp->id = 61;
// $hp->supprimer();
// $hp->modifier();
// echo  "le prix de " . $hp->libelle . " est " . $hp->getPrix(), "<br>";
try {
    $hp->setPrix(9000);
    echo $hp->ptc();
} catch (Exception $e) {
    die($e->getMessage());
}

//instancier un objet de type ProduitAlimentaire
$lait = new ProduitAlimentaire("lait uht 1", 100, 12, date('d-m-Y'));
// $lait->tester();
//$lait->libelle = "Lait uht ";
$lait->setPrix(10);
// $lait->id = 1;
echo "<br>";
// polymorphisme override 
//code plymorphique => meme nom , comportement diffrent
$hp->afficher();
$lait->afficher();
