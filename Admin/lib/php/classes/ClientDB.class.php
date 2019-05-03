<?php

class ClientDB extends Client {

    
    private $_db;
    private $_array = array();

    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function addClient($data) {

        $query = "select ajouter_client(:nom,:prenom,:telephone,"
                . ":email1,:email2,:mdp,"
                . ":rue,:ville,:numero,:cp) "
                . "as retour";
        
        
// ajouter_client = fonction que l'on va créer dans pgadmin
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom', $data['nom'], PDO::PARAM_STR);
            $resultset->bindValue(':prenom', $data['prenom'], PDO::PARAM_STR);
            $resultset->bindValue(':telephone', $data['telephone'], PDO::PARAM_STR);
            $resultset->bindValue(':email1', $data['email1'], PDO::PARAM_STR);
            //$resultset->bindValue(':email2', $data['email2'], PDO::PARAM_STR);
            $resultset->bindValue(':mdp', $data['mdp'], PDO::PARAM_STR);
            $resultset->bindValue(':rue', $data['rue'], PDO::PARAM_STR);
            $resultset->bindValue(':ville', $data['ville'], PDO::PARAM_STR);
            $resultset->bindValue(':numero', $data['numero'], PDO::PARAM_STR);
           $resultset->bindValue(':cp', $data['cp'], PDO::PARAM_STR);
            $resultset->execute();
            $retour = $resultset->fetchColumn(0); // permet le retour de la fonction embarquée (pgadmin)

            
            
            return $retour;
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }
    /* public function addClient($data){
        
       
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
      
    }*/

    public function getClient($email,$mdp) {
        
        $query = "select * from client where email=:email1 and mdp=:mdp";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':email1', $email, PDO::PARAM_STR);
            $resultset->bindValue(':mdp', $mdp, PDO::PARAM_STR);

            $resultset->execute();
           // print "email = ".$email;
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                // nous n'employerons pas d'objet, afin de faciliter la conversion en Json dans le 
                //fichier ajax ajaxRechercheClient.php
                $_array[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        //var_dump($_array);
        return $_array;
    }
    

}

