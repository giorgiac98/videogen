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

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/videogen.css" rel="stylesheet">
  </head>
  <body>
  <?php
    require_once 'navbar.php';
  ?>
  <main role="main">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>Example headline.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
        <div class="container">
          <div class="carousel-caption text-right">
            <h1>One more for good measure.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">
    <h1>Catalogo Videogiochi</h1>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">Tutti</a>
      </li>
      <?php
        $q = $db->prepare("SELECT * FROM console");
        $q->execute();
        while ($console = $q->fetch(PDO::FETCH_ASSOC)) {
          echo '<li class="nav-item">
                  <a class="nav-link" id="pills-' . $console['cod'] . '-tab" data-toggle="pill" href="#pills-' . $console['cod'] . '" role="tab" aria-controls="pills-' . $console['cod'] . '" aria-selected="false">' . $console['nome'] . '</a>
                </li>';
        }
      ?>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
        <div class="row">
          <?php
            $query = $db->prepare("SELECT * FROM videogiochi");
            $query->execute();
            while ($games = $query->fetch(PDO::FETCH_ASSOC)) {
              echo '<div class="col-lg-4 col-md-6 mb-4">
                      <div class="card h-100">
                        <a href="product.php?cod=' . $games['cod'] . '">
                          <img class="card-img-top" src="' . $games['img_path'] . '" alt="">
                        </a>
                        <div class="card-body">';
              echo '<a href="product.php?cod=' . $games['cod'] . '">
                    <h4 class="card-title">' . $games['titolo'] . '</h4></a>';
              echo '<h5>' . $games['produttore'] . '</h5>';

              $query2 = $db->prepare(
                "SELECT * FROM giochi_console g
                JOIN console c ON c.cod = g.cod_console
                WHERE cod_gioco = ?");
              $query2->execute([$games['cod']]);
              while ($console_price = $query2->fetch(PDO::FETCH_ASSOC)) {
                echo '<p>' . $console_price['nome'];
                echo ' € ' . $console_price['prezzo'] . '</p>';
              }
              echo '    </div>
                      </div>
                    </div>';
            }
          ?>

        </div>
      </div>
      <?php
        $q->execute();
        while ($console = $q->fetch(PDO::FETCH_ASSOC)) {
          echo '<div class="tab-pane fade" id="pills-' . $console['cod'] . '" role="tabpanel" aria-labelledby="pills-' . $console['cod'] . '-tab"> <div class="row">';
          $query = $db->prepare("SELECT * FROM videogiochi");
          $query->execute();
          while ($games = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                      <a href="product.php?cod=' . $games['cod'] . '&cons=' . $console['cod'] . '">
                        <img class="card-img-top" src="'.$games['img_path'].'" alt="">
                      </a>
                      <div class="card-body">';
            echo '<a href="product.php?cod=' . $games['cod'] . '&cons=' . $console['cod'] . '">
                  <h4 class="card-title">' . $games['titolo'] . '</h4></a>';
            echo '<h5>' . $games['produttore'] . '</h5>';

            $query2 = $db->prepare(
              "SELECT * FROM giochi_console g
              JOIN console c ON c.cod = g.cod_console
              WHERE cod_gioco = ? AND cod_console = ?");
            $query2->execute([$games['cod'], $console['cod']]);
            while ($console_price = $query2->fetch(PDO::FETCH_ASSOC)) {
              echo '<p>' . $console_price['nome'];
              echo ' € ' . $console_price['prezzo'] . '</p>';
            }
            echo '    </div>
                    </div>
                  </div>';
          }
          echo '</div></div>';
        }
      ?>

    </div>

  </div><!-- /.container -->
  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017-2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/catalogo.js"></script>>
</html>
