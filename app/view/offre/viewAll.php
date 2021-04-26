
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
          <th scope = "col">id</th>
          <th scope = "col">producteur_ide</th>
          <th scope = "col">intitule</th>
          <th scope = "col">salaire</th>
          <th scope = "col">date</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des offres est dans une variable $results    
          if(!is_string($results))
            foreach ($results as $element) {
             printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getId(),$element->getProducteur_ide(), $element->getCru(), $element->getSalaire(), $element->getDate());
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