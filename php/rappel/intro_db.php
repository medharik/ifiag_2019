<?php 
// 3 extensions permattant au php de GERER les BD :
// mysql_ : - =>  obsolete , + => facile 
// mysqli_ , OCI , ... : - => mono SGBD , + => facile
// PDO : PHP DATA OBJECT  => - => plus difficile et  necessite d'avoir les bases du POO , + => multi-sgbd + PLUS SECURISE  
// -- CREATE DATABASE db_if
// -- USE db_if

// -- CREATE TABLE produit (
// -- id INT PRIMARY KEY auto_increment  , 

// -- libelle VARCHAR(255) , 
// --  prix  FLOAT 


// -- )
// exemple de connexion avec mysqli
// $link=mysqli_connect("localhost","root","",'db_if');
//exemple de connexion avec PDO
  $cnx= new PDO("mysql:host=localhost;dbname=db_if",'root','');
  $rp=$cnx->prepare("insert into produit (libelle , prix ) values (?,?)");
$rp->execute(['hp dv 7',9000]);
?>