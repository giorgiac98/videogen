<?php
require_once 'connect.php';

if (isset($_SESSION['user'])) {

  $user = $_SESSION['user'];
  $email = $_POST['email'];
  $name = $_POST['nome'];
  $surname = $_POST['cognome'];
  $address = $_POST['indirizzo'];
  $number = $_POST['telefono'];
  try{
    $sql = "UPDATE utenti SET (nome, cognome, indirizzo, telefono, email) = (?, ?, ?, ?, ?) WHERE username = ?";
    $query = $db->prepare($sql);
    $query->execute([$name, $surname, $address, $number, $email, $user]);
  }
  catch (PDOException $e){
    echo $e->getMessage();
    header("Location: ../personal-data.php");
  }
  header("Location: ../personal-data.php");
}
else{
  header("Location: ../index.php");
}
?>
