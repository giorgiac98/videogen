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
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">
        <h1 class="mt-5 mb-5">Catalogo Videogiochi</h1>
          <div class="row">
            <?php
              $query = $db->prepare("SELECT DISTINCT titolo, descrizione, produttore, img_path FROM videogiochi ORDER BY titolo");
              $query->execute();

              while ($games = $query->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                          <a href="product.php?titolo=' . $games['titolo'] . '">
                            <img class="card-img-top" src="' . $games['img_path'] . '" alt="">
                          </a>
                          <div class="card-body">';
                echo '<a href="product.php?titolo=' . $games['titolo'] . '">
                      <h4 class="card-title">' . $games['titolo'] . '</h4></a>';
                echo '<h5>' . $games['produttore'] . '</h5>';

                $query2 = $db->prepare("SELECT console, prezzo FROM videogiochi WHERE titolo = ?");
                $query2->execute([$games['titolo']]);
                while ($console_price = $query2->fetch(PDO::FETCH_ASSOC)) {
                  echo '<p>' . $console_price['console'];
                  echo ' € ' . $console_price['prezzo'] . '</p>';
                }
                echo '    </div>
                        </div>
                      </div>';
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
    <script type="text/javascript" src="js/catalogo.js"></script>
  </body>
</html>
