<?php
print "Connexion client";
//si on a cliqué sur le bouton "envoyé" du formulaire

if (isset($_POST['submit_login'])) {

    extract($_POST, EXTR_OVERWRITE);
    $log = new ClientDB($cnx);
    $client = $log->getClient();
    
    if (is_null($client)) {
        print "</br>Login ou mot de passe incorrect";
    } else {
        $_SESSION['client'] = 1;
        unset($_SESSION['page']);
        print "<meta http-equiv=\"refresh\": Content=\";URL=./Admin/Client/Index_c.php\">";
        
    }
}

?>


<form action=" <?php print $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
        
        <h3>Se connecter</h3>
        Login : <input type="text" name="login" id="login"/></br>
        <br/>
        <br/> 
        Mot de passe : <input type="password" name="password" id="password"/></br>
        <br/>
        <br/>
        <input type="submit" name="submit_login" id="submit_login" value="Se connecter"/>


        <br/>

            Vous n'avez toujours pas de compte?<a href="index.php?page=Inscription.php">Inscrivez-vous</a>
        

    </div>            
</form>
