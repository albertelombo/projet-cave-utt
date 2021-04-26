<!--- debut controller offre --->
<?php
require_once '../model/ModelProducteur.php';

class ControllerProducteur {
 /// --- page d'acceuil : c'est la fonction appelée par défaut
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCaveAccueil.html';
  if (DEBUG)
   echo ("ControllerProducteur : caveAccueil : vue = $vue");
  require ($vue);
 }
 
  /// --- Liste des producteurs
 public static function producteurReadAll() {
  $results = ModelProducteur::getAll();
  /// ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewAll.php';
  if (DEBUG){
   echo ("ControllerProducteur : producteurReadAll : vue = $vue");
  }
  require ($vue);
 }
 
  /// Affiche un formulaire pour sélectionner un id qui existe
 public static function producteurReadId($args) {
  $results = ModelProducteur::getAllId();
  ///----- On récupère la méthode qui dera utilisée pour la visualisation suivante dans target
  $target = $args['target'];
  /// ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewId.php';
  require ($vue);
 }
 
  /// Affiche un producteur particulier (id)
 public static function producteurReadOne() {
  $producteur_id = $_GET['id'];
  $results = ModelProducteur::getOne($producteur_id);

  /// ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewAll.php';
  require ($vue);
 }
 
 /// recupère plusieurs producteurs à partir d'une requête
 public static function producteurReadMany($query){
     $results = ModelProducteur::getMany($query);
     
     /// ----- Construction chemin de la vue
     include 'config.php';
     $vue = $root.'/app/view/producteur/viewMany.php';
     require($vue);
 }
 
 /// régions desproducteurs
 public static function producteurReadRegion(){
     $query = "SELECT DISTINCT region FROM producteur";
     ControllerProducteur::producteurReadMany($query);
 }


 /// Affiche le formulaire d'ajout d'un producteur
 public static function producteurCreate() {
  /// ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewInsert.php';
  require ($vue);
 }
 
 /// une page de confirmation de l'insertion d'un nouveu producteur
/// La clé est gérée par le systeme et pas par l'internaute
 public static function producteurCreated() {
  /// ajouter une validation des informations du formulaire
  $results = ModelProducteur::insert(
      htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['region'])
  );
  /// ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewInserted.php';
  require ($vue);
 }
 /// affiche le producteursupprimé
  public static function producteurDeleted() {
    $producteur_id = $_GET['id'];
    $results = ModelProducteur::delete($producteur_id);

    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/producteur/viewAll.php';
    require ($vue);
 }
 
}

?>
<!--- fin controller offre --->