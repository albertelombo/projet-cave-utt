
<!-- ----- debut Router2 -->
<?php
session_start();
require ('../controller/ControllerVin.php');
require ('../controller/ControllerProducteur.php');
require ('../controller/ControllerRecolte.php');
require ('../controller/ControllerOffre.php');
//require ('../controller/config.php');
/// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

/// fonction parse_str permet de construire 
/// une table de hachage (clé + valeur)
parse_str($query_string, $param);

/// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

///-- On supprime l'élément action de la structure pour ne laisser les paramètres passés à la fonction du contrôleur
unset($param["action"]);

///-- ici les arguments transmis

$args = $param;

/// --- Liste des méthodes autorisées
switch ($action) {
/// Les méthodes pour le controller vin
 case "vinReadAll" :
 case "vinReadOne" :
 case "vinReadId" :
 case "vinCreate" :
 case "vinCreated" :
 case "vinDeleted" :
  ControllerVin::$action($args);
  break;
/// Les méthodes pour le controller producteur
 case "producteurReadAll" :
 case "producteurReadOne" :
 case "producteurReadId" :
 case "producteurCreate" :
 case "producteurCreated" :
 case "producteurReadRegion":
 case "producteurDeleted" :
    ControllerProducteur::$action($args);
  break;
/// Pour la documentation
 case "documentation1" :
     include '../controller/config.php';
     include("../../public/documentation/mesPropositions.php");
     break;
case "documentation2" :
   include '../controller/config.php';
   include("../../public/documentation/monProjet.php");
   break;
 /// Les méthodes pour le controller recolte
/// Les méthodes pour le controller recolte
 case "recolteReadAll" :
 case "recolteReadOne" :
 case "recolteReadId" :
 case "recolteCreate" :
 case "recolteCreated" :
 case "recolteDeleted" :
 case "recolteReadFiltered":
 case "recolteReadFilters":
 case "recolteSendToBasket":
 case "recoltePurchases":
  ControllerRecolte::$action($args);
  break;
/// Les méthodes pour le controller offre
 case "offreReadAll" :
 case "offreReadOne" :
 case "offreReadId" :
 case "offreCreate" :
 case "offreCreated" :
 case "offreSubmit" :
 case "offreSubmitted":
 case "offreDeleted" :
  ControllerOffre::$action($args);
  break;

 /// Tache par défaut
 default:
  $action = "caveAccueil";
  ControllerVin::$action();
}
?>
<!-- ----- Fin Router2 -->

