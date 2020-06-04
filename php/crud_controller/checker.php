<?php
session_start();
include("model_commun.php");
include("users/model.php");
extract($_POST); //$login,$passe du form
checker($login, $passe);
header("location:users/index.php");
