<?php
  session_start();
  require_once 'db/connect.php';
  $query = $db->prepare(
    "SELECT DISTINCT titolo, descrizione, produttore, img_path FROM videogiochi
    WHERE titolo = ?");
  $query->execute([$_GET['titolo']]);
  $game = $query->fetch();
  $query2 = $db->prepare("SELECT id, console, prezzo FROM videogiochi WHERE titolo = ?");
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
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupConsole">Console</label>
              </div>
              <select class="custom-select" id="inputGroupConsole" onfocus="prev()" onchange="display()">
                <option selected>Scegli...</option>
                <?php
                  $query2->execute([$_GET['id']]);
                  while ($console_price = $query2->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="' . $console_price['id_console'] .'">' . $console_price['nome'] . '</option>';
                  }
                ?>
              </select>
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupQta">Quantità</label>
              </div>
              <select class="custom-select" id="inputGroupQta">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <div>
                <?php
                  $query2->execute([$_GET['id']]);
                  while ($console_price = $query2->fetch(PDO::FETCH_ASSOC)) {
                      echo '<div style="display: ';
                      if((isset($_GET['cons'])) && $_GET['cons'] ==  $console_price['id_console']){
                        echo 'block;"';
                      }else{
                        echo 'none;"';
                      }
                      echo' id="price-' . $console_price['id_console'] . '">';
                      echo '<p>Prezzo  € ' . $console_price['prezzo'] . '</p>';
                      echo '</div>';
                  }
                 ?>
              </div>
            </div>
            <a class="btn btn-success" href="#" role="button">Ordina</a>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
  var previous;
  function display() {
    id_console = document.getElementById("inputGroupConsole").value;
    if(id_console != "Scegli..."){
      document.getElementById("price-"+ id_console).style.display = "block";
    }
    if(previous != "Scegli..."){
      document.getElementById("price-"+ previous).style.display = "none";
    }
    previous = id_console;
  }
  function prev() {
    previous = document.getElementById("inputGroupConsole").value;
  }
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/catalogo.js"></script>>
</html>
