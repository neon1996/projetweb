<div class="panel panel-default col-xs-12 col-sm-12 col-md-10 col-lg-12">
    <div class="panel-heading"><h3 class="">Gestion de la commande !</h3></div>
    <div class="panel-body">

        <?php
        
        
        if (isset($_GET['id_ingredient'])) {
            extract($_GET, EXTR_OVERWRITE);


            $cl = new CommandeDB($cnx);
            $cl->addCommande($_SESSION['id_client']);
            $retour = $cl->getCommande($_SESSION['id_client'], '2019-05-14', 0);
            
            if ($retour != null) {
                $id_com = $retour[0]->id_com;
                
                $id_ingredient = $_GET['id_ingredient'];
                
                print "id commande = " . $id_com;
                print "<br/>id ingredient = " . $id_ingredient;
                
                ?> <div class="alert alert-success" role="alert">Votre commande nous est bien parvenue !</div><?php
                // print "Insertion effectuée";
                
            } else if ($retour == 2) {
                ?> <div class="alert alert-danger" role="alert">Déjà inséré !</div><?php
                // print "<br/>Déjà encodé";
            }
        } else {
            print "<p><br/><span class='txtGras'>Pour vous inscrire, venez<a href='index.php?page=Inscription.php'> ici</a></span></p>";
        }


        if (!isset($_GET['commander'])) {
            print "<p><br/><span class='txtGras'>Pour commander, cliquez <a href='index.php?page=Listeingredient.php'> ici</a> votre plat.</span></p>";
        } else {
            /*
              print "<br/>Rappel du plat commandé<br/><br/>";
              ?>
              <div class="row">

              <div class="col-xs-8 pull-left">
              <br/><span class="txtGras">Votre plat : <span class="txtRouge">
              <?php print ($_GET['id_ingredient'])?>

              [nom et détails du produit commandé]</span></span><br/>
              </div>
              </div>
              <br/>
              <?php
              if (isset($erreur))
              print $erreur;
              
             */
        }
        ?>
    </div>
</div>