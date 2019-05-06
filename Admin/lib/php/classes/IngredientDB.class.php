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
