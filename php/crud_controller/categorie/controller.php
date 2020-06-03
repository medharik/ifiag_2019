<?php
include("model.php");
extract($_GET); //action , $action=$_GET['action'];
extract($_POST);

switch ($action) {
    case 'store':

        if (strlen($nom) < 4) {

            setcookie('nom', $nom, time() + 10);
            header("location:create.php");
            die();
        }
        ajouter_categorie($nom);

        break;

    case 'update':
        modifier_categorie($nom, $id);
        break;

    case 'delete':

        supprimer($id, "categorie");
        break;
    default:
        die("Page introuvable!!!");
        break;
}

header("location:index.php?op=$action");
