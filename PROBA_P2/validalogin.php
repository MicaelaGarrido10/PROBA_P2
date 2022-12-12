<?php

function connexio()
{
  $servername = "mysql-micaelagarrido10.alwaysdata.net";
  $username = "283017";
  $password = "PRogramacion12345";
  $dbname = "micaelagarrido10_basedatos";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  return $conn; //ens retorna la connexió creada
}

function validalogin($email,$contra)
{
  
  $conn = connexio(); 

  $sql = "SELECT nom, cognom, email, contra FROM usuari where email='$email' AND contra='$contra'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) { //numero elements (en el nostre cas, usuaris) que ha aconseguit treure.

    $row = $result->fetch_assoc(); //treure el registre següent 

    $_SESSION['nom']=$row['nom'];

    return true;
    }
    else {

      //fem registre perquè sabem que no hi ha ningú amb aquest email

    return false;
}
}


?>
