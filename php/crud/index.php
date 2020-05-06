<?php 
include("model.php");
$produits=all();
$notice="";
$classe=  "d-none";
if(isset($_GET['op'])) {
    $classe="d-block";
 $op=$_GET['op'];

 if($op=="store"){
$notice="Ajout effectué avec succès";
 }
 if($op=="delete"){
$notice="Suppression effectuée avec succès";
$classe="alert-danger";
}

}
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
    

    <div class="container">
<div class="alert alert-info my-2 <?=$classe?>">
<?=$notice?>

</div>
<a href="create.php" class="btn btn-primary my-3 ">Nouveau produit</a>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Libelle</th>
      <th scope="col">Prix</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($produits as $p)  {?>
    
    <tr>
      <th scope="row"><?=$p['id']?></th>
      <td><?=$p['libelle']?></td>
      <td><?=$p['prix']?></td>
      <td>
      
      <a href="delete.php?id=<?=$p['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('supprimer?')" >Supprimer</a>
      <a href="show.php?id=<?=$p['id'];?>" class="btn btn-sm btn-info"  >Consulter</a>
      <a href="show.php?id=<?=$p['id'];?>" class="btn btn-sm btn-warning"  >Editer</a>
      
      </td>
    </tr>

   <?php } ?>
  </tbody>
</table>


    
    
    </div>

</body>
</html>