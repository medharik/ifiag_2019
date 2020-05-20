<?php 
include("model.php");

//recuprer l'id depuis le lien ($_GET) ?id=4
$id=$_GET['id'];

$produit=find($id);
unlink($produit['chemin']);

supprimer($id);


header("location:index.php?op=delete");

?>