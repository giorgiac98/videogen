<?php
  session_start();
  require_once 'db/connect.php';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>VideoGen - The Next Generation Market</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/videogen.css" rel="stylesheet">
  </head>
  <body>
  <?php
    require_once 'navbar.php';
  ?>
    <main role="main">
      <?php
        $query = $db->prepare("SELECT * FROM utenti WHERE username = ?");
        $query->execute([$_SESSION['user']]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
       ?>

      <div class="container mt-5">
        <div class="row">
      		<div class="col-sm-9"><h1><?php echo $user['nome'] . ' ' . $user['cognome'] ?></h1></div>
        	<div class="col-sm-3"><img class="img-fluid" src="media/users.png"></div>
        </div>
        <div class="row">
        	<div class="col-sm-9">
            <div class="card">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#info" role="tab">Informazioni</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#password"role="tab">Cambio Password</a></li>
                </ul>
              </div>
              <div class="tab-content card-body">
                <div class="tab-pane  <?php if(!isset($_SESSION['pwd_error'])){echo 'active';}?>"
                   id="info" role="tabpanel">
                      <form class="form mt-3" action="db/updateInfo.php" method="post" id="registrationForm">
                          <div class="form-group">
                              <div class="col-xs-6">
                                  <label for="nome"><h4>Nome</h4></label>
                                  <input type="text" class="form-control" name="nome" id="nome" placeholder="nome" <?php echo 'value="' . $user['nome'] . '"'?>>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                <label for="cognome"><h4>Cognome</h4></label>
                                  <input type="text" class="form-control" name="cognome" id="cognome" placeholder="cognome" <?php echo 'value="' . $user['cognome'] . '"'?>>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                 <label for="telefono"><h4>Telefono</h4></label>
                                  <input type="text" class="form-control" name="telefono" id="telefono" placeholder="numero di telefono" <?php echo 'value="' . $user['telefono'] . '"'?>>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                  <label for="email"><h4>Email</h4></label>
                                  <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" <?php echo 'value="' . $user['email'] . '"'?>>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                  <label for="indirizzo"><h4>Indirizzo</h4></label>
                                  <input type="text" class="form-control" name="indirizzo" id="indirizzo" placeholder="via, numero, città, paese" <?php echo 'value="' . $user['indirizzo'] . '"'?>>
                              </div>
                          </div>
                          <div class="form-group">
                               <div class="col-xs-12">
                                    <br>
                                  	<button class="btn btn-lg btn-success" type="submit">Save <i class="fas fa-check"></i></button>
                                </div>
                          </div>
                  	</form>

                 </div><!--/tab-pane-->
                 <div class="tab-pane
                 <?php
                  if(isset($_SESSION['pwd_error'])){
                   echo 'active';
                   $error = true;
                 }else{
                   $error = false;
                 }?>" id="password" role="tabpanel">
                      <?php
                        if($error){
                          echo '<br> <div class="alert alert-danger" role="alert">' . $_SESSION['pwd_error'] . '</div>';
                        }
                      ?>
                      <form class="form mt-3" action="db/updatePassword.php" method="post" id="changePwdForm">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="old_password"><h4>Vecchia Password</h4></label>
                                <input type="password" class="form-control" name="old_password" id="old_password" placeholder="vecchia password">
                            </div>
                        </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                  <label for="password"><h4>Nuova Password</h4></label>
                                  <input type="password" class="form-control" name="password" id="password" placeholder="nuova password">
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-xs-6">
                                <label for="password_verify"><h4>Verifica Password</h4></label>
                                  <input type="password" class="form-control" name="password_verify" id="password_verify" placeholder="ripeti la nuova password">
                              </div>
                          </div>
                          <div class="form-group">
                               <div class="col-xs-12">
                                    <br>
                                  	<button class="btn btn-lg btn-success" type="submit">Save <i class="fas fa-check"></i></button>
                                </div>
                          </div>
                  	</form>
                  </div><!--/tab-pane-->

              </div><!--/tab-content-->

            </div><!--/col-9-->
        </div><!--/row-->
      </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
