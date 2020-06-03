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
    //   include("_menu.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <?php
                if (isset($_GET['cnx']) && $_GET['cnx'] == 'no') {

                ?>
                    <div class="alert alert-danger">Login/mot de passe incorrectes</div>
                <?php } ?>
                <form action="checker.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input name="passe" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!--liste des produits de cette categorie   -->

        <!--  fin liste  -->

    </div>

</body>

</html>