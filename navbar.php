<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php">VideoGen</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <form class="form-inline mt-2 mt-md-0 myForm" action="search.php" method="GET">
            <input class="form-control mr-sm-2" name="game" type="text" placeholder="Titolo del gioco" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
        </form>
      </ul>
      <?php
      if (isset($_SESSION["logged"]) && ($_SESSION["logged"] >= 0)) {
        echo '<ul class="navbar-nav mt-2 mt-md-0">
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">';
        echo $_SESSION['user'];
        echo '    </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="cart.php"> <i class="fas fa-shopping-cart"></i> </a>
                </li>
                <li class="nav-item">
                   <div class="dropdown">';
        if ($_SESSION["logged"] < 100) {
               echo '<button class="btn btn-outline-success my-2 my-sm-0 dropdown-toggle" type="button" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Il mio account
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownAccount">
                        <a class="dropdown-item" href="personal-data.php">I miei dati</a>
                        <a class="dropdown-item" href="orders-history.php">I miei ordini</a>';

        }
        else{
              echo ' <button class="btn btn-outline-success my-2 my-sm-0 dropdown-toggle" type="button" id="dropdownAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Amministrazione
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownAdmin">
                        <a class="dropdown-item" href="admin.php">Dashboard</a>';
        }
        echo '          <a class="dropdown-item" href="db/logout.php">Esci</a>
                     </div>
                   </div>
                </li>
              </ul>';
      }
      else{
        echo '<ul class="navbar-nav mt-2 mt-md-0">
                <li class="nav-item">
                  <a class="btn btn-outline-success my-2 my-sm-0" href="signin.php">Sign in/Sign up</a>
                </li>
              </ul>';
      }
      ?>
    </div>
  </nav>
</header>
