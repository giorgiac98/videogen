<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //} && isset($_POST['user']) && $_POST['user']) {
  $id = $_POST['order'];
  try{
    $sql = 'DELETE FROM ordini_giochi WHERE id_ordine = ?';
    $query = $db->prepare($sql);
    $query->execute([$id]);
    $sql = 'DELETE FROM ordini WHERE id = ?';
    $query = $db->prepare($sql);
    $query->execute([$id]);
  }
  catch (PDOException $e){
    echo $e->getMessage();
    echo 'Something bad happened. You will be redirected in a few seconds';
    sleep(5);
    header("Location: ../admin.php");
  }
  header("Location: ../admin.php?where=orders");
}
else{
  header("Location: ../index.php");
}
?>
