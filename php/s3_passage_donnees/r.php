<?php 
// var_dump($_POST);
//extract data
$prix=$_POST['prix'];
$qte=$_POST['qte'];
//soit  extract($_POST);
$ttc=$prix*$qte;
//redirection vers tp.php avec l'info ttc=$ttc
header("location:tp.php?ttc=$ttc");
?>
