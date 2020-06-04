<?php
include("../model_commun.php");
include("model.php");
// $id=$_GET['id'];
extract($_GET); //$id=$_GET['id']
$user = find($id, "users");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <?php
    include("../_menu.php");
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 shadow mx-auto p-3 my-3">
                <div class="alert alert-info">Edition de l'utilisateur : <?= $user['login'] ?></div>
                <form action="controller.php?action=update" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="form-group">
                        <label for="login">Login : </label>
                        <input type="text" name="login" id="login" class="form-control" value="<?= $user['login'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="passe">Mot de passe : </label>
                        <input type="password" name="passe" id="passe" class="form-control" value="<?= $user['passe'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="role">Role : </label>
                        <input type="text" name="role" id="role" class="form-control" value="<?= $user['role'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Valider</button>

                </form>


            </div>
        </div>
    </div>

</body>

</html>