<div class="panel panel-default col-xs-12 col-sm-12 col-md-10 col-lg-12">
    <div class="panel-heading">
        <h3 class="aligner txtGras">Ajout d'un plat :</h3>
    </div>
    <div class="panel-body">


        <?php
        include ('./lib/php/verifier_connexion.php');

        if (isset($_GET['add_ingredient'])) {
            extract($_GET, EXTR_OVERWRITE);

            if (empty($id_type) || empty($nom_ingredient) || empty($prix_ingredient) || empty($description_ingredient)) {
              //  $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
                ?> <div class="alert alert-danger" role="alert">Veuillez remplir tous les champs !</div><?php
            } else {
                $ing = new IngredientDB($cnx);
                $retour = $ing->addIngredient($_GET);
                ?> <div class="alert alert-success" role="alert">Ajout réussi!</div><?php
            }
            //var_dump($_GET);
        }


        if (isset($erreur))
            print $erreur;
        ?>



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
    </div>
</div>
