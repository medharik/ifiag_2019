<?php
include("model.php");
$id = $_GET['id'];
$produit = find($id);
// var_dump($produit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation du produit <?= $produit['libelle'] ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <?php
    include("../_menu.php");
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto border shadow text-center">
                <div class="alert alert-info">Détails du produit </div>
                <img src="<?= $produit['chemin'] ?>" alt="" class="img-fluid">
                <div><?= $produit['libelle'] ?></div>
                <div><?= $produit['prix'] ?>$</div>
                <div><a href="index.php" class="btn btn-primary my-3">retour</a></div>


            </div>
        </div>
    </div>

</body>

</html>