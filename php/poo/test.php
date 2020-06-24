<?php
include("produit.class.php");
//instancier un objet de type Produit(class)

$hp = new Produit("sony vaio ", 10000);
// $hp->ajouter();
$hp->id = 61;
// $hp->supprimer();
$hp->modifier();
echo  "le prix de " . $hp->libelle . " est " . $hp->getPrix(), "<br>";
try {
    $hp->setPrix(9000);
    echo $hp->ptc();
} catch (Exception $e) {
    die($e->getMessage());
}
