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
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/videogen.css" rel="stylesheet">
  </head>
  <body>
  <?php
    require_once 'navbar.php';
  ?>
    <main role="main">
      <div class="container marketing">
        <?php
        //echo $_SESSION['user'];
         ?>
         <div class="container py-5">
             <div class="row">
                 <div class="col-lg-7 mx-auto bg-white rounded shadow">

                     <!-- Fixed header table-->
                     <div class="table-responsive">
                         <table class="table table-fixed">
                             <thead>
                                 <tr>
                                     <th scope="col" class="col-3">Numero Ordine</th>
                                     <th scope="col" class="col-3">Data Ordine</th>
                                     <th scope="col" class="col-3">Spedito a</th>
                                     <th scope="col" class="col-3">Totale</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <th scope="row" class="col-3">1</th>
                                     <td class="col-3">1/1/19</td>
                                     <td class="col-3">Otto</td>
                                     <td class="col-3">$122</td>
                                 </tr>
                                 <tr>
                                     <th scope="row" class="col-3">2</th>
                                     <td class="col-3">2/3/19</td>
                                     <td class="col-3">Thornton</td>
                                     <td class="col-3">$47</td>
                                 </tr>
                                 <tr>
                                     <th scope="row" class="col-3">4</th>
                                     <td class="col-3">3/7/19</td>
                                     <td class="col-3">Williams</td>
                                     <td class="col-3">$80</td>
                                 </tr>
                                 <tr>
                                     <th scope="row" class="col-3">4</th>
                                     <td class="col-3">19/9/19</td>
                                     <td class="col-3">Williams</td>
                                     <td class="col-3">$22</td>
                                 </tr>
                             </tbody>
                         </table>
                     </div><!-- End -->

                 </div>
             </div>
         </div>
      </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
