
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
        <form role="form" method='get' action='router2.php'>
          <div class="form-group">
            <input type="hidden" name='action' value='vinCreated'>        
            <label for="id">cru : </label><input type="text" name='cru' size='75' value=''>                           
            <label for="id">annee : </label><input type="text" name='annee' value=''>
            <label for="id">degre : </label><input type="text" name='degre' value=''>                
          </div>
          <p/>
          <button class="btn btn-primary" type="submit">Go</button>
        </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



