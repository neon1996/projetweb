
<h3 class="aligner txtGras">Inscription sur notre site :</h3>

<?php

include ('./lib/php/verifier_connexion.php');

if (isset($_GET['add_ingredient'])) {
    extract($_GET, EXTR_OVERWRITE);

    if (empty($id_type) || empty($nom_ingredient) || empty($prix_ingredient) || empty($description_ingredient) ) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
    } else {
        $ing = new IngredientDB($cnx);
        $retour = $ing->addIngredient($_GET);
        print "Insertion dans la base de données réussie ! <br/>";
    }
    var_dump($_GET);
}


if (isset($erreur))
    print $erreur;
?>


<span class="txtGras">Ajouter un ingredient dans la BDD :</span> <br/><br/>

<div class="container">

    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_inscription">
        <div class ="form-group">

            <br/>
            <label  for="id_type">Type : </label>
            <input type="text" name="id_type" id="id_type"/>
            <br/>

            <label  for="nom_ingredient">Nom : </label>
            <input type="text" name="nom_ingredient" id="nom_ingredient"/>
            <br/>

            <label for="prix_ingredient">Prix :</label>
            <input type="text" name="prix_ingredient" id="prix_ingredient" />

            <br/>

            <label for="description_ingredient">Description :</label></td>
            <input type="text" name="description_ingredient" id="description_ingredient"/>
            <br/>
            <br/>

            <input type="submit" name="add_ingredient" id="add_ingredient" value="Ajouter"/>
            <input type="reset" id="reset" value="Annuler"/>

        </div>

    </form>

</div>
