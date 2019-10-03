<?php
  session_start();
  require_once 'db/connect.php';
  $query = $db->prepare(
    "SELECT DISTINCT titolo, descrizione, produttore, img_path FROM videogiochi
    WHERE titolo = ?");
  $query->execute([$_GET['titolo']]);
  $game = $query->fetch();
  $query2 = $db->prepare("SELECT id, console, prezzo, qta FROM videogiochi WHERE titolo = ?");
  $query2->execute([$game['titolo']]);
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
    <div class="container">
      <div class="row">
        <div class="card-product mt-5">
          <div class="col">
            <?php
              echo '<img class="card-img-top img-fluid" src="'.$game['img_path'].'" alt="">';
            ?>
          </div>
          <div class="card-body col-6">
            <?php
              echo '<h3 class="card-title">' . $game['titolo'] . '</h3>';
              echo '<h5>Descrizione</h5><p class="card-text">'. $game['descrizione'] .'</p>';
            ?>
            <div class="input-group mb-3">
              <div class="input-group-prepend mr-2">
                <label class="input-group-text" for="selectConsole">Console</label>
              </div>

              <div class="btn-group btn-group-lg btn-group-toggle" data-toggle="buttons" role="group" id="selectConsole">
                <?php
                  $query2->execute([$_GET['titolo']]);
                  while ($console_price = $query2->fetch(PDO::FETCH_ASSOC)) {
                    echo '<label class="btn btn-success mr-2">';
                    echo '<input type="radio" name="console" autocomplete="off" id="' . $console_price['id'] .'">' . $console_price['console'];
                    echo '</label>';
                  }
                ?>
              </div>
            </div>
            <div>
              <?php
                $query2->execute([$_GET['titolo']]);
                while ($console_price = $query2->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div  class="mb-4" style="display: none;"';
                    echo' id="price-' . $console_price['id'] . '">';
                    echo '<h5>Prezzo  € ' . $console_price['prezzo'] . '</h5>';
                    echo '</div>';
                }
               ?>
             </div>
             <!-- FIXME che ne dici se invece di 'Ordina' mettiamo 'Aggiungi al carrello' ? -->
            <button id="addToCart" class="btn btn-success btn-lg" href="#" type="button" disabled>Ordina</button>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/product.js"></script>
</html>
