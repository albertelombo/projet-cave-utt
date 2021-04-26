
<!-- ----- debut ModelOffre -->
<?php
require_once 'Model.php';

class ModelOffre {

 private $id, $intitule, $salaire, $date_publi, $producteur_ide;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $producteur_ide = NULL, $intitule = NULL, $salaire = NULL, $date_publi = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->intitule = $intitule;
   $this->salaire = $salaire;
   $this->date_publi = $date_publi;
   $this->producteur_ide = $producteur_ide;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setIntitule($intitule) {
  $this->intitule = $intitule;
 }
 
 function setProducteur_ide($producteur_ide) {
     $this->producteur_ide = $producteur_ide;
 }

 function setSalaire($salaire) {
  $this->salaire = $salaire;
 }

 function setDate_publi($date_publi) {
  $this->date_publi = $date_publi;
 }

 function getId() {
  return $this->id;
 }
 
 function getProducteur_ide() {
     return $this->producteur_ide;
 }

 function getIntitule() {
  return $this->intitule;
 }

 function getSalaire() {
  return $this->salaire;
 }

 function getDate_publi() {
  return $this->date_publi;
 }

 public function __toString() {
  return $this->id;
 }

 // Persistance .......


 public static function view() {
  printf("<tr><td>%d</td><td>%d</td><td>%s</td><td>%d</td><td>%s</td></tr>", $this->getId(),$this->producteur_ide(), $this->getIntitule(), $this->getSalaire(), $this->getDate_publi());
 }

// retourne une liste des id
 public static function getAllId() {
  try {
   $database = Model::getInstance();
   $query = "select id from offre";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getMany($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelOffre");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from offre";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelOffre");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from offre where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelOffre");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($producteur_ide,$intitule, $salaire, $date_publi) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from offre";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into offre value (:id, :producteur_ide, :intitule, :salaire, :date_publi)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'producteur_ide' => $producteur_ide,
     'intitule' => $intitule,
     'salaire' => $salaire,
     'date_publi' => $date_publi
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function update() {
  echo ("ModelOffre : update() TODO ....");
  return null;
 }

 public static function delete($id) {
  $query = "DELETE FROM offre WHERE id = ".$id;
  $query2 = "SELECT * FROM offre WHERE id = ".$id;
  try{
      $database = Model::getInstance();
      $offre = $database->query($query2);
      $offre = $offre->fetchAll(PDO::FETCH_CLASS, "ModelOffre");
      $statement = $database->exec($query);
      $results = $offre;
      return $results;
  
  } catch (PDOException $e){
      $message = "Echec de la supression . Erreur : ".$e->getMessage();
      $results = $message;
      return $results;
  }
 }

}
?>
<!-- ----- fin ModelOffre -->


