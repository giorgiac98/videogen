<?php
if(!isset($_SESSION)){
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['cart'])) {
  $id = $_POST['game'];
  if(in_array($id, $_SESSION['cart']))
    $_SESSION['cart'] = array_diff($_SESSION['cart'], [$id]);

  header("Location: cart.php");
}
else{
  header("Location: ../index.php");
}
?>
