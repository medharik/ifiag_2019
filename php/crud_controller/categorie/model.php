<?php
include("../model_commun.php");
function ajouter_categorie($nom)
{
    try {
        // connexion db
        $cnx = connecter_db();
        // preparer la requete (sql)  sur cnx
        $rp = $cnx->prepare("insert into categorie(nom) values (?)");
        // executer la requete preparee

        $rp->execute([$nom]);
        return   $cnx->lastInsertId();
    } catch (PDOException $e) {
        die("Erreur d'ajout du categorie " . $e->getMessage());
    }
}

function modifier_categorie($nom, $id)
{
    try {
        //Connexion à la base de donnée
        $cnx = connecter_db();
        //Préparation de la requête
        $rq = $cnx->prepare("UPDATE categorie SET nom=?  WHERE id=?");
        //Exécution de la requête
        $rq->execute([$nom, $id]);
    } catch (PDOException $e) {
        die("Erreur de modification du categorie " . $e->getMessage());
    }
}
// liste des produits par categorie 
//produits(1)
//oneToMany
function produits(int $categorie_id)
{
    try {
        //Connexion à la base de donnée
        $cnx = connecter_db();
        //Préparation de la requête
        $rq = $cnx->prepare("select * from produit where  categorie_id=?");
        //Exécution de la requête
        $rq->execute([$categorie_id]);
        $r = $rq->fetchAll();
        return $r;
    } catch (PDOException $e) {
        die("Erreur de modification du categorie " . $e->getMessage());
    }
}
