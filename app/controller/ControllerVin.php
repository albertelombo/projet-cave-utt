
<!-- ----- debut ControllerVin -->
<?php
require_once '../model/ModelVin.php';

class ControllerVin {
 // --- page d'acceuil
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCaveAccueil.html';
  if (DEBUG)
   echo ("ControllerVin : caveAccueil : vue = $vue");
  require ($vue);
 }

 // --- Liste des vins
 public static function vinReadAll() {
  $results = ModelVin::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vin/viewAll.php';
  if (DEBUG){
    echo ("ControllerVin : vinReadAll : vue = $vue");
  }
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function vinReadId($args) {
  $results = ModelVin::getAllId();
  ///----- On récupère la méthode qui dera utilisée pour la visualisation suivante dans target
  $target = $args['target'];
  
  /// ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vin/viewId.php';
  require ($vue);
 }

 // Affiche un vin particulier (id)
 public static function vinReadOne() {
  $vin_id = $_GET['id'];
  $results = ModelVin::getOne($vin_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vin/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un vin
 public static function vinCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vin/viewInsert.php';
  require ($vue);
 }

 /// une page de confirmation de l'insertion d'un nouveu vin
 /// La clé est gérée par le systeme et pas par l'internaute
 public static function vinCreated() {
  /// ajouter une validation des informations du formulaire
  $results = ModelVin::insert(
      htmlspecialchars($_GET['cru']), htmlspecialchars($_GET['annee']), htmlspecialchars($_GET['degre'])
  );
  /// ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vin/viewInserted.php';
  require ($vue);
 }
 
 /// Suppression d'un vin
 public static function vinDeleted() {
    $vin_id = $_GET['id'];
    $results = ModelVin::delete($vin_id);

    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/vin/viewAll.php';
    require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerVin -->


