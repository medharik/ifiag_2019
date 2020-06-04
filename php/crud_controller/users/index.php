<?php
session_start();
include("../model_commun.php");
include("model.php");
if (isset($_SESSION['login']) && isset($_SESSION['passe'])) {
  checker($_SESSION['login'], $_SESSION['passe']);
} else {
  header("location:../login.php?cnx=erreur");
}
$users = all("users");
// $users = user_nombre_produit();

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
  <title>liste des users </title>
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
    <a href="create.php" class="btn btn-primary my-3 ">Nouvel user</a>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Login</th>
          <th scope="col">Mot de passe </th>
          <th scope="col">Role</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $p) { ?>
          <tr>
            <th scope="row"><?= $p['id'] ?></th>

            <td><?= $p['login'] ?></td>
            <td><?= $p['passe'] ?> </td>
            <td><?= $p['role'] ?> </td>
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