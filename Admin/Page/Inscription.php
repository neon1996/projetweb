<div class="panel panel-default col-xs-12 col-sm-12 col-md-10 col-lg-12">
    <div class="panel-heading">
        <h3 class="aligner txtGras">Inscription d'un nouveau client :</h3>

    </div>
    <div class="panel-body">


        <?php
        include ('./lib/php/verifier_connexion.php');
        if (isset($_POST['submit_inscription'])) {
            extract($_POST, EXTR_OVERWRITE);

            if (empty($nom) || empty($prenom) || empty($telephone) || empty($email1) || empty($mdp) || empty($rue) || empty($numero) || empty($ville) || empty($cp)) {
                //$erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
                ?> <div class="alert alert-danger" role="alert">Veuillez remplir tous les champs !</div><?php
            } else {
                $cl = new ClientDB($cnx);
                $retour = $cl->addClient($_POST);
                ?><div class="alert alert-success" role="alert">Inscription réussie !</div><?php
            }
            //var_dump($_POST);
        }


        if (isset($erreur))
            print $erreur;
        ?>


        <div class="container">

            <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="POST" id="form_inscription">
                <div class ="form-group">

                    <br/>

                    <label for="email1">Email :</label>               
                    <input type="email" id="email1" name="email1" placeholder="aaa@aaa.aa"/>
                    <br/>


                    <label for="email2">Email vérification :</label>               
                    <input type="email" id="email2" name="email2" placeholder="aaa@aaa.aa"/>
                    <br/>

                    <label  for="mdp">Mot de passe : </label>
                    <input type="password" name="mdp" id="mdp"/>
                    <br/>

                    <label for="nom">Votre nom :</label>
                    <input type="text" name="nom" id="nom" />

                    <br/>

                    <label for="prenom">Votre prénom :</label></td>
                    <input type="text" name="prenom" id="prenom"/>
                    <br/>

                    <label for="telephone">Telephone :</label></td>
                    <input type="text" name="telephone" id="telephone" />
                    <br/>

                    <label for="rue">Rue :</label>
                    <input type="text" name="rue" id="rue"/>
                    <br/>

                    <label for="numero">Numero - Boite postale :</label>
                    <input type="text" name="numero" id="numero"/>
                    <br/>

                    <label for="cp">Code postal :</label>
                    <input type="text" name="cp" id="cp"/>
                    <br/>

                    <label for="ville">Ville :</label>
                    <input type="text" name="ville" id="ville"/>

                    <br/>
                    <br/>

                    <input type="submit" name="submit_inscription" id="submit_inscription" value="Enregistrez-vous !"/>
                    <input type="reset" id="reset" value="Annuler"/>

                </div>

            </form>

        </div>
    </div>
</div>