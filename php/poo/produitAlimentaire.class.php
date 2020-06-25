<?php

// Heritage : 1 des principes de la POO
//Roles : Reutiliser le code existant   , Factoriser  le code (eviter entre autres la repitition du code source )


class ProduitAlimentaire extends Produit
{
    public $date_expiration;
    function  __construct($libelle = "", $prix = 0, $id = 0, $date_expiration = "")
    {
        parent::__construct($libelle, $prix, $id);
        $this->date_expiration = $date_expiration;
    }
    public function tester()
    {
        echo "le produit alim est " . $this->libelle . "<br>";
        echo "id est  " . $this->id . "<br>";
        echo "prix  est  " . $this->getPrix() . "<br>";
    }
    // redefinition (override)
    public function  afficher()
    {
        parent::afficher();
        echo "la date d'expiration est " . $this->date_expiration . "<br>";
    }
}
