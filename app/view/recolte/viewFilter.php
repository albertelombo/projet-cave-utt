
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
      $results = $results->fetchAll(PDO::FETCH_CLASS,"ModelProducteur");
      ?>

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='<?php echo($target)?>'>
        <label for="region">Région : </label> <select class="form-control" id='region' name='region' style="width: 100px">
            <?php
            foreach ($results as $keys => $elements) {
             echo ("<option>".$elements->getRegion()."</option>");
            }
            ?>
        </select>
      </div>
        <div class="form-group">
            <label for="min">Degré minimum</label><input type="text" class="form-control" name="min" id="min" value="12">
            <label for="max">Degré maximum</label><input type="text" class="form-control" name="max" id="max" value="12">
        </div>
      <p/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewId -->

