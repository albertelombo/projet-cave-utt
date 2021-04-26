
<!-- ----- debut ModelRecolte -->
<?php
require_once 'Model.php';

class ModelRecolte {

 private $producteur_id, $vin_id, $quantite, $prix;

 // pas possible d'avoir 2 constructeurs
 public function __construct($producteur_id = NULL, $vin_id = NULL, $quantite = NULL, $prix = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($producteur_id)) {
   $this->producteur_id = $producteur_id;
   $this->vin_id = $vin_id;
   $this->quantite = $quantite;
   $this->prix = $prix;
  }
 }

 function setProducteur_id($producteur_id) {
  $this->producteur_id = $producteur_id;
 }

 function setVin_id($vin_id) {
  $this->vin_id = $vin_id;
 }

 function setQuantite($quantite) {
  $this->quantite = $quantite;
 }

 function setPrix($prix) {
  $this->prix = $prix;
 }

 function getProducteur_id() {
  return $this->producteur_id;
 }

 function getVin_id() {
  return $this->vin_id;
 }

 function getQuantite() {
  return $this->quantite;
 }

 function getPrix() {
  return $this->prix;
 }

 public function __toString() {
  return "".$this->producteur_id.$this->vin_id;
 }

 // Persistance .......


 public static function view() {
  printf("<tr><td>%d</td><td>%s</td><td>%d</td><td>%.00f</td></tr>", $this->getProducteur_id(), $this->getVin_id(), $this->getQuantite(), $this->getPrix());
 }

// retourne une liste des producteur_id
 public static function getAllRecolte_id() {
  try {
   $database = Model::getInstance();
   $query = "select distinct producteur_id,vin_id from recolte";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS,"ModelRecolte");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getMany($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->query($query);
   $results = $statement;
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from recolte";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getOne($producteur_id,$vin_id) {
  try {
   $database = Model::getInstance();
   $query = "select * from recolte where producteur_id = :producteur_id and vin_id = :vin_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'producteur_id' => $producteur_id,
     'vin_id' => $vin_id
       
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($producteur_id, $vin_id, $quantite, $prix) {
  try {
   $database = Model::getInstance();

   // ajout d'un nouveau tuple;
   $query = "insert into recolte value (:producteur_id, :vin_id, :quantite, :prix)";
   $statement = $database->prepare($query);
   $statement->execute([
     'producteur_id' => $producteur_id,
     'vin_id' => $vin_id,
     'quantite' => $quantite,
     'prix' => $prix
   ]);
   return $producteur_id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function update() {
  echo ("ModelRecolte : update() TODO ....");
  return null;
 }

 public static function delete($producteur_id,$vin_id) {
  $query = "DELETE FROM recolte WHERE producteur_id = ".$producteur_id." AND vin_id = ".$vin_id;
  $query2 = "SELECT * FROM recolte WHERE producteur_id = ".$producteur_id." AND vin_id = ".$vin_id;
  try{
      $database = Model::getInstance();
      $recolte = $database->query($query2);
      $recolte = $recolte->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
      $statement = $database->exec($query);
      $results = $recolte;
      return $results;
  
  } catch (PDOException $e){
      $message = "Echec de la supression. Erreur : ".$e->getMessage();
      $results = $message;
      return $results;
  }
 }

}
?>
<!-- ----- fin ModelRecolte -->


