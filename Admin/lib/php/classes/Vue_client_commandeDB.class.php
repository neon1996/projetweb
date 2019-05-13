<?php

class Vue_client_commandeDB {
   
    private $_db;
    private $_array = array();

    public function __construct($db) {
        $this->_db = $db;
    }

        public function getAllClient(){
            
            
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
    
        public function getClientByName($nom){
       
        try{
            $this->_db->beginTransaction();
            $query = "select * from vue_client_commande where nom=:nom";
            $resultset = $this->_db->prepare($query);  
            $resultset->bindValue(':nom',$nom);
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

