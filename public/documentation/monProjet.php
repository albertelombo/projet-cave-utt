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
                  <h2 class="panel-title">Introduction</h2>
              </div>
              <div class="panel-body">
                  <p> 
                      Dans le cadre de l'unité d'enseignement Lo07, je suis amené à réaliser un site web dont le thème principal estcelui du vin.
                      Cette page présentera l'idée derrière la partie projet. Disposant d'une base de données contenant des vins, leurs producteurs
                      et leurs régions, il m'est venu à l'idée de la mettre à profit en permettant aux visiteurs d'acheter des vins et de mettre en
                      place des circuits courts pour l'économie. Plus précisément de permettre aux producteurs de publiez des offres d'emploi auxquelles
                      les visiteurs du site pourront postuler. Pour le projet a été réalisée une version de simulation incomplète qui pourra éventuellement
                      être complétée à des fins académiques (ou pas) par d'autres étudiants ou moi même. La suite présentera les différentes fonctionnaltés. 
                    
                  </p>
              </div>
          </article>
          <article class="panel panel-primary">
              <div class="panel-heading">
                  <h2 class="panel-title"> Partie 1: 1'achat de vins</h2>
              </div>
              <div class="panel-body">
                  <p>
                      Il y a 3 fonctionnalités dans cette partie.<br>
                      Une première permet aux producteurs après leurs récoltes de rajouter les vins dans la cave. Ils entrent ainsi leurs identifiants
                      (ils doivent au préalable être présents dans la liste des producteurs) et peuvent ainsi mettre quelle quantité ils ont en stock.
                      <br>
                      La deuxième fonctionnalité permet aux visiteurs de se faire une petite idée des vins que nous avons selon 2 critères qu'ils auront
                      eux même définis. Il s'agit de la région de production du vin et du degré de celui-ci. Ils pouront pacourir cet onglet sans
                      forcément avoir en projet d'acheter du vin immédiatement.
                      <br>
                      La troisième fonctionnalité consiste en l'achat du vin. Le client possède un panier qui se remplit au fur et à mesure qu'il choisit un
                      vin grâce aux coordonnées de ce dernier et une fois que c'est fait il peut passer à l'achat et son panier se vide.
                      
                  </p>
              </div>
          </article>
          <article class="panel panel-primary">
              <div class="panel-heading">
                  <h2 class="panel-title">Partie 2: proposition de services</h2>
              </div>
              <div class="panel-body">
                  <p>
                      Cette partie contient 2 fonctionnalités.<br>
                      La première permet aux producteurs d'ajouter des offres en rentrant leurs identifiants et les détails de l'offre.
                      <br>
                      La seconde permet aux visiteurs d'accéder aux offres et de candidater.
                  </p>
              </div>
          </article>
                    <article class="panel panel-primary">
              <div class="panel-heading">
                  <h2 class="panel-title">Partie 3: Suite et améliorations</h2>
              </div>
              <div class="panel-body">
                  <p> 
                      Pour des raisons d'objectifs pédagoggiques et de délais, toutes les fonctionnalités et services que peut proposer le site n'ont pas été 
                      déployés. Ainsi, nous prévoyons pour la suite l'implémentation de comptes clients et producteurs pour pouvoir gérer les accès à la base
                      de données. Suite à cela l'idéal serait d'avoir une plateforme interne permettant de mettre en relation tous les partis et de proposer
                      des services plus particuliers avec l'étude des utilisateurs. Aussi à la longue il serait possible de rajouter des informations
                      sur nos vins comme le type de raisin utilisé pour améliorer l'expérience utilisateur et ainsi devenir incontournables sur le marché :).
                  </p>
              </div>
          </article>
      </section>
    </div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
<!-- fin améliorations-->