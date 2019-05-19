<?php

class Commande_IngredientDB extends Client {

    private $_db;
    private $_array = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getCommande_Ingredient($id_com, $id_ingredient, $id_client) {
        try {
            $query = "select * from commande_ingredient where id_com=:id_com and id_ingredient=:id_ingredient and id_client=: d_client";
            // print $query;
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id_com', $id_com, PDO::PARAM_STR);
            $resultset->bindValue(':id_ingredient', $id_ingredient, PDO::PARAM_STR);
            $resultset->bindValue(':id_client', $id_client, PDO::PARAM_STR);
            $resultset->execute();

            while ($data = $resultset->fetch()) {
                $_array[] = new Commande_Ingredient($data);
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

    public function addCommande_ingredient($id_com, $id_ingredient, $id_client) {
        $query = "insert into commande_ingredient (id_com,id_ingredient,id_client) values (:id_com,:id_ingredient,:id_client)";

        try {
            $resultset = $this->_db->prepare($query);

            $resultset->bindValue(':id_com', $id_com, PDO::PARAM_STR);
            $resultset->bindValue(':id_ingredient', $id_ingredient, PDO::PARAM_STR);
            $resultset->bindValue(':id_client', $id_client, PDO::PARAM_STR);

            $resultset->execute();
        } catch (PDOException $e) {
            ?><div class="alert alert-danger" role="alert">Echec insertion commande_ingredient !</div><?php
            //print "<br/>Echec de la commande";
            print $e->getMessage();
        }
    }

}
