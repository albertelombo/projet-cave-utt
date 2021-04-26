<!-- début viewBasket -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      ?>
      <section class="panel">
          <div class="panel-heading">
              <h2 class="panel-title"> Acheter un autre vin</h2> 
          </div>
          <div class="panel-body">
              <a href="router2.php?action=recolteReadId&target=recolteSendToBasket"><button class="btn btn-lg btn-success">Ici l'achat</button></a>
          </div>
      </section>
      <section class="panel">
          <div class="panel-heading">
              <h2 class="panel-title"> Voici votre panier. Confirmez le paiement</h2> 
          </div>
          <div class="panel-body">
              <?php 
                if(!isset($_SESSION["achats"])){
                    $_SESSION["achats"] = [];
                }
                foreach ($results as $key => $values){
                    array_push($_SESSION["achats"],[$values['cru'],$values['prix'],$values["producteur_id"],$values["vin_id"]]);
                }
              ?>
              <table class="table table-bordered table-responsive table-hover">
                  <tr>
                      <th scope="col">Cru</th>
                      <th scope="col">Prix</th>
                  </tr>
                  <?php 
                    foreach ($_SESSION["achats"] as $key => $values){
                        echo '<tr>';
                        echo ("<td> $values[0] </td> ");
                        echo ("<td> $values[1] </td> ");
                        echo '</tr>';
                    }
                  ?>
              </table>
              <p> Si votre panier est vide alors vous avez rentré de mauvais identifiants. Merci de reprendre.</p>
              <h3> Confirmer le paiement</h3>
              <a href="router2.php?action=recoltePurchases"><button class="btn btn-lg btn-success">Ici le débit du compte</button></a>
          </div>
      </section>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
<!-- fin viewBasket -->

