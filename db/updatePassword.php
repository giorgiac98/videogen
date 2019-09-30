<?php
require_once 'connect.php';

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
  $old_pwd = $_POST['old_password'];
  $new_pwd = $_POST['password'];
  $new_pwd_verify = $_POST['password_verify'];

  if($new_pwd == $new_pwd_verify){
    try{
      $sql = 'SELECT password FROM utenti WHERE username = ?';
      $query = $db->prepare($sql);
      $query->execute([$user]);
      if($query->rowCount() == 1){
        $res = $query->fetch();
        $dbpass = $res['password'];
        if (password_verify($old_pwd, $dbpass)){
          $sql = 'UPDATE utenti SET password = ? WHERE username = ?';
          $query = $db->prepare($sql);
          $query->execute([password_hash($_POST['password'], PASSWORD_DEFAULT), $user]);
        }else{
          $_SESSION['pwd_error'] = "Errore: la password non è corretta";
          header("Location: ../personal-data.php");
        }
      }else{
        $_SESSION['pwd_error'] = "Errore: utente non trovato";
        header("Location: ../personal-data.php");
      }
    }
    catch (PDOException $e){
      $_SESSION['pdo_error'] = $e->getMessage();
      header("Location: ../personal-data.php");
    }
    unset($_SESSION['pwd_error']);
    header("Location: ../personal-data.php");
  }else{
    $_SESSION['pwd_error'] = "Errore: la nuova password non corrisponde con la sua verifica";
    header("Location: ../personal-data.php");
  }
}
else{
  header("Location: ../index.php");
}
?>
