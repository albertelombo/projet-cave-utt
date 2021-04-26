
<!-- ----- début viewSubmitted -->
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
    if(!empty($test)){
        echo ("<h3>La nouvelle candidature a été ajoutée </h3>");
        echo("<ul>");
        echo ("<li>id = " . $_GET['id']. "</li>");
        echo ("<li>nom = " . $_GET['nom'] . "</li>");
        echo ("<li>mail = " . $_GET['mail'] . "</li>");
        echo ("<li>adresse = " . $_GET['adresse'] . "</li>");
        echo("</ul>");
        echo("Ces informations seront transmises à l'employeur. Il vous recontactera pour plus de détails. Merci.");
    }else{
        echo ("Vous avez probablement rentré un identidiant invalide. Merci de reprendre s'il vous plait");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewSubmitted -->    

    
    
    
    