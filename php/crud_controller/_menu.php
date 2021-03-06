<?php
if (!isset($_SESSION)) {
    session_start();
}

define('URL', "http://" . $_SERVER['HTTP_HOST'] . "/if_2019/php/crud_controller/");

if (isset($_SESSION['login']) && isset($_SESSION['passe'])) {
    checker($_SESSION['login'], $_SESSION['passe']);
} else {
    header("location:../login.php?cnx=erreur");
}

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">IFIAG 1.0</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= URL ?>produit/index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URL ?>produit/index.php">Produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URL ?>categorie/index.php">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URL ?>users/index.php">Comptes</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= URL ?>deconnexion.php">Déconnexion</a>
            </li>

        </ul>
    </div>
</nav>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>