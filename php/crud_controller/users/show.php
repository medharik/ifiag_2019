<?php
include("../model_commun.php");
include("model.php");
$id = $_GET['id'];
$user = find($id, "users");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation de user <?= $user['login'] ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <?php
    include("../_menu.php");
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto border shadow text-center">
                <div class="alert alert-info">Détails de user : <?= $user['login'] ?> </div>
                <ul>
                    <li>Role : <?= $user['role'] ?></li>
                    <li>Mot de passe : <?= $user['passe']; ?></li>
                </ul>

                <div><a href="index.php" class="btn btn-primary my-3">retour</a></div>


            </div>
        </div>


    </div>

</body>

</html>