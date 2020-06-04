<?php
session_start();
include("model.php");
$categories = all("categorie");
// $categories = categorie_nombre_produit();

$notice = "";
$classe =  "d-none";
if (isset($_GET['op'])) {
  $classe = "d-block";
  $op = $_GET['op'];
  if ($op == "store") {
    $notice = "Ajout effectué avec succès";
  }
  if ($op == "update") {
    $notice = "La Mise à jours  a été   effectuée avec succès";
  }
  if ($op == "delete") {
    $notice = "Suppression effectuée avec succès";
    $classe = "alert-danger";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>liste des categories </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
  <?php
  include("../_menu.php");

  ?>


  <div class="container">
    <div class="alert alert-info my-2 <?= $classe ?>">
      <?= $notice ?>
    </div>
    <a href="create.php" class="btn btn-primary my-3 ">Nouvelle categorie</a>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom</th>
          <th scope="col">Nombre de produit</th>

          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categories as $p) { ?>
          <tr>
            <th scope="row"><?= $p['id'] ?></th>

            <td><?= $p['nom'] ?></td>
            <td>Nombre de produit : <?php
                                    $produits = produits($p['id']);
                                    echo count($produits);
                                    $somme = 0;
                                    foreach ($produits as $e) {
                                      $somme += $e['prix'];
                                    }
                                    echo "<br>la somme des prix :  $somme DHS";
                                    ?>


              <br>
              <?php foreach ($produits as $e) { ?>
                <span class="badge badge-primary">
                  <?= $e['libelle']; ?>
                </span>
              <?php } ?>
            </td>

            <td>

              <a href="controller.php?action=delete&id=<?= $p['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('supprimer?')">Supprimer</a>
              <a href="show.php?id=<?= $p['id']; ?>" class="btn btn-sm btn-info">Consulter</a>
              <a href="edit.php?id=<?= $p['id']; ?>" class="btn btn-sm btn-warning">Editer</a>

            </td>
          </tr>

        <?php } ?>
      </tbody>
    </table>




  </div>

</body>

</html>