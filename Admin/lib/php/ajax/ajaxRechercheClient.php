<?php
//header('Content-Type: application/json');
require '../pgConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Client.class.php';
require '../classes/ClientDB.class.php';

$cnx = Connexion::getInstance($dsn,$user,$pass);
//print "email = ".$_GET['email'];
try{       
    $search = new ClientDB($cnx);
    $retour = $search->getClient($_GET['email'],$_GET['mdp']);    
    //var_dump($retour);
   
    print json_encode($retour);    
}
catch(PDOException $e){
    print $e->getMessage()." ".$e->getLine()." ".$e->getTrace();
}
