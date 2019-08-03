<?php
  session_start();
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Signin · Videogen</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body>
    <nav class="nav fixed-top justify-content-center">
      <a href="index.php"><img class="img-fluid" src="media/logo.png" alt=""></a>
    </nav>
    <div class="container auto-margin">
      <div class="row justify-content-center">
        <div class="col col-lg-4">
          <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-signin-tab" data-toggle="tab" href="#nav-signin" role="tab" aria-controls="nav-signin" aria-selected="true">Sign In</a>
              <a class="nav-item nav-link" id="nav-signup-tab" data-toggle="tab" href="#nav-signup" role="tab" aria-controls="nav-signup" aria-selected="false">Sign Up</a>
            </div>
          </nav>
          <div class="tab-content borders" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-signin" role="tabpanel" aria-labelledby="nav-signin-tab">
              <form class="form-signin" method="post" action="db/login.php">
                <h1 class="h3 mb-3 font-weight-normal">Welcome Back!</h1>
                <label for="inputUser" class="sr-only">Username</label>
                <input type="text" name="user" class="form-control" placeholder="Username" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
              </form>
            </div>
            <div class="tab-pane fade" id="nav-signup" role="tabpanel" aria-labelledby="nav-signup-tab">
              <form class="form-signin" method="post" action="db/register.php">
                <h1 class="h3 mb-3 font-weight-normal">Sign up for free</h1>
                <label for="inputUser" class="sr-only">Username</label>
                <input type="text" name="user" class="form-control" placeholder="Username" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <label for="inputEmail" class="sr-only">Email</label>
                <input type="email" name="email" class="form-control" placeholder="user@example.com" required>
                <label for="inputName" class="sr-only">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" required>
                <label for="inputSurname" class="sr-only">Surname</label>
                <input type="text" name="surname" class="form-control" placeholder="Surname" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
              </form>
            </div>
          </div>
          <?php
          if (isset($_SESSION['logged'])){
            if ($_SESSION['logged'] < 0){
              if ($_SESSION['logged'] == -1)
                echo '<div class="alert alert-danger" role="alert">
                        Wrong username.
                      </div>';
              else
                echo '<div class="alert alert-danger" role="alert">
                        Wrong password.
                      </div>';
              unset($_SESSION['logged']);
            }
            else{
              header("Location: index.php");
            }
          }
          ?>
        </div>
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</html>
