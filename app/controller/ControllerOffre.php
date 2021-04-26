
<!-- ----- debut ControllerOffre -->
<?php
require_once '../model/ModelOffre.php';

class ControllerOffre {
 // --- page d'acceuil
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCaveAccueil.html';
  if (DEBUG)
   echo ("ControllerOffre : caveAccueil : vue = $vue");
  require ($vue);
 }

 // --- Liste des offres
 public static function offreReadAll() {
  $results = ModelOffre::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/offre/viewAll.php';
  if (DEBUG){
    echo ("ControllerOffre : offreReadAll : vue = $vue");
  }
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function offreReadId($args) {
  $results = ModelOffre::getAllId();
  ///----- On récupère la méthode qui dera utilisée pour la visualisation suivante dans target
  $target = $args['target'];
  
  /// ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/offre/viewId.php';
  require ($vue);
 }

 // Affiche une offre particulier (id)
 public static function offreReadOne() {
  $offre_id = $_GET['id'];
  $results = ModelOffre::getOne($offre_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/offre/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'une offre
 public static function offreCreate() {
     $results = ModelOffre::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/offre/viewInsert.php';
  require ($vue);
 }

 /// une page de confirmation de l'insertion d'une nouvelle offre
 /// La clé est gérée par le systeme et pas par l'internaute
 public static function offreCreated() {
  /// ajouter une validation des informations du formulaire
  $results = ModelOffre::insert(
      htmlspecialchars($_GET["producteur_ide"]),htmlspecialchars($_GET['intitule']), htmlspecialchars($_GET['salaire']), htmlspecialchars($_GET['date'])
  );
  /// ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/offre/viewInserted.php';
  require ($vue);
 }
 public static function offreSubmit() {
     $results = ModelOffre::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/offre/viewSubmit.php';
  require ($vue);
 }
 public static function offreSubmitted() {
    try{
        $database = Model::getInstance();
        $offre_id = $_GET["id"];
        $query = "SELECT * FROM offre WHERE id = ".$offre_id;
        $statement = $database->query($query);
        $test = $statement->fetchAll(PDO::FETCH_CLASS,"ModelOffre");
    }catch(PDOException $e){
        printf("Erreur %s",$e->getMessage());
    }
     // Chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/offre/viewSubmitted.php';
  require ($vue);
 }

 public static function offreDeleted() {
    $offre_id = $_GET['id'];
    $results = ModelOffre::delete($offre_id);

    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/offre/viewAll.php';
    require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerOffre -->



