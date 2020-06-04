<?php
include("../model_commun.php");
include("model.php");
extract($_GET); //action , $action=$_GET['action'];
extract($_POST); // extraire dans des variables (Ayant un basé sur le name dans form)

switch ($action) {
    case 'store':


        ajouter_user($login, $passe, $role);

        break;

    case 'update':
        modifier_user($login, $passe, $role, $id);
        break;

    case 'delete':

        supprimer($id, "users");
        break;
    default:
        die("Page introuvable!!!");
        break;
}

header("location:index.php?op=$action");
