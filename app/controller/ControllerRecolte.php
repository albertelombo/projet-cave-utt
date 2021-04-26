
<!-- ----- debut ControllerRecolte -->
<?php
require_once '../model/ModelRecolte.php';

class ControllerRecolte {
 // --- page d'acceuil
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCaveAccueil.html';
  if (DEBUG)
   echo ("ControllerRecolte : caveAccueil : vue = $vue");
  require ($vue);
 }

 // --- Liste des recoltes
 public static function recolteReadAll() {
  $results = ModelRecolte::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewAll.php';
  if (DEBUG){
    echo ("ControllerRecolte : recolteReadAll : vue = $vue");
  }
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un recolte_id qui existe
 public static function recolteReadId($args) {
  $query= "SELECT producteur_id, vin_id, quantite, prix, cru, nom, prenom, degre, region FROM recolte, vin, producteur WHERE producteur_id = producteur.id AND vin_id = vin.id ";
  $results = ModelRecolte::getMany($query);
  ///----- On récupère la méthode qui dera utilisée pour la visualisation suivante dans target
  $target = $args['target'];
  
  /// ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewId.php';
  require ($vue);
 }
 
 /// recupère les filtres à appliquer sur les récoltes
 public static function recolteReadFilters($args){
     $query = "SELECT DISTINCT region from producteur";
     $results = ModelProducteur::getMany($query);
     $target = $args['target'];
     
    /// ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewFilter.php';
  require ($vue);
 }

 // Affiche une recolte en  particulier (recolte_id)
 public static function recolteReadOne() {
  $recolte_producteur_id = $_GET['producteur_id'];
  $recolte_vin_id = $_GET['vin_id'];
  $results = ModelRecolte::getOne($recolte_producteur_id,$recolte_vin_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewAll.php';
  require ($vue);
 }
 public static function recolteSendToBasket(){
  $recolte_producteur_id = $_GET['producteur_id'];
  $recolte_vin_id = $_GET['vin_id'];
  $query = "SELECT DISTINCT cru,prix,producteur_id,vin_id FROM recolte, vin, producteur WHERE producteur_id =".$recolte_producteur_id." AND vin_id = ".$recolte_vin_id." AND vin.id = vin_id AND producteur.id = producteur_id";
  try{
      $database = Model::getInstance();
      $statement= $database->query($query);
      $results = $statement->fetchAll(PDO::FETCH_ASSOC);
  }catch(PDOException $e){
      printf("Erreur: %s",$e->getMessage());
      $results = NULL;
  }
  
  /// ----- Construction du modèle de la vue
  include 'config.php';
  $vue= $root . '/app/view/recolte/viewBasket.php';
  require($vue);
 }
 
 /// validation des achats et mise à jour ses stocks
 public static function recoltePurchases(){
     // On retire une unité à la quantité des vins vendus
     foreach ($_SESSION["achats"] as $key => $values){
         try{
             $database = Model::getInstance();
             $recolte_producteur_id = $values[2];
             $recolte_vin_id = $values[3];
             $query = "SELECT quantite FROM recolte WHERE producteur_id = ".$recolte_producteur_id." AND vin_id = ".$recolte_vin_id ;
             $statement = $database->query($query);
             $results  = $statement->fetchAll(PDO::FETCH_NUM);
             $quantite = $results[0][0];
             $quantite = $quantite - 1;
             
             // mise à jour de la table
             
             $query = "UPDATE recolte SET quantite = ".$quantite." WHERE producteur_id = ".$recolte_producteur_id." AND vin_id = ".$recolte_vin_id ;
             $database->exec($query);
         } catch (PDOException $e){
             printf("Error: ",$e->getMessage());
         }
     }
         /// ---- Construction du chemin de la vue
         
         include 'config.php';
         $vue= $root . '/app/view/recolte/viewPurchases.php';
         require ($vue);
     
 }
 
 /// Récupération des résultats d'une raquête
  public static function recolteReadMany($query){
     $results = ModelProducteur::getMany($query);
     
     /// ----- Construction chemin de la vue
     include 'config.php';
     $vue = $root.'/app/view/recolte/viewMany.php';
     require($vue);
 }
 
 /// Afficher les vins qui répondent aux critères
 public static function recolteReadFiltered(){
     $region = $_GET['region'];
     $min = $_GET['min'];
     $max = $_GET['max'];
     $query= "SELECT producteur_id, vin_id, quantite, prix, cru, nom, prenom, degre FROM recolte, vin, producteur WHERE producteur_id = producteur.id AND vin_id = vin.id AND region = '".$region."' AND (degre BETWEEN  ".$min." AND ".$max.")";
     echo $query;
     ControllerRecolte::recolteReadMany($query);
 }

 // Affiche le formulaire de creation d'un recolte
 public static function recolteCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewInsert.php';
  require ($vue);
 }

 /// une page de confirmation de l'insertion d'une nouvelle récolte
 /// La clé est gérée par le systeme et pas par l'internaute
 public static function recolteCreated() {
  /// ajouter une valrecolte_idation des informations du formulaire
  $results = ModelRecolte::insert(
      htmlspecialchars($_GET['producteur_id']), htmlspecialchars($_GET['vin_id']), htmlspecialchars($_GET['quantite']), htmlspecialchars($_GET['prix'])
  );
  /// ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewInserted.php';
  require ($vue);
 }
 
 ///Supression d'un vin
 public static function recolteDeleted() {
    $recolte_producteur_id = $_GET['producteur_id'];
    $recolte_vin_id = $_GET['vin_id'];
    $results = ModelRecolte::delete($recolte_producteur_id,$recolte_vin_id);

    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/recolte/viewAll.php';
    require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerRecolte -->


