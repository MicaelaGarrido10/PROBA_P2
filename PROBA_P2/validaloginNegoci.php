<?php

require_once ("database.php"); 

if ($_POST["email"]!="" && $_POST["contra"]!="")
{
  $email=$_POST['email'];
  $contra=$_POST['contra'];

	if (validalogin($email,$contra) === true) {
		
		header('Location: css-grid/cv.php');
	}
	else{
		header('Location: error.php');

	}
}
else{
	echo "T'has deixat algun camp per omplir.";
}


?>