<?php 
include("model.php");
//recuperer les data poster depuis le formulaire
$libelle=$_POST['libelle'];
$prix=$_POST['prix'];

// $in=getimagesize("images/1.jpg");
// var_dump($in[3]);
// die();
$chemin=uploader($_FILES['chemin']);
ajouter($libelle,$prix,$chemin);
// var_dump($_POST);
// print_r($_FILES['chemin']);
// Array ( [name] => 1.jpg [type] => image/jpeg
// [tmp_name] => C:\Users\dell\AppData\Local\Temp\php69AE.tmp [error] => 0 [size] => 167786 )
// // appel de la fonction d'ajout
// // redirection vers la page index (liste des produits )
header("location:index.php?op=store");

?>