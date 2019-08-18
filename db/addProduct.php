<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $img = "media\default.jpg";
  $query = $db->prepare(
          "INSERT INTO videogiochi(titolo, descrizione, img_path, produttore, prezzo, qta, console)
          VALUES(?, ?, ?, ?, ?, ?, ?)");
  $query->execute([$_POST['prodTitle'], $_POST['prodDesc'], $img, $_POST['producer'],
                  $_POST['price'], $_POST['qty'], $_POST['console']]);
  header("Location: ../admin.php");
}
?>
