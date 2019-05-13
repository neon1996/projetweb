<?php

class IngredientDB extends Ingredient {

    private $_db;
    private $_array = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getIngredient($login, $password) {
        try {
            $query = "select * from ingredient";
            // print $query;
            $resultset = $this->_db->prepare($query);
         
            $resultset->execute();

            while ($data = $resultset->fetch()) {
                $_array[] = new Ingredient($data);
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
    }
    
    public function addIngredient($data) {

        $query = "select add_ingredient(:id_type,:nom_ingredient,:prix_ingredient,:description_ingredient) "
                . "as retour";


// addingredient = fonction que l'on va créer dans pgadmin
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_type', $data['id_type'], PDO::PARAM_STR);
            $resultset->bindValue(':nom_ingredient', $data['nom_ingredient'], PDO::PARAM_STR);
            $resultset->bindValue(':prix_ingredient', $data['prix_ingredient'], PDO::PARAM_STR);
            $resultset->bindValue(':description_ingredient', $data['description_ingredient'], PDO::PARAM_STR);
            
            $resultset->execute();
            $retour = $resultset->fetchColumn(0); // permet le retour de la fonction embarquée (pgadmin)
            return $retour;
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }

    public function updateIngredient($champ,$nouveau,$id){        
        
        try {
          
            $query="UPDATE ingredient set ".$champ." = '".$nouveau."' where id_ingredient ='".$id."'";            
           // var_dump($id);
            $resultset = $this->_db->prepare($query);
            $resultset->execute();            
            
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

}
