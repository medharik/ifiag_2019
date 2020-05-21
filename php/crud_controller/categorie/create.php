<?php include("model.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle categorie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php
    include("../_menu.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 shadow mx-auto p-3 my-3">
                <div class="alert alert-info">nouvelle categorie</div>
                <form action="controller.php?action=store" method="post">
                    <div class="form-group">
                        <label for="nom">Nom : </label>
                        <input type="text" name="nom" id="nom" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-primary">Valider</button>

                </form>


            </div>
        </div>
    </div>

</body>

</html>