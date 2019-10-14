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
    <link href="css/cart.css" rel="stylesheet">
  </head>
  <body>
    <?php
      require_once 'navbar.php';
      $totale = 0;
      // se la var di sessione non esiste la creo
      if (!isset($_SESSION['cart']))
        $_SESSION['cart'] = [];

      if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        // aggiungo l'ultimo prodotto al cart
        if(!in_array($_POST['id_gioco'], $_SESSION['cart'])){
          array_push($_SESSION['cart'], $_POST['id_gioco']);
        }
      }
    ?>
      <main role="main">
        <div class="container mt-5">
           <div class="card shopping-cart">
                    <div class="card-header bg-dark text-light">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        Carrello
                        <a href="index.php" class="btn btn-outline-success btn-sm pull-right">Torna al catalogo</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">
                            <?php
                            foreach($_SESSION['cart'] as $x){
                                $query = $db->prepare(
                                  "SELECT id, titolo, descrizione, produttore, img_path, console, prezzo, qta FROM videogiochi
                                  WHERE id = ?");
                                $query->execute([$x]);
                                $game = $query->fetch();
                                $totale += $game['prezzo'];
                                ?>
                                <!-- PRODUCT -->
                                <div class="row align-items-center">
                                    <div class="col-12 col-sm-12 col-md-2 text-center">
                                        <img class="img-responsive" src="<?php echo $game['img_path']; ?>" alt="prewiew" width="120" height="160">
                                    </div>
                                    <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                                        <h4 class="product-name"><strong><?php echo $game['titolo']; ?></strong></h4>
                                        <h4><small>Per <?php echo $game['console']; ?></small></h4>
                                    </div>
                                    <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row align-items-center">
                                        <div class="col-3 col-sm-3 col-md-6 text-md-right">
                                            <h6><strong>€ <?php echo $game['prezzo']; ?></strong></h6>
                                        </div>
                                        <div class="col-4 col-sm-4 col-md-4">
                                            <div class="quantity">
<<<<<<< HEAD
                                                <input type="number" step="1" max="<?php echo $game['qta']; ?>" min="1" value="1" class="qty" size="4">
                                            </div>
                                        </div>
                                        <div class="col-2 col-sm-2 col-md-2 text-right">
                                          <form action="cartDeleteGame.php" method="post">
                                            <button type="submit" class="btn btn-outline-danger btn-xs" name="game" value="<?php echo $game['id']; ?>">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                          </form>
=======
                                                <input type="number" step="1" max="<?php echo $game['qta']; ?>" min="1" value="1" title="Qty" class="qty" size="4">
                                            </div>
                                        </div>
                                        <div class="col-2 col-sm-2 col-md-2 text-right">
                                            <button type="button" class="btn btn-outline-danger btn-xs">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
>>>>>>> 1148760d92e7db63b9d98c9a60f9ba993a542d27
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            <?php
                            }
                            ?>
                    </div>
                    <div class="card-footer">
                        <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left" style="margin: 10px">
                          <div class="pull-left">
                              <a href="" class="btn btn-outline-success pull-right">
                                  Aggiorna carrello
                              </a>
                          </div>
                        </div>
                        <div class="pull-right" style="margin: 10px">
                            <a href="checkout.php" class="btn btn-success pull-right ml-2" id="checkoutButton">Checkout</a>
                            <div class="pull-right" style="margin: 5px">
                                Totale : <b>€ <?php echo $totale; ?></b>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
      </main>
      <script src="https://use.fontawesome.com/c560c025cf.js"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
