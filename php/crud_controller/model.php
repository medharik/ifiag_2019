<?php

// Model : logique metier , autre autres , la gestion des donnees dans des bd (DAO)
//VIEW 
//Controller

//connexion db 
// function : sous- programme (sub-routine) traitant une tache et ayant un objectif precis  
function connecter_db()
{

    // ERR_MODE : WARNING , SLILENT ,EXCEPTION 
    $cnx = new PDO("mysql:host=localhost;dbname=db_if;charset=utf8", 'root', '');
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $cnx;
}
// ajout d'un produit dans la base de donnees : 
//ajouter("hp",9000,"test2.png");
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

//supprimer
function supprimer($id)
{
    // connexion db
    $cnx = connecter_db();
    // preparer la requete (sql)  sur cnx
    $rp = $cnx->prepare("delete from produit where id=?");
    // executer la requete preparee
    $rp->execute([$id]);
}

//modifier

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


//recuprer tous les produits : 
//all()
function all($table = "produit")
{
    //Connexion à la base de donnée
    $cnx = connecter_db();
    //Préparation de la requête
    $rp = $cnx->prepare("select * from $table order by id desc ");
    //Exécution de la requête
    $rp->execute();
    $resultat = $rp->fetchAll(PDO::FETCH_ASSOC); // PHP PDO FETCH  MODE
    return $resultat;
}

//recuperer un produit par son id 
//find(1,"categorie")
function find($id, $table = "produit")
{
    //Connexion à la base de donnée
    $cnx = connecter_db();
    //Préparation de la requête
    $rp = $cnx->prepare("select * from $table where id=? ");
    //Exécution de la requête
    $rp->execute([$id]);
    $resultat = $rp->fetch(PDO::FETCH_ASSOC); // PHP PDO FETCH  MODE
    return $resultat;
}

// ALTER TABLE `produit` ADD `chemin` VARCHAR(255) NULL DEFAULT NULL 

//  $infos=$_FILES['chemin'];
function uploader($infos)
{

    $tmp = $infos['tmp_name'];
    $name = $infos['name'];
    $taille = filesize($tmp); //$infos['size'];//taille du fichier en octet 
    $path_parts = pathinfo($name); // 4 infos : dir_name , basename , extension , file_name
    $extension = strtolower($path_parts['extension']);
    // var_dump($path_parts['extension']);
    // le nom du fichier doit etre unique et ne contient pas de caracteres speciaux 
    $new_name = md5(time() . rand(0, 99999) . $name) . ".$extension";
    // ifiag => r5hdjhjdsjdkjkddjdxkdk
    // r5hdjhjdsjdkjkddjdxkdk => ?

    //hash =/ irreversible
    // //cryptqge =/ reversible
    // ifiag=>dhsdh
    // dhsdh => ifiag
    $chemin = "images/$new_name";
    // verifier si fichier est image
    $autorise = ['jpg', 'png', 'gif', 'webp', 'jpeg'];

    $max_size = 8 * 1024 * 1024; // 8Mo
    if (!in_array($extension, $autorise)) {
        die("ce n'est pas une image");
    } else if (!move_uploaded_file($tmp, $chemin)) {
        die("une erreur est survenue lors de l'upload du fichier");
    } else if ($taille > $max_size) {
        die("La taille de ce fichier " . round($taille / (1024 * 1024), 2) . "Mo est plus grande que celle autorisée (8Mo)");
    }

    return $chemin;
}
