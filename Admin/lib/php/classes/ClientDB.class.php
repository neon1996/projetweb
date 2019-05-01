<?php

class ClientDB extends Client {

    
    private $_db;
    private $_array = array();

    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function addClient($data){
        
       
        try{
            $query="insert into client "
                    . "(nom, prenom, telephone, email, mdp, rue, numero, ville, cp)"
                    . "values (:nom,:prenom,:telephone,:email,:mdp,:rue,:numero,:ville,:cp)";
            
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom',$data['nom']);
            $resultset->bindValue(':prenom',$data['prenom']);
            $resultset->bindValue(':telephone',$data['telephone']);
            $resultset->bindValue(':email',$data['email']);
            $resultset->bindValue(':mdp',$data['mdp']);
            $resultset->bindValue(':rue',$data['rue']);
            $resultset->bindValue(':numero',$data['numero']);
            $resultset->bindValue(':ville',$data['ville']);
            $resultset->bindValue(':cp',$data['cp']);
            $resultset->execute();
            
            
        } catch (PDOException $e) {
            print "Echec de l'insertion dans la table client".$e->getMessage();
        }
        
     
    }

    public function getClient() {
        try {
            $query = "select * from client";
            
            $resultset = $this->_db->prepare($query);
            //$resultset->bindValue(':login',$login);
            //$resultset->bindValue(':password',$password);
            $resultset->execute();
            
            while ($data = $resultset->fetch()) {
                $_array[] = new Client($data);
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

}

