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
        //print_r($_SESSION);
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

               $query = $db->prepare("  SELECT data,ordini.id AS id,id_utente,totale
                                        FROM videogiochi,utenti,ordini,ordini_giochi
                                        WHERE id_utente = utenti.id AND id_ordine = ordini.id AND id_gioco = videogiochi.id AND utenti.username = ?
                                        GROUP BY data,ordini.id,id_utente,totale");
               $query->execute([$_SESSION['user']]);

               $query2 = $db->prepare("  SELECT titolo,prezzo,ordini_giochi.qta AS num,console
                         FROM videogiochi,utenti,ordini,ordini_giochi
                         WHERE id_utente = utenti.id AND id_ordine = ordini.id AND id_gioco = videogiochi.id AND utenti.username = ? AND data = ?");


               while ($games = $query->fetch(PDO::FETCH_ASSOC)) {

                 echo'<tr><td>';
                 echo '<div class="col-sm-2">'. $games['id'] . '</div>';
                 echo '</td><td>';
                 echo '<div class="col-sm-2">'. $games['id_utente'] . '</div>';
                 echo '</td><td>';
                 echo '<div class="col-sm-4">'. $games['data'] . '</div>';
                 echo '</td><td>';
                 echo '<div class="col-sm-16">
                 <div class="panel-heading">

                  <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse'. $games['id'] . '">Visualizza prodotti</a>
                  </h4>
                 </div>
                    <div id="collapse'. $games['id'] . '" class="panel-collapse collapse">';

                $query2->execute([$_SESSION['user'],$games['data']]);
                while ($games2 = $query2->fetch(PDO::FETCH_ASSOC)){
                  echo '<div class="col-sm-16">' . $games2['titolo'],'  ','(',$games2['console'],')','   x',$games2['num']. '</div>';
                }

                 echo '</div></div>';
                 echo '</td><td>';
                 //$tmp = $games['totale'];
                 echo '<div class="col-sm-8">' . /*bcmul($tmp,1,2)*/$games['totale']  . '</div>';
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
