<?php

class Vue_client_commandeDB {
   
    private $_db;
    private $_array = array();

    public function __construct($db) {
        $this->_db = $db;
    }

        public function getAllProduits(){
            
            
        try{
            $this->_db->beginTransaction();
            $query = "select * from vue_client_commande";
            $resultset = $this->_db->prepare($query);            
            $resultset->execute();
            $this->_db->commit();         
            while($data = $resultset->fetch()){
                $_array[] = $data;
            }               
        }
        catch(PDOException $e){
            print $e->getMessage(); 
        }
        if(!empty($_array)){
            return $_array;
        }
        else {
            return null;
        }
    }
    
        public function getProduitsByType($id_client){
       
        try{
            $this->_db->beginTransaction();
            $query = "select * from vue_client_commande where id_client=:id_client";
            $resultset = $this->_db->prepare($query);  
            $resultset->bindValue(':id_client',$id_client);
            $resultset->execute();
            $this->_db->commit();         
            while($data = $resultset->fetch()){
                $_array[] = $data;
            }               
        }
        catch(PDOException $e){
            print $e->getMessage(); 
        }
        if(!empty($_array)){
            return $_array;
        }
        else {
            return null;
        }
    }

}

