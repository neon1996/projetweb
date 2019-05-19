<?php

class ClientDB extends Client {

    private $_db;
    private $_array = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function addClient($data) {

        $query = "select ajouter_client(:nom,:prenom,:telephone,"
                . ":email1,:mdp,"
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

    public function getClient($admin, $password) {
        print $admin;
        $query = "select * from client where email =:email and mdp =:mdp";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':email', $admin, PDO::PARAM_STR);
            $resultset->bindValue(':mdp', $password, PDO::PARAM_STR);
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
    
     public function updateClient($champ,$nouveau,$id){        
        
        try {
          
            $query="UPDATE client set ".$champ." = '".$nouveau."' where id_client ='".$id."'";            
           // var_dump($id);
            $resultset = $this->_db->prepare($query);
            $resultset->execute();            
            
        }catch(PDOException $e){
            print $e->getMessage();
        }
    }

}
