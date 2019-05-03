<hgroup>
    <h3 class="aligner txtGras"></h3>
    <h4 class="text-muted aligner"></h4>
</hgroup>
<?php
//2016-2017
//récupération des produits
$vue = new Vue_ingredient_typeDB($cnx);
$liste = array();
$liste = null;

$liste = $vue->getAllIngredient();
$nbr = count($liste);
?>





<h2 id="titre">tableau dynamique</h2>

<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">Id Ingredient</th>
            <th class="ecart">Nom Ingredient</th>
            
            <th class="ecart">Description</th>
            <th class="ecart">Prix </th>
            
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td class="ecart"><?php print $liste[$i]['id_ingredient']; ?></td>
                <td class="ecart"><?php print $liste[$i]['nom_ingredient']; ?></td>
               
                <td><span contenteditable="true" name="description_ingredient" class="ecart" id="<?php print $liste[$i]['id_ingredient']; ?>">
                        <?php print $liste[$i]['description_ingredient']; ?></span>
                </td>
                <td><span contenteditable="true" name="prix_ingredient" class="ecart" id="<?php print $liste[$i]['id_ingredient']; ?>">
                        <?php print $liste[$i]['prix_ingredient']; ?></span>
                </td>
               
            </tr>
            <?php
        }
        ?>
    </table>  
</div>