<?php
include("model.php");
$id = $_GET['id'];
$categorie = find($id);
// $produits = produit_categorie_id($id);
$produits = produits($id);
// var_dump($categorie);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation de la categorie <?= $categorie['nom'] ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <?php
    include("../_menu.php");
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto border shadow text-center">
                <div class="alert alert-info">Détails de la categorie </div>

                <div><?= $categorie['nom'] ?></div>
                <div><a href="index.php" class="btn btn-primary my-3">retour</a></div>


            </div>
        </div>
        <!--liste des produits de cette categorie   -->
        <div class="row mt-5    ">
            <?php foreach ($produits as $p) { ?>
                <div class="col-md-3 border text-center">
                    <img src="../produit/<?= $p['chemin'] ?>" class="img-fluid">
                    <h3><?= $p['libelle'] ?></h3>
                    <h4><?= $p['prix'] ?>dhs</h4>
                </div>
            <?php } ?>

        </div>
        <!--  fin liste  -->

    </div>

</body>

</html>