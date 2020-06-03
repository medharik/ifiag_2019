<?php
session_start();
extract($_POST); //$email,$passe
if ($email === "test" && $passe == "1234") {
    $_SESSION['email'] = $email;
    $_SESSION['passe'] = $passe;
    $_SESSION['prenom'] = $email;
    header("location:produit/index.php");
} else {
    header("location:login.php?cnx=no");
}
