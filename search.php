<?php
  session_start();
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>VideoGen - The Next Generation</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <h1>Risultati ricerca</h1>
    <div class="row">
      <?php
      if ((isset($_GET['game'])) && ($_GET['game'])){
        require_once 'db/connect.php';
        echo "<h4>Hai cercato: " . $_GET['game'] . '</h4>';
        $query = $db->prepare("SELECT * FROM videogiochi where lower(titolo) like '%' || ? || '%'");
        $query->execute([$_GET['game']]);
        //TODO unificare la card in un unico gioco e vedere i tre prezzi per ogni console
        while ($games = $query->fetch(PDO::FETCH_ASSOC)) {
          echo '<div class="col-lg-4 col-md-6 mb-4">
                  <div class="card h-100">
                    <a href="product.php?id=' . $games['id'] . '">
                      <img class="card-img-top" src="'.$games['img_path'].'" alt="">
                    </a>
                    <div class="card-body">';
          echo '<a href="product.php?id=' . $games['id'] . '">
                <h4 class="card-title">' . $games['titolo'] . '</h4></a>';
          echo '<h5>' . $games['produttore'] . '</h5>';

          $query2 = $db->prepare(
            "SELECT * FROM giochi_console g
            JOIN console c ON c.id = g.id_console
            WHERE id_gioco = ?");
          $query2->execute([$games['id']]);
          while ($console_price = $query2->fetch(PDO::FETCH_ASSOC)) {
            echo '<p>' . $console_price['nome'];
            echo ' € ' . $console_price['prezzo'] . '</p>';
          }
          echo '    </div>
                  </div>
                </div>';
        }
      }
      else {
          echo '<h4>La ricerca non ha prodotto risultati.</h4>';
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
