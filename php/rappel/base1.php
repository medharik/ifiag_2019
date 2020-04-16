<?php 
$nom="BAKAR";
$age=19;
$t1=['hp','dell',4500, date('d-m-Y')];// tableau indexé ($t1[0],...)   indice=> valeur , 0=>'hp'
$hp=['libelle'=>'hp dv 5','prix'=>4500,300,'test'];// tableau associatif : key => value , name => value
$t1[]='hp dv 7';//push
$t1['test']='test 1 ';//push
var_dump($t1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>base 1 </title>
</head>
<body>
 <h3>Bienvenue <?php echo $nom; ?></h3>   
 <h3>Bienvenue <?= $nom; ?></h3>   
 <?php echo "<h3>Bienvenue $nom</h3>" ;?>  
 <?php echo '<h3>Bienvenue $nom</h3>' ;?>  
 <?php echo '<h3>Bienvenue'. $nom.'</h3>' ;?>  
 
 <h3>Bienvenue <?php echo '$nom'; ?></h3>   
 <h3>Bienvenue <?php echo "$nom"; ?></h3>   
 


</body>
</html>