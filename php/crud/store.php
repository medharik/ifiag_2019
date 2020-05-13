<?php 
include("model.php");
//recuperer les data poster depuis le formulaire
$libelle=$_POST['libelle'];
$prix=$_POST['prix'];
// var_dump($_POST);
// print_r($_FILES['chemin']);
// Array ( [name] => 1.jpg [type] => image/jpeg
// [tmp_name] => C:\Users\dell\AppData\Local\Temp\php69AE.tmp [error] => 0 [size] => 167786 )
$infos=$_FILES['chemin'];
$tmp=$infos['tmp_name'];
$name=$infos['name'];
$taille=filesize($tmp);//taille du fichier en octect 
$path_parts=pathinfo($name);
$extension=$path_parts['extension'];
// var_dump($path_parts['extension']);
// le nom du fichier doit etre unique et ne contient pas de caracteres speciaux 
$new_name=md5(time()."_".rand(0,99999).$name).".$extension";
$chemin="images/$new_name";
// verifier si fichier est image
$autorise=['jpg','png','gif','webp','jpeg'];
$max_size=8*1024*1024;
if(! in_array($extension,$autorise)){
die("ce n'est pas une image");

}else if(!move_uploaded_file($tmp,$chemin)){
die("une erreur est survenue lors de l'upload du fichier");
}else if($taille>$max_size) {
die("La taille de ce fichier ".round($taille/(1024*1024),2)."Mo est plus grande que celle autorisée (8Mo)");
}else{

}
// // appel de la fonction d'ajout
ajouter($libelle,$prix,$chemin);
// // redirection vers la page index (liste des produits )
header("location:index.php?op=store");

?>