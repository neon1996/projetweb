<?php

class ClientDB extends Client {

    private $_db;
    private $_array = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getClient($login, $password) {
        try {
            $query = "select * from client2";
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

