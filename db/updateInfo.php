<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['telefono']) && isset($_POST['indirizzo']) && isset($_POST['email'])) {
  $user = $_POST['user'];
  try{
    $sql = 'DELETE FROM utenti WHERE username = ?';
    $query = $db->prepare($sql);
    $query->execute([$user]);
  }
  catch (PDOException $e){
    echo $e->getMessage();
    header("Location: ../admin.php");
  }
  header("Location: ../admin.php");
}
else{
  header("Location: ../index.php");
}
?>
