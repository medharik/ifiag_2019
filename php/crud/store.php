<?php 
include("model.php");
//recuperer les data poster depuis le formulaire
$libelle=$_POST['libelle'];
$prix=$_POST['prix'];
// appel de la fonction d'ajout
ajouter($libelle,$prix);
// redirection vers la page index (liste des produits )
header("location:index.php?op=store");


?>