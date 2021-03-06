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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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

  <div class="container mt-5">
    <h1>Risultati ricerca</h1>

      <?php
      if ((isset($_GET['game'])) && ($_GET['game'])){
        require_once 'db/connect.php';
        echo "<h4>Hai cercato: " . $_GET['game'] . '</h4>';
        $query = $db->prepare("SELECT DISTINCT titolo, descrizione, produttore, img_path FROM videogiochi WHERE lower(titolo) LIKE '%' || ? || '%' ORDER BY titolo");
        $query->execute([$_GET['game']]);
        echo '<div class="row">';

        while ($games = $query->fetch(PDO::FETCH_ASSOC)) {
          echo '<div class="col-lg-4 col-md-6 mb-4">
                  <div class="card h-100">
                    <a href="product.php?titolo=' . $games['titolo'] . '">
                      <img class="card-img-top" src="'.$games['img_path'].'" alt="">
                    </a>
                    <div class="card-body">';
          echo '<a href="product.php?titolo=' . $games['titolo'] . '">
                <h4 class="card-title">' . $games['titolo'] . '</h4></a>';
          echo '<h5>' . $games['produttore'] . '</h5>';

          $query2 = $db->prepare("SELECT console, prezzo FROM videogiochi WHERE titolo = ?");
          $query2->execute([$games['titolo']]);
          echo '<table class="table table-borderless">';
          while ($console_price = $query2->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>
                  <td style="padding: 0px;">' . $console_price['console'] . '</td>';
            echo '<td style="padding: 0px;"> € ' . $console_price['prezzo'] . '</td>
                  </tr>';
          }
          echo '</table>
                    </div>
                  </div>
                </div>';
        }
        echo '</div>';
      }
      else {
          echo '<h4>La ricerca non ha prodotto risultati.</h4>';
      }
      ?>
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
</html>
