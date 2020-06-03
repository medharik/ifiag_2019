<?php

function connecter_db()
{
    // ERR_MODE : WARNING , SLILENT ,EXCEPTION 
    $cnx = new PDO("mysql:host=localhost;dbname=db_if;charset=utf8", 'root', '');
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $cnx;
}

//supprimer
// supprimer(3, "categorie");
function supprimer($id, $table = "produit")
{
    try {
        // connexion db
        $cnx = connecter_db();
        // preparer la requete (sql)  sur cnx
        $rp = $cnx->prepare("delete from $table  where id=?");
        // executer la requete preparee
        $rp->execute([$id]);
    } catch (PDOException $e) {
        die("erreur de suppression " . $e->getMessage());
    }
}

//modifier
//recuprer tous les categories : 
//all("categorie")
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

//recuperer un categorie par son id 
//find(1,"categorie")
function find($id, $table = "categorie")
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

// ALTER TABLE `categorie` ADD `chemin` VARCHAR(255) NULL DEFAULT NULL 

//  $infos=$_FILES['chemin'];
function uploader($infos)
{

    $tmp = $infos['tmp_name'];
    $name = $infos['name'];
    $taille = filesize($tmp); //$infos['size'];//taille du fichier en octet 
    $path_parts = pathinfo($name); // 4 infos : dir_name , basename , extension , file_name
    $extension = strtolower($path_parts['extension']);
    $new_name = md5(time() . rand(0, 99999) . $name) . ".$extension";
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
function produit_categorie()
{
    try {
        //Connexion à la base de donnée
        $cnx = connecter_db();
        //Préparation de la requête
        $rq = $cnx->prepare("select p.* , c.nom from produit p join categorie c on c.id=p.categorie_id
        ");

        //Exécution de la requête
        $rq->execute();
        $r = $rq->fetchAll();
        return $r;
    } catch (PDOException $e) {
        die("Erreur de jointure " . $e->getMessage());
    }
}
function categorie_nombre_produit()
{
    try {
        //Connexion à la base de donnée
        $cnx = connecter_db();
        //Préparation de la requête
        $rq = $cnx->prepare("select categorie_id as id, nom, count(*) as nombre_produit , sum(p.prix) as somme , max(p.prix) as max_prix , min(p.prix) as min_prix, avg(p.prix) as moyen from produit p join categorie c on p.categorie_id=c.id group by categorie_id ");

        //Exécution de la requête
        $rq->execute();
        $r = $rq->fetchAll();
        return $r;
    } catch (PDOException $e) {
        die("Erreur de jointure " . $e->getMessage());
    }
}

// les produits par categorie (id)
//produit_categorie_id(1);
function produit_categorie_id($categorie_id)
{
    try {
        //Connexion à la base de donnée
        $cnx = connecter_db();
        //Préparation de la requête
        $rq = $cnx->prepare("select * from produit where categorie_id=?   ");

        //Exécution de la requête
        $rq->execute([$categorie_id]);
        $r = $rq->fetchAll();
        return $r;
    } catch (PDOException $e) {
        die("Erreur de jointure " . $e->getMessage());
    }
}
