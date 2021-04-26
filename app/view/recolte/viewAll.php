
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">producteur_id</th>
          <th scope = "col">vin_id</th>
          <th scope = "col">quantite</th>
          <th scope = "col">prix</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des récoltes est dans une variable $results   
          if(!is_string($results)){
            foreach ($results as $element) {
             printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getProducteur_id(), $element->getVin_id(), $element->getQuantite(), $element->getPrix());
            }
          }
          ?>
      </tbody>
    </table>
      <?php
        if(is_string($results)){
            echo ($results);
        }
      ?>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->
