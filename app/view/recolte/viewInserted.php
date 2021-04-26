
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
     echo ("<h3>La nouvelle recolte a été insérée </h3>");
     echo("<ul>");
     echo ("<li>producteur_id = " . $_GET['producteur_id'] . "</li>");
     echo ("<li>vin_id = " . $_GET['vin_id'] . "</li>");
     echo ("<li>quantite = " . $_GET['quantite'] . "</li>");
     echo ("<li>prix = " . $_GET['prix'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion de la recolte. Il se peut cette récolte existe déjà ou que les identifiants fournis pour le vin ou le producteur soient faux</h3>");
     echo ("producteur_id = " . $_GET['producteur_id']);
     echo ("<li>vin_id = " . $_GET['vin_id'] . "</li>");
     echo ("<li>quantite = " . $_GET['quantite'] . "</li>");
     echo ("<li>prix = " . $_GET['prix'] . "</li>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    