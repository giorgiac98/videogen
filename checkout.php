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
      $_SESSION['totale'] = 0;
    ?>
    <main role="main">
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Carrello</span>
              <span class="badge badge-secondary badge-pill"><?php echo count($_SESSION['cart']); ?></span>
            </h4>
            <ul class="list-group mb-3">
              <?php
              foreach($_SESSION['cart'] as $x){
                  $query = $db->prepare("SELECT id, titolo, console, prezzo FROM videogiochi WHERE id = ?");
                  $query->execute([$x]);
                  $game = $query->fetch();
                  $_SESSION['totale'] += $game['prezzo'];
              ?>
              <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div id="<?php echo $game['id']; ?>">
                  <h6 class="my-0"><?php echo $game['titolo']; ?></h6>
                  <small class="text-muted">Per <?php echo $game['console']; ?></small>
                </div>
                <span class="text-muted">€ <?php echo $game['prezzo']; ?></span>
              </li>
              <?php
              }
              ?>
              <li class="list-group-item d-flex justify-content-between">
                <span>Totale </span>
                <strong>€ <?php echo $_SESSION['totale']; ?></strong>
              </li>
            </ul>
          </div>
          <?php
          $query = $db->prepare("SELECT * FROM utenti WHERE username = ?");
          $query->execute([$_SESSION['user']]);
          $user = $query->fetch(PDO::FETCH_ASSOC);
           ?>
          <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Indirizzo di spedizione</h4>
            <form id="mainForm" method="post" action="db/newOrder.php">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="firstName">Nome</label>
                  <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $user['nome'];?>" required>
                  <div class="invalid-feedback">
                    Nome richiesto.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="lastName">Cognome</label>
                  <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $user['cognome'];?>" required>
                  <div class="invalid-feedback">
                    Cognome richiesto.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com"  value="<?php echo $user['email'];?>" required>
                <div class="invalid-feedback">
                  Inserire un indirizzo email valido.
                </div>
              </div>

              <div class="row">
                <div class="col-md-9 mb-3">
                  <label for="address">Indirizzo</label>
                  <input type="text" class="form-control" id="address" placeholder="Via nome, 11" value="<?php echo $user['indirizzo'];?>" required>
                  <div class="invalid-feedback">
                    Inserire un indirizzo di spedizione.
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="zip">CAP</label>
                  <input type="text" class="form-control" id="zip" placeholder="" required pattern="[0-9]{5}">
                  <div class="invalid-feedback">
                    CAP richiesto.
                  </div>
                </div>
              </div>
              <hr class="mb-4">

              <h4 class="mb-3">Modalità di Pagamento</h4>
              <div class="d-block my-3">
                <div class="custom-control custom-radio custom-control-inline">
                  <input id="credit" value="Carta di credito" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                  <label class="custom-control-label" for="credit">Carta di credito</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input id="debit" value="Carta di debito" name="paymentMethod" type="radio" class="custom-control-input" required>
                  <label class="custom-control-label" for="debit">Carta di debito</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input id="paypal" value="PayPal" name="paymentMethod" type="radio" class="custom-control-input" required>
                  <label class="custom-control-label" for="paypal">Paypal</label>
                </div>
              </div>
              <div id="cardDetails">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="cc-name">Titolare della carta</label>
                    <input type="text" class="form-control" id="cc-name" placeholder="" required>
                    <div class="invalid-feedback">
                      Titolare richiesto.
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="cc-number">Numero della carta</label>
                    <input type="text" class="form-control" id="cc-number" placeholder="" required pattern="[0-9]{16}">
                    <div class="invalid-feedback">
                      Numero carta richiesto.
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="cc-expiration">Data scadenza</label>
                    <input type="date" class="form-control" id="cc-expiration" placeholder="" required>
                    <div class="invalid-feedback">
                      Data scadenza richiesta.
                    </div>
                  </div>
                  <div class="col-md-2 mb-3">
                    <label for="cc-expiration">CVV</label>
                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required pattern="[0-9]{3}">
                    <div class="invalid-feedback">
                      Codice di sicurezza richiesto.
                    </div>
                  </div>
                </div>
              </div>
              <div id="paypalDetails" style="display: none; height: 172px;">
                <div style="padding-top: 62px;">
                  <button id="connectPaypal" class="btn btn-outline-success btn-lg btn-block" type="button">Collega Paypal</button>
                </div>
              </div>
              <hr class="mb-4">
              <button class="btn btn-success btn-lg btn-block" type="submit">Completa Ordine</button>
            </form>
          </div>
        </div>
      </div>
    </main>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://use.fontawesome.com/c560c025cf.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/checkout.js"></script>
    <!--<script src="../../assets/js/vendor/holder.min.js"></script> TODO non so da dove tirare giù questo -->
  </body>
</html>
