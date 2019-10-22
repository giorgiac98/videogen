<?php
    session_start();
    require_once 'connect.php';

    if(isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
      $query = $db->prepare(
              "SELECT id
              FROM utenti
              WHERE username = ?");
      $query->execute([$_SESSION['user']]);
      $id_utente = $query->fetch()['id'];

      $query = $db->prepare(
              "INSERT INTO ordini(id_utente, data, tipo_pagamento, totale)
              VALUES(?, ?, ?, ?)");
      $query->execute([$id_utente, date("d/m/Y", time()), $_POST['paymentMethod'], $_SESSION['totale']]);

      $query = $db->prepare(
              "SELECT id
              FROM ordini
              WHERE id_utente = ? AND data = ? AND tipo_pagamento = ?");
      $query->execute([$id_utente, date("d/m/Y", time()), $_POST['paymentMethod']]);
      $id_ordine = $query->fetch()['id'];

      foreach($_SESSION['cart'] as $x){
        $query = $db->prepare(
          "INSERT INTO ordini_giochi(id_ordine, id_gioco, qta)
          VALUES(?, 1, ?)");
        $query->execute([$id_ordine, $x]);
      }

      header("Location: ../orders-history.php");
    }
    else{
      header("Location: ../index.php");
    }

?>
