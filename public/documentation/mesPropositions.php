<!-- Début améliorations -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      ?>
      <section>
          <article class="panel panel-primary">
              <div class="panel-heading">
                  <h2 class="panel-title"> Proposition 1</h2>
              </div>
              <div class="panel-body">
                  <p> Une idée simplificatrice serait de factoriser lorque posible les différentes vues. On pourrait faire de l'affichage 
                  dynamique avec récupération automatique des attributs et aussi factoriser les entrées en utilisant des formulaires dynamique et
                  en ajoutant des conditions sur le modèle concerné. ainsi au lieu d'avoir quatre ou cinq fichiers qui se répètent pour chaque modèle
                  on pourrait en avoir un avec des conditions et faisant appel à des formulaires dynamiques.</p>
              </div>
          </article>
          <article class="panel panel-primary">
              <div class="panel-heading">
                  <h2 class="panel-title">Proposition 2</h2>
              </div>
              <div class="panel-body">
                  <p> Nous avons rencontré un léger bug avec la constante DEBUG. En effet celle-ci pouvait être redéfinie plusieurs fois avec
                  les multiples appels du script config, ce qui ne doit être possible d'où nous avons ajouté un test d'existance avant sa
                  définition.</p>
              </div>
          </article>
      </section>
    </div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
<!-- fin améliorations-->