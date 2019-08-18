<?php
  session_start();
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Admin</title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/videogen.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap pt-0 pb-0 shadow">
      <a class="navbar-brand" href="index.php">VideoGen</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="btn btn-outline-success my-2 my-sm-0" href="db/logout.php" role="button">Sign out</a>
        </li>
      </ul>
    </nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
              <i class="fas fa-home"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="prod-tab" data-toggle="tab" href="#products" role="tab" aria-controls="products" aria-selected="false">
              <i class="fas fa-shopping-cart"></i>
              Gestione Prodotti
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="ord-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">
              <i class="fas fa-folder-open"></i>
              Gestione Ordini
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="usr-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="false">
              <i class="fas fa-users"></i>
              Gestione Clienti
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="tab-content" id="content">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          Benvenuto! Usa il menù a sinistra per spostarti.
        </div>
        <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="prod-tab">
          <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 mr-2">Gestione Prodotti</h1>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addProduct">
              <i class="fas fa-plus"></i> Aggiungi
            </button>
          </div>
          <table class="table" id="prodTable">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Produttore</th>
                <th scope="col">Console</th>
                <th scope="col">Quantità</th>
                <th scope="col">Modifica</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once 'db/connect.php';
              $query = $db->prepare("SELECT * FROM videogiochi v");
              $query->execute();
              $i = 1;
              while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<th scope="row">' . $i . '</th>';
                echo '<td>' . $row['titolo'] . '</td>';
                echo '<td>' . $row['produttore'] . '</td>';
                echo '<td>' . $row['console'] . '</td>';
                echo '<td>' . $row['qta'] . '</td>';
                echo '<td> <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-wrench"></i></button>
                      <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                      </td>';
                echo '</tr>';
                $i = $i + 1;
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="ord-tab">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gestione Ordini</h1>
          </div>
          ORDINI
        </div>
        <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="usr-tab">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gestione Clienti</h1>
          </div>
          <table class="table" id="prodTable">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Cognome</th>
                <th scope="col">Nome</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Telefono</th>
                <th scope="col">email</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require_once 'db/connect.php';
              $query = $db->prepare("SELECT * FROM utenti WHERE NOT admin");
              $query->execute();
              $i = 1;
              while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<th scope="row">' . $i . '</th>';
                echo '<td>' . $row['utente'] . '</td>';
                echo '<td>' . $row['nome'] . '</td>';
                echo '<td>' . $row['cognome'] . '</td>';
                echo '<td>' . $row['indirizzo'] . '</td>';
                echo '<td>' . $row['telefono'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '</tr>';
                $i = $i + 1;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal fade" id="addProduct" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addProductLabel">Aggiungi nuovo prodotto</h5>
              <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="db/addProduct.php" method="post">
                <div class="form-group">
                  <label for="prodTitle">Titolo</label>
                  <input type="text" class="form-control" name="prodTitle" placeholder="Titolo" required>
                </div>
                <div class="form-group">
                  <label for="prodDesc">Descrizione</label>
                  <input type="text" class="form-control" name="prodDesc" placeholder="Descrizione prodotto" required>
                </div>
                <div class="form-group">
                  <label for="producer">Produttore</label>
                  <input type="text" class="form-control" name="producer" placeholder="Produttore" required>
                </div>
                <div class="form-group">
                  <label for="price">Prezzo</label>
                  <input type="number" step="0.01" min=1 class="form-control" name="price" placeholder="30.00" required>
                </div>
                <div class="form-group">
                  <label for="qty">Quantità</label>
                  <input type="number" class="form-control" min=1 name="qty" placeholder="10" required>
                </div>
                <div class="form-group">
                  <label for="console">Console</label>
                  <select class="form-control" name="console" required>
                    <option>PS4</option>
                    <option>XBOX ONE</option>
                    <option>PC</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary" id="confirmAddProduct">Aggiungi</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/dashboard.js"></script></body>
</html>
