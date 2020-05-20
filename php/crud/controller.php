<?php
include("model.php");
extract($_GET); //action , $action=$_GET['action'];
extract($_POST);
switch ($action) {
    case 'store':
        $chemin = uploader($_FILES['chemin']);
        ajouter($libelle, $prix, $chemin);
        break;

    case 'update':
        modifier($libelle, $prix, $id);
        break;

    case 'delete':
        $produit = find($id);
        unlink($produit['chemin']);
        supprimer($id);
        break;
    default:
        die("Page introuvable!!!");
        break;
}

header("location:index.php?op=$action");
