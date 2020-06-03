<?php 

// Model : logique metier , autre autres , la gestion des donnees dans des bd (DAO)
//VIEW 
//Controller

//connexion db 
// function : sous- programme (sub-routine) traitant une tache et ayant un objectif precis  
function connecter_db(){
$cnx= new PDO("mysql:host=localhost;dbname=db_if;charset=utf8",'root','');
return $cnx;
}
// ajout d'un produit dans la base de donnees : 
//ajouter("hp",9000,"test2.png");
function ajouter($libelle,$prix,$chemin=""){
 // connexion db
  $cnx= connecter_db();
 // preparer la requete (sql)  sur cnx
    $rp=$cnx->prepare("insert into produit(libelle,prix,chemin) values (?,?,?)");
    // executer la requete preparee
    $rp->execute([$libelle,$prix,$chemin]);
}

//supprimer
function supprimer($id){
 // connexion db
 $cnx= connecter_db();
 // preparer la requete (sql)  sur cnx
$rp=$cnx->prepare("delete from produit where id=?");
// executer la requete preparee
$rp->execute([$id]);
}

//modifier

function modifier($libelle,$prix,$id){
    //Connexion à la base de donnée
    $cnx = connecter_db();
   //Préparation de la requête
    $rq = $cnx->prepare("UPDATE produit SET libelle=?, prix=?  WHERE id=?");
    //Exécution de la requête
    $rq->execute([$libelle,$prix,$id]);

}


//recuprer tous les produits : 

function all(){
    //Connexion à la base de donnée
    $cnx = connecter_db();
   //Préparation de la requête
    $rp = $cnx->prepare("select * from produit order by id desc ");
    //Exécution de la requête
    $rp->execute();
    $resultat=$rp->fetchAll(PDO::FETCH_ASSOC);// PHP PDO FETCH  MODE
    return $resultat;

}
//recuperer un produit par son id 
    function find($id){
        //Connexion à la base de donnée
        $cnx = connecter_db();
       //Préparation de la requête
        $rp = $cnx->prepare("select * from produit where id=? ");
        //Exécution de la requête
        $rp->execute([$id]);
        $resultat=$rp->fetch(PDO::FETCH_ASSOC);// PHP PDO FETCH  MODE
        return $resultat;
    
    }

    // ALTER TABLE `produit` ADD `chemin` VARCHAR(255) NULL DEFAULT NULL 

//  $infos=$_FILES['chemin'];
function uploader($infos,$dossier="images"){
      if(!is_dir($dossier)){
mkdir($dossier,777,true);
      }
$tmp=$infos['tmp_name'];
$name=$infos['name'];
$taille=filesize($tmp);//$infos['size'];//taille du fichier en octet 
$path_parts=pathinfo($name);// 4 infos : dir_name , basename , extension , file_name
$extension=strtolower($path_parts['extension']);
// var_dump($path_parts['extension']);
// le nom du fichier doit etre unique et ne contient pas de caracteres speciaux 
$new_name=md5(time().rand(0,99999).$name).".$extension";

$chemin="$dossier/$new_name";
// verifier si fichier est image
$autorise=['jpg','png','gif','webp','jpeg'];

$max_size=8*1024*1024;// 8Mo
if(! in_array($extension,$autorise)){
die("ce n'est pas une image");
}else if(!move_uploaded_file($tmp,$chemin)){
die("une erreur est survenue lors de l'upload du fichier");
}else if($taille>$max_size) {
die("La taille de ce fichier ".round($taille/(1024*1024),2)."Mo est plus grande que celle autorisée (8Mo)");
}

return $chemin;



    }
    



?>