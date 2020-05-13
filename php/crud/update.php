<?php
include("model.php");
extract($_POST);//$libelle,$prix,$id

modifier($libelle,$prix,$id);
header("location:index.php?op=update");
?>