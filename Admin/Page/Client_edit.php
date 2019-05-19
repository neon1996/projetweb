<div class="panel panel-default col-xs-12 col-sm-12 col-md-10 col-lg-12">
    <div class="panel-heading">
        <h3 class="aligner txtGras">Membres enregistrés ayant passé une commande :</h3>
    </div>
    <div class="panel-body">


        <?php
        include ('./lib/php/verifier_connexion.php');


//récupération des produits
        $vue = new Vue_client_commandeDB($cnx);
        $liste = array();
        $liste = null;

        $liste = $vue->getAllClient();
        $nbr = count($liste);
        ?>


        <div class="container table">
            <table class="table-responsive">
                <tr>
                    <th class="ecart">Id Client</th>
                    <th class="ecart">Nom</th>
                    <th class="ecart">Prénom</th>
                    <th class="ecart">Télephone</th>
                    <th class="ecart">ID Commande</th>
                    <th class="ecart">Date_Commande</th>
                    <th class="ecart">Statut</th>
                    

                </tr>
                <?php
                for ($i = 0; $i < $nbr; $i++) {
                    ?>
                    <tr>
                        <td class="ecart"><?php print $liste[$i]['id_client']; ?></td>

                        <td><span contenteditable="true" name="nom" class="ecart" id="<?php print $liste[$i]['id_client']; ?>">
                                <?php print $liste[$i]['nom']; ?></span>
                        </td>
                        <td><span contenteditable="true" name="prenom" class="ecart" id="<?php print $liste[$i]['id_client']; ?>">
                                <?php print $liste[$i]['prenom']; ?></span>
                        </td>

                        <td><span contenteditable="true" name="telephone" class="ecart" id="<?php print $liste[$i]['id_client']; ?>">
                                <?php print $liste[$i]['telephone']; ?></span>
                        </td>
                        <td><span contenteditable="false" name="id_com" class="ecart" id="<?php print $liste[$i]['id_client']; ?>">
                                <?php print $liste[$i]['id_com']; ?></span>
                        </td>
                        <td><span contenteditable="false" name="date_com" class="ecart" id="<?php print $liste[$i]['id_client']; ?>">
                                <?php print $liste[$i]['date_com']; ?></span>
                        </td>
                        <td><span contenteditable="false" name="statut_com" class="ecart" id="<?php print $liste[$i]['id_client']; ?>">
                                <?php print $liste[$i]['statut']; ?></span>
                        </td>
                        

                    </tr>
                    <?php
                }
                ?>
            </table>  
        </div>
    </div>
</div>