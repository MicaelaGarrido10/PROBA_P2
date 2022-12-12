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

function altausuari($nom,$cognom,$email,$contra)
{
  
  $conn = connexio(); //cridem a la funció connexio pq ens creï la connexió a la BBDD. La nostra variable local $conn emmagatzema tots els detalls
  
  // busquem si ja existeix. És a dir, demanem a la base de dades que ens retorni el nom, cognom, email i contra de tots els usuris
  // que tingui l'email que hem introduït.

  $sql = "SELECT nom, cognom, email, contra FROM usuari where email='". $email . "'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) { //numero elements (en el nostre cas, usuaris) que ha aconseguit treure. 

   //ep! ja està a la BBDD: Com a mínim ha trobat un usuari amb aquest email!
    
    }
    else {

      //fem registre perquè sabem que no hi ha ningú amb aquest email

      $sql = "INSERT INTO usuari (nom, cognom, email, contra) VALUES ('$nom', '$cognom','$email','$contra')";


  if ($conn->query($sql) === TRUE) {
    //header ("Location:formulario.php");
    echo "S'HA FET LA CONNEXIÓ";
  } 
  else {
    //header ("Location:error.php");
    echo "NO S'HA FET LA CONNEXIÓ, HO SENTO";
  }
}
}

function validalogin($email,$contra)
{
  session_start();
  
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