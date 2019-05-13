<?php
print "Connexion client";
//si on a cliqué sur le bouton "envoyé" du formulaire

if (isset($_POST['submit_login'])) {

    extract($_POST, EXTR_OVERWRITE);
    $log = new ClientDB($cnx);
    /* @var $email type */
    $client = $log->getClient($email,$mdp);
    
    if (is_null($client)) {
        var_dump($client);
        print "</br>Email ou mot de passe incorrect";
    } else {
        $_SESSION['client'] = 1;
        unset($_SESSION['page']);
        print "<meta http-equiv=\"refresh\": Content=\";URL=./Client/Index_c.php\">";
        
    }
}

?>


<form action=" <?php print $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
        
        <h3>Se connecter</h3>
        Email : <input type="email" name="email" id="email"/></br>
        <br/>
        <br/> 
        Mot de passe : <input type="password" name="mdp" id="mdp"/></br>
        <br/>
        <br/>
        <input type="submit" name="submit_login" id="submit_login" value="Se connecter"/>


        <br/>

            Vous n'avez toujours pas de compte?<a href="index.php?page=Inscription.php">Inscrivez-vous</a>
        

    </div>            
</form>
