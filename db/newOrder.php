<?php
    session_start();
    require_once 'connect.php';

    if(isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
      $query = $db->prepare(
              "INSERT INTO ordini(id_utente, data, tipo_pagamento)
              VALUES(?, ?, ?)");
      $query->execute([$_SESSION['user'], date("d/m/Y", time()), $_POST['paymentMethod']);

      // manca inserire la roba in ordini_giochi

      header("Location: ../orders-history.php");
    }
    else{
      header("Location: ../index.php");
    }

?>
