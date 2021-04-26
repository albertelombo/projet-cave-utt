
<!-- ----- début viewSubmit -->
 
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
              <h2> Rentrer les information de la candidature</h2>
              <p> Merci d'insérer dans l'intitulé votre nom et votre région</p>
          </div>
          <div class="panel-body">
              <form role="form" method='get' action='router2.php'>
            
              <input type="hidden" name='action' value='offreSubmitted'>   
              <div class="form-group">
              <label for="id">identifiant de la candidature: </label><input type="text" name='id' value='' required>
              </div>
              <div class="form-group">
              <label for="id">Nom et Prénom: </label><input type="text" name='nom' size='45' value='' required>   
              </div>
              <div class="form-group">
              <label for="id">mail : </label><input type="mail" name='mail' value='' required>
              </div>
              <div class="form-group">
              <label for="id">adresse : </label><input type="text" size="45" name='adresse' value='' required>        
              </div>
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





