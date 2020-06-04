<?php
function ajouter_user($login, $passe, $role = "admin")
{
    try {
        // connexion db
        $cnx = connecter_db();
        // preparer la requete (sql)  sur cnx
        $rp = $cnx->prepare("insert into users(login,passe,role) values (?,?,?)");
        // executer la requete preparee

        $rp->execute([$login, $passe, $role]);
        return   $cnx->lastInsertId();
    } catch (PDOException $e) {
        die("Erreur d'ajout du user " . $e->getMessage());
    }
}

function modifier_user($login, $passe, $role, $id)
{
    try {
        //Connexion à la base de donnée
        $cnx = connecter_db();
        //Préparation de la requête
        $rq = $cnx->prepare("UPDATE users SET login=? , passe=? , role=?  WHERE id=?");
        //Exécution de la requête
        $rq->execute([$login, $passe, $role, $id]);
    } catch (PDOException $e) {
        die("Erreur de modification du user " . $e->getMessage());
    }
}
