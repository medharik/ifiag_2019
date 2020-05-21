<?php
include("../model_commun.php");
function ajouter($libelle, $prix, $categorie_id, $type = "", $chemin = "")
{
    try {
        // connexion db
        $cnx = connecter_db();
        // preparer la requete (sql)  sur cnx
        $rp = $cnx->prepare("insert into produit(libelle,prix,categorie_id,type,chemin) values (?,?,?,?,?)");
        // executer la requete preparee
        $rp->execute([$libelle, $prix, $categorie_id, $type, $chemin]);
    } catch (PDOException $e) {
        die("Erreur d'ajout du produit " . $e->getMessage());
    }
}


function modifier($libelle, $prix, $categorie_id, $type, $id)
{
    try {
        //Connexion à la base de donnée
        $cnx = connecter_db();
        //Préparation de la requête
        $rq = $cnx->prepare("UPDATE produit SET libelle=?, prix=? , categorie_id=? , type  = ?  WHERE id=?");
        //Exécution de la requête
        $rq->execute([$libelle, $prix, $categorie_id, $type, $id]);
    } catch (PDOException $e) {
        die("Erreur de modification du produit " . $e->getMessage());
    }
}
