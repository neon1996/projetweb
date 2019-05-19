<div class="panel panel-default col-xs-12 col-sm-12 col-md-10 col-lg-12">
    <div class="panel-heading">
        <h3 class="aligner txtGras">Notre menu :</h3>
    </div>
    <div class="panel-body">


        <?php
        include ('./lib/php/verifier_connexion.php');

//récupération des produits
        $vue = new Vue_ingredient_typeDB($cnx);
        $liste = array();
        $liste = null;

        $liste = $vue->getAllIngredient();
        $nbr = count($liste);
        ?>

        <div class="container table col-md">
            <table class="table-responsive">
                <tr>
                    <th class="ecart">Id Ingredient</th>
                    <th class="ecart">Nom Ingredient</th>

                    <th class="ecart">Description</th>
                    <th class="ecart">Prix </th>
                    <th class="ecart">Type</th>

                </tr>
                <?php
                for ($i = 0; $i < $nbr; $i++) {
                    ?>
                    <tr>
                        <td class="ecart"><?php print $liste[$i]['id_ingredient']; ?></td>

                        <td><span contenteditable="true" name="nom_ingredient" class="ecart" id="<?php print $liste[$i]['id_ingredient']; ?>">
                                <?php print $liste[$i]['nom_ingredient']; ?></span>
                        </td>

                        <td><span contenteditable="true" name="description_ingredient" class="ecart" id="<?php print $liste[$i]['id_ingredient']; ?>">
                                <?php print $liste[$i]['description_ingredient']; ?></span>
                        </td>
                        
                        <td><span contenteditable="true" name="prix_ingredient" class="ecart" id="<?php print $liste[$i]['id_ingredient']; ?>">
                                <?php print $liste[$i]['prix_ingredient']; ?></span>
                        </td>
                        
                        <td><span contenteditable="true" name="nom_type" class="ecart" id="<?php print $liste[$i]['id_ingredient']; ?>">
                                <?php print $liste[$i]['nom_type']; ?></span>
                        </td>

                    </tr>
                    <?php
                }
                ?>
            </table>  
        </div></div>
</div>