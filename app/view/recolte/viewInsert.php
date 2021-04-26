

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
              <h2> Rentrer les caractérstiques de la recolte</h2>
          </div>
          <div class="panel-body">
              
            <form role="form" method='get' action='router2.php'>
              
                <input type="hidden" name='action' value='recolteCreated'> 
                <div class="form-group">
                <label for="id">producteur_id : </label><input type="text" name='producteur_id' size='75' value='' required="">   
                </div>
                <div class="form-group">
                <label for="id">vin_id : </label><input type="text" name='vin_id' value='' required="">
                </div>
                <div class="form-group">
                <label for="id">quantite : </label><input type="text" name='quantite' value=''>
                </div>
                <div class="form-group">
                <label for="id">prix : </label><input type="text" name='prix' value=''>
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



