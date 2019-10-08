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
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/videogen.css" rel="stylesheet">

</head>
  <body>
  <?php
    require_once 'navbar.php';
  ?>
    <main role="main">
      <div class="container mt-5">
        <div class="row">
        <?php
        //echo $_SESSION['user'];
         ?>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Numero ordine </th>
                <th>Utente</th>
                <th>Data ordine</th>
                <th>Prodotti</th>
                <th>Totale</th>
              </tr>
            </thead>
            <tbody>
               <?php

               $query = $db->prepare(" SELECT ordini.id AS id,id_utente,data,titolo,prezzo,(prezzo*ordini_giochi.qta) AS tot
                                        FROM videogiochi,utenti,ordini,ordini_giochi
                                        WHERE id_utente = utenti.id AND id_ordine = ordini.id AND id_gioco = videogiochi.id");
               $query->execute();

               while ($games = $query->fetch(PDO::FETCH_ASSOC)) {
                 echo'<tr><td>';
                 echo '<div class="col-sm-4">'. $games['id'] . '</div>';
                 echo '</td><td>';
                 echo '<div class="col-sm-4">'. $games['id_utente'] . '</div>';
                 echo '</td><td>';
                 echo '<div class="col-sm-4">'. $games['data'] . '</div>';
                 echo '</td><td>';
                 echo '<div class="col-sm-4">
                 <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse'. $games['id'] . '">Visualizza prodotti</a>
                  </h4>
                 </div>
                    <div id="collapse'. $games['id'] . '" class="panel-collapse collapse">';


                echo '<div class="col-sm-8">' . $games['titolo'] . '</div>';


                 echo '</div></div>';
                 echo '</td><td>';

                 echo '<div class="col-sm-8">' . $games['tot'] . '</div>';
                 echo '</td></tr>';

               }
               ?>

             </tbody>
           </table>
         </div>
       </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html><!--->>
