<?php
print " Connexion admin";
//si on a cliqué sur le bouton "envoyé" du formulaire

if (isset($_POST['submit_login'])) {

    extract($_POST, EXTR_OVERWRITE);
    $log = new AdminDB($cnx);
    $admin = $log->getAdmin($admin, $password);
    
    if (is_null($admin)) {
        print "</br>Login ou mot de passe incorrect";
    } else {
        $_SESSION['admin'] = 1;
        unset($_SESSION['page']);
        print "<meta http-equiv=\"refresh\": Content=\";URL=./Admin/index.php\">";
        
    }
}
?>


<form action=" <?php print $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
        
        <h3>Se connecter</h3>
        Login : <input type="text" name="admin" id="admin"/></br>
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
