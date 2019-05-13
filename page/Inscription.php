
    <h3 class="aligner txtGras">Inscription sur notre site :</h3>

<?php
if (isset($_GET['submit_inscription'])) {
    extract($_GET, EXTR_OVERWRITE);

    if (empty($nom) || empty($prenom) || empty($telephone) || empty($email1) || empty($mdp) 
            || empty($rue) || empty($numero) || empty($ville) || empty($cp)) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
    } else {
        $cl = new ClientDB($cnx);
        $retour = $cl->addClient($_GET);
        print "Insertion dans la base de données réussie ! <br/>";
        
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
