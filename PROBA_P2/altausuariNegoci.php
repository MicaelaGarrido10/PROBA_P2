<?php

require_once ("database.php");


if ($_POST["nom"]!="" && $_POST["cognom"]!=""&& $_POST["email"]!="")
{

  $nom= $_POST["nom"];
  $cognom= $_POST["cognom"];
  $email=$_POST['email'];
  $contra=$_POST['contra'];

 

 altausuari($nom,$cognom,$email,$contra);
}
else {
  echo "COMPLETA TOTA LA INFORMACIÓ";
}

?>