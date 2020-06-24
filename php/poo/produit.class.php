<?php
//Poo : en programmation orientee objet , une application est composee de plusieurs objets en communication
//ou chaque objet (reutilisable) possede ses propres attributs (data) et methodes (compotement)

// Notion de classe  : Modele (type) d'objet : Produit(id, libelle,prix,qte + afficher(), ajouter(),....)
//Notion d'objet : Instance (exemplaire)  de la classe (hp=new Produit(1,"hp",3500,10)) => on instancie une classe pour construire un objet

// Les Principes de la Poo : encapsulation + heritage et polymorphisme 

//encapsulation :  1 des principes de la POO
// role :               Protection des data 
//comment : en mettant les attributs en private et on n'autorisant leurs acces que par des setters 
// (la ou on verifie si les valeurs sont correctes ) et les getters (lecture)

//constructeur : methode ayant comme role principal : initialiser les attrbuts 

class Produit
{
    public $id;
    public $libelle;
    private  $prix;

    public function __construct(String $libelle = "", float $prix = 0, int $id = 0)
    {
        $this->libelle = $libelle;
        $this->prix = $prix;
        $this->id = $id;
    }

    public function ptc()
    {
        return $this->id * 1.20;
    }
    function connecter_db()
    {
        $cnx = new PDO("mysql:host=localhost;dbname=db_if;charset=utf8", 'root', '');
        return $cnx;
    }

    public function ajouter()
    {
        try {
            $cnx = $this->connecter_db();
            // preparer la requete (sql)  sur cnx
            $rp = $cnx->prepare("insert into produit(libelle,prix) values (?,?)");
            // executer la requete preparee
            $rp->execute([$this->libelle, $this->prix]);
        } catch (PDOException $e) {
            die("Erreur d'ajout du produit " . $e->getMessage());
        }
    }


    public function supprimer()
    {
        try {
            $cnx = $this->connecter_db();
            // preparer la requete (sql)  sur cnx
            $rp = $cnx->prepare("delete from produit where id=?");
            // executer la requete preparee
            $rp->execute([$this->id]);
        } catch (PDOException $e) {
            die("Erreur d'ajout du produit " . $e->getMessage());
        }
    }

    public function modifier()
    {
        try {
            $cnx = $this->connecter_db();
            // preparer la requete (sql)  sur cnx
            $rp = $cnx->prepare("update produit set libelle=? , prix=? where id=?");
            // executer la requete preparee
            $rp->execute([$this->libelle, $this->prix, $this->id]);
        } catch (PDOException $e) {
            die("Erreur d'ajout du produit " . $e->getMessage());
        }
    }


    public function setPrix(float $prix)
    {
        if ($prix >= 0) {
            $this->prix = $prix;
        } else {
            throw new  \RuntimeException("prix incorrect");
        }
    }
    public function getPrix()
    {
        return $this->prix;
    }
}
