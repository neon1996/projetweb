<?php

class Commande_IngredientDB extends Client {

    private $_db;
    private $_array = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getCommande_Ingredient($login, $password) {
        try {
            $query = "select * from commande_ingredient";
            // print $query;
            $resultset = $this->_db->prepare($query);
          //  $resultset->bindValue(':login', $login);
          //  $resultset->bindValue(':password', $password);
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
