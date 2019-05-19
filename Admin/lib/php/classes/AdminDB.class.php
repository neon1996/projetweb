<?php

class AdminDB extends Admin {
     private $_db;
    private $_array = array();
    
    public function __construct($db){
        $this->_db = $db;
    }
    
    public function getAdmin($login){
        try{
            print $login;
            $query = "select * from admin where login =:login ";
           // print $query;
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':login',$login);
            
            $resultset->execute();

            while($data = $resultset->fetch()){
                $_array[] = new Admin($data);
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
