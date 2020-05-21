<?php include("model.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau produit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php
    include("../_menu.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 shadow mx-auto p-3 my-3">
                <div class="alert alert-info">nouveau produit</div>
                <form action="controller.php?action=store" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="libelle">Libellé : </label>
                        <input type="text" name="libelle" id="libelle" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix : </label>
                        <input type="text" name="prix" id="prix" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="type">Emplacement : </label>
                        <input type="text" name="type" id="type" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="categorie_id">Categorie : </label>
                        <select type="text" name="categorie_id" id="categorie_id" class="form-control">
                            <?php
                            $categories = all("categorie");
                            foreach ($categories as $c) {
                            ?>
                                <option value="<?= $c['id'] ?>"><?= $c['nom'] ?></option>
                            <?php } ?>

                            <select>

                    </div>
                    <div class="form-group"> <label for="chemin">Image : </label>
                        <input type="file" name="chemin" id="chemin" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>