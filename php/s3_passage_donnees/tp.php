<?php 
$ttc=0;

if(isset($_GET['ttc'])){
    $ttc=$_GET['ttc'];// ?ttc=225   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;scalable=no-">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="cours de web, html de base,...." >
    <meta name="description" content="jdjdkfjfjdkfj kfkjddj" >
    <title> passage des donnees en PHP  </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 shadow mx-auto p-2">
               <?php if(isset($_GET['ttc'])) { ?>
                <div class="alert alert-info">
                   le ttc est  <?=$ttc;?> $
                </div>
               <?php } ?>
                <form action="r.php" method="post">
                <div class="form-group">
                    <label for="prix">Prix :</label>
                    <input type="text" class="form-control" name="prix" id="prix">
                </div>
                <div class="form-group">
                    <label for="qte">la quantite  :</label>
                    <input type="text" class="form-control" name="qte" id="qte">
                </div>
            <button class="btn btn-primary">Valider</button>
                </form>
            </div>
        </div>
    </div>
    
    
</body>
</html>