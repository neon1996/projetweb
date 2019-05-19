<?php

class CommandeDB extends Client {

    private $_db;
    private $_array = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getCommande($id_client,$date_com,$statut) {
        try {
            $query = "select * from commande where id_client =:id_client and date_com=:date_com and statut=:statut ";
//print "id ".$date_com;            // print $query;
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_client', $id_client, PDO::PARAM_STR);
            $resultset->bindValue(':date_com', $date_com, PDO::PARAM_STR);
            $resultset->bindValue(':statut', $statut, PDO::PARAM_STR);
            $resultset->execute();

            while ($data = $resultset->fetch()) {
                $_array[] = new Commande($data);
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

    public function addCommande($id_client) {
        $query = "insert into commande (id_client,date_com,statut) values (:id_client,:date_com,:statut)";
// ajouter_client = fonction que l'on va créer dans pgadmin
        try {
            $resultset = $this->_db->prepare($query);

            $resultset->bindValue(':id_client', $id_client, PDO::PARAM_STR);
            $resultset->bindValue(':date_com', '14-05-2019', PDO::PARAM_STR);
            $resultset->bindValue(':statut', 0, PDO::PARAM_STR);

            $resultset->execute();
            
        } catch (PDOException $e) {
            ?><div class="alert alert-danger" role="alert">Echec de la commande !</div><?php
            //print "<br/>Echec de la commande";
            print $e->getMessage();
        }
    }

}
