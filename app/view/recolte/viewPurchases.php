<!-- debut viewPurchases-->
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
              <h2 class="panel-title"> Ici les vins que vous avez achetés</h2> 
          </div>
          <div class="panel-body">
              <table class="table table-bordered table-responsive table-hover">
                  <tr>
                      <th scope="col">Cru</th>
                      <th scope="col">Prix</th>
                  </tr>
                  <?php 
                    if(!empty($_SESSION["achats"])){
                        foreach ($_SESSION["achats"] as $key => $values){
                            echo '<tr>';
                            echo ("<td> $values[0] </td> ");
                            echo ("<td> $values[1] </td> ");
                            echo '</tr>';
                        }
                    }else{
                        printf("Vous avez sûrement rentré de mauvais identifiants et votre panier était vide . Merci de reprendre la sélection");
                    }
                  ?>
              </table>
          </div>
      </section>
  </div>
  <?php 
  session_destroy();
  include $root . '/app/view/fragment/fragmentCaveFooter.html'; 
  ?>

<!--fin viewPurchases -->
