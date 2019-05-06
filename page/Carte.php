
<h3 class="">Notre carte !</h3>

<?php
//récupération des types pour la liste déroulante
$typ = new TypeDB($cnx);
$types = $typ->getType();
$nbr_type = count($types);


//récupération des produits dans la vue créée
$vue = new Vue_ingredient_typeDB($cnx);

$liste = array();
$liste = null;
//sans filtre de produits
if (!isset($_GET['submit_choix_type'])) {
    $liste = $vue->getAllIngredient();
}
//avec filtre si on a fait un choix dans la liste déroulante: 
else {
    if (isset($_GET['choix_type']) && $_GET['choix_type'] != "") {
        $liste = $vue->getProduitsByType($_GET['choix_type']);
    } else {
        $liste = $vue->getAllIngredient();
    }
}
?>

<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <div class="row">  
            <div class="col-sm-1 hidden-xs txtGras text-right">Filtrer</div>               
            <div class="col-sm-11">
                <select name="choix_type" id="choix_type">
                    <option value="">Dérouler</option>
                    <?php
                    for ($i = 0; $i < $nbr_type; $i++) {
                        ?>
                        <option value="<?php print $types[$i]->id_type; ?>">
                            <?php
                            print $types[$i]->nom_type;
                            ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <input type="submit" name="submit_choix_type" id="submit_choix_type">
            </div>
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
                    print "<br/>" . $liste[$i]['nom_ingredient'] . "<br/>";
                    print "<br/>" . $liste[$i]['description_ingredient'] . "<br/>";
                    print "<br/>" . $liste[$i]['prix_ingredient'] . " €<br/>";
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
        <p>( Rien n'est enregistré dans la bdd )</p>
    </div>
    <?php
}