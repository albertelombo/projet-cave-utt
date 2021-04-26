
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 
      <section class="panel panel-info">
          <div class="panel-heading">
              <h2>La liste des offres </h2>
          </div>
          <div class="panel-body">
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
                   printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getId(),$element->getProducteur_ide(), $element->getIntitule(), $element->getSalaire(), $element->getDate_publi());
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
      </section>
      <section class="panel panel-info">
          <div class="panel-heading">
              <h2> Rentrer les information de l'offre</h2>
              <p> Merci d'insérer dans l'intitulé votre nom et votre région</p>
          </div>
          <div class="panel-body">
            <form role="form" method='get' action='router2.php'>
            <div class="form-group">
              <input type="hidden" name='action' value='offreCreated'>   
              <label for="id">producteur_ide : </label><input type="text" name='producteur_ide' value=''>
              <label for="id">intitule : </label><input type="text" name='intitule' size='75' value=''>   
              <label for="id">salaire : </label><input type="text" name='salaire' value=''>
              <label for="id">date : </label><input type="date" name='date' value=''>                
            </div>
            <p/>
            <button class="btn btn-primary" type="submit">Go</button>
          </form>
          </div>
      </section>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



