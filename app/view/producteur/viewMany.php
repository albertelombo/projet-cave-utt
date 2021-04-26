<!-- début viewMany -->
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
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
<!-- fin viewMany -->