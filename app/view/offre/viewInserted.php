
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
     echo ("<h3>La nouvelle offre a été ajoutée </h3>");
     echo("<ul>");
     echo ("<li>id = " . $_GET['producteur_ide']. "</li>");
     echo ("<li>intitule = " . $_GET['intitule'] . "</li>");
     echo ("<li>salaire = " . $_GET['salaire'] . "</li>");
     echo ("<li>date = " . $_GET['date'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du Vin</h3>");
     echo("<ul>");
     echo ("<li>id = " . $_GET['producteur_ide']. "</li>");
     echo ("<li>intitule = " . $_GET['intitule'] . "</li>");
     echo ("<li>salaire = " . $_GET['salaire'] . "</li>");
     echo ("<li>date = " . $_GET['date'] . "</li>");
     echo("</ul>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    
    
    