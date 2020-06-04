<?php
session_start();
include("../model_commun.php");
include("model.php");
if (isset($_SESSION['login']) && isset($_SESSION['passe'])) {
    checker($_SESSION['login'], $_SESSION['passe']);
} else {
    header("location:../login.php?cnx=erreur");
}
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
                <div class="alert alert-info">nouvel utilisateur</div>
                <form action="controller.php?action=store" method="post">
                    <div class="form-group">
                        <label for="login">Login : </label>
                        <input type="text" class="form-control" name="login" id="login">
                    </div>
                    <div class="form-group">
                        <label for="passe">Mot de passe : </label>
                        <input type="password" class="form-control" name="passe" id="passe">
                    </div>
                    <div class="form-group">
                        <label for="login">Role : </label>
                        <select type="text" class="form-control" name="role" id="role" required>
                            <option value="" selected></option>
                            <option value="admin">Admin</option>
                            <option value="agent">Agent de saisie</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary">Valider</button>

                </form>


            </div>
        </div>
    </div>

</body>

</html>