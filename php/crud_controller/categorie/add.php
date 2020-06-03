<?php
include("model.php");
extract($_POST);
$id=ajouter_categorie($nom);
  $categorie=find($id,"categorie");// ['id'=>1,'nom'=>'hp'] => (encodage en json)=> {'id':1,'nom':'hp'}
echo json_encode($categorie);// Categorie a= new Categorie(1,'hp')

