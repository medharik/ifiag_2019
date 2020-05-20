<?php 
$e=base64_decode("aWZpYWc=");
$ec=base64_encode($e);
echo  $e;
echo "<br>".base64_decode("aWZpYWc=");
echo "<br>".md5($e);




?>