<?php
//si on a cliqué sur le bouton "envoyé" du formulaire

if (isset($_POST['submit_login'])) {

    extract($_POST, EXTR_OVERWRITE);
    $log = new ClientDB($cnx);
    $client = $log->getClient($admin, $password);
    
    if (is_null($client)) {
 print "</br>Login ou mot de passe incorrect";
    } else {

        $log1 = new AdminDB($cnx);
        $admin = $log1->getAdmin($client[0]->email);
        
        if (!is_null($client)) {
            //print 'client';
            $_SESSION['id_client'] = $client[0]->id_client;
            print "<meta http-equiv=\"refresh\": Content=\";URL=Index.php\">";
            
            
            
        } 
        if (!is_null($admin)){
           // print 'admin';
            $_SESSION['admin'] = 1;
            unset($_SESSION['page']);
            print "<meta http-equiv=\"refresh\": Content=\";URL=./Admin/Index.php\">";
        }
    }
}


?>


<form action=" <?php print $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group col-xs-12 col-sm-12 col-md-10 col-lg-12">

        <h3>Espace Connexion : </h3>
        <br/>
        Login : <input type="text" name="admin" id="admin"/></br>
        <br/>

        Mot de passe : <input type="password" name="password" id="password"/></br>
        <br/>

        <br/>
        <input type="submit" name="submit_login" id="submit_login" value="Se connecter"/>


        <br/>

        Vous n'avez toujours pas de compte?<a href="index.php?page=Inscription.php"> Inscrivez-vous ! </a>


    </div>            
</form>
