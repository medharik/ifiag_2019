<?php
include("model.php");
extract($_GET); //action , $action=$_GET['action'], $id;
extract($_POST); //$libelle, $prix
switch ($action) {
    case 'store':
        if ($prix < 0) {
            setcookie('date_visite', date('d-m-Y H:i:s'), time() + 30 * 24 * 60 * 60);
            setcookie('libelle', $libelle, time() + 24 * 60 * 60);
            setcookie('prix', $prix, time() + 10);
            setcookie('categorie_id', $categorie_id, time() + 10);
            setcookie('type', $type, time() + 10);
            header("location:create.php?o=prix");
            die();
        } else {
            //supprimer
            setcookie('libelle', "", time() - 1);
            setcookie('prix', "", time() - 10);
            setcookie('categorie_id', "", time() - 10);
            setcookie('type', $type, time() -  10);
        }


        $chemin = uploader($_FILES['chemin']);
        ajouter($libelle, $prix,  $categorie_id, $type, $chemin);
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
