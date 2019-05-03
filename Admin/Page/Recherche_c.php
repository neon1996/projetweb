recherche d'un client en tant qu'admin ! 
<?php

$vue = new Vue_client_commandeDB($cnx);

$liste = array();
$liste = null;
//sans filtre de produits
if (isset($_GET['search_client'])) {
    $liste = $vue->getClientByName();
}

/*
//avec filtre si on a fait un choix dans la liste déroulante: 
else {
    if (isset($_GET['choix_type']) && $_GET['choix_type'] != "") {
        $liste = $vue->getClientByName($_GET['choix_type']);
    } else {
        $liste = $vue->getAllClient();
    }
}*/
?>

<div class="container">
    <form action=" <?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_rech_client">
    
     <div class="form-group">
        
        <h3>Rechercher un client</h3>
        Nom du client : <input type="text" name="nom" id="nom"/></br>
        <br/>
        <br/> 
        
        <input type="submit" name="search_client" id="search_client" value="Rechercher"/>

    </div>  
    
</form>
</div>

<?php
if ($liste != null) {
    $nbr = count($liste);
    ?>
    <div class="container ecartTop3pc">
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <div class="row">
                
                <div class="col-sm-5 text-center borderBottom">
                            <?php
                            print "<br/>" . $liste[$i]['id_client'] ."<br/>" ;
                            print "<br/>" . $liste[$i]['nom'] ."<br/>" ;
                            print "<br/>" . $liste[$i]['prenom'] . "<br/>" ;
                            print "<br/>" . $liste[$i]['telephone'] . "<br/>";
                            print "<br/>" . $liste[$i]['id_com'] ."<br/>" ;
                            print "<br/>" . $liste[$i]['date_com'] ."<br/>" ;
                            ?>
                    

                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}//fin if $nbr >0
else {
    ?>
    <div class="container">
        <p>( Rien n'a été trouvé dans la bdd )</p>
    </div>
    <?php
}