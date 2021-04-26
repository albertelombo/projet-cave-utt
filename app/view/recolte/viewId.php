
<!-- ----- début viewId -->
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

      // $results contient un tableau avec la liste des clés.
      ?>

       <section class="panel panel-info limited">
          <div class="panel-heading">
              <h2> Rentrer les identifiants du vin de votre choix</h2>
          </div>
          <div class="panel-body">
                <form role="form" method='get' action='router2.php'>
                <div class="form-group">
                  <input type="hidden" name='action' value='<?php echo($target)?>'>
                  <label for="producteur_id">producteur_id : </label> <input type="text" name="producteur_id" value="" required>
                  <label for="vin_id">vin_id : </label> <input type="text" name="vin_id" value="" required>
                </div>
                <p/>
                <button class="btn btn-primary" type="submit">Submit form</button>
              </form>
          </div>
      </section>
      
      <section class="panel panel-info limited">
          <div class="panel-heading">
              <h2> La liste des vins pour vous aider à faire le choix </h2>
          </div>
          <div class="panel-body">
            <table class = "table table-striped table-bordered">
                <?php
                try{
                      $nbcol = $results->columnCount();
                      echo "<table class = 'table table-bordered' > ";
                      echo '<thead>';
                      echo ("<tr>");
                      for ($i = 0;$i< $nbcol;$i++){
                          $col = $results->getColumnMeta($i);
                          printf("<th class = 'danger'> %s </th>", $col['name']);
                      }
                      echo '</tr>';
                      echo '</thead>';
                      echo '<tbody>';
                      while ($ligne = $results->fetch(PDO::FETCH_ASSOC)){
                          echo ("<tr class = 'success'>");
                          foreach ($ligne as $key => $value){
                              printf(" <td> %s </td>",$value);
                          }
                          echo ("</tr>");
                      }
                      echo '</tbody>';
                  } catch (PDOException $ex){
                      printf("erreur : %s", $ex->getMessage());
                  }
                ?>
            </table>
          </div>
      </section>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewId -->
