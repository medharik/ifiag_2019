<?php 
include("model.php");
  //ajouter("DEll D4",4600);
// supprimer(3);
// modifier('sony vaio s4',10000,2);

$produits=all();
//  var_dump($produits);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste des produits </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h4 class="text-info text-center my-3">Liste des produits </h4>
<div class="container">

<table class="table table-striped" >
    <thead>
        <tr>
        <th>#</th>
        <th>Libelle</th>
        <th>prix</th>
        <th>Actions</th>
        </tr>
        
    </thead>
    <tbody>

    <?php 
    // array(2) { [0]=> array(3) { ["id"]=> string(1) "2" ["libelle"]=> string(12) "sony vaio s4" ["prix"]=> string(5) "10000" } [1]=> array(3) { ["id"]=> string(1) "1" ["libelle"]=> string(7) "hp dv 7" ["prix"]=> string(4) "9000" } }
    
    ?>
    <?php  foreach($produits as $p) { ?>
        <tr>
        <td><?=$p['id']?></td>
        <td><?=$p['libelle']?></td>
        <td><?=$p['prix']?></td>
        <td><a   onclick="return confirm('Voulez vous vraiment supprimer ce produit?') "  href="delete.php?id=<?=$p['id']?>" class="btn btn-sm btn-danger">Supprimer</a>
        <a href="" class="btn btn-sm btn-warning">Modifier</a>
        <a href="" class="btn btn-sm btn-info">Consulter</a></td>

        </tr>
    <?php } ?>
        
    </tbody>
</table>
</div>
</body>
</html>