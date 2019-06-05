<div class="jumbotron col-xs-12 col-sm-12 col-md-10 col-lg-12">
  <h1>Bienvenue sur notre site ! </h1>
  
   <?php
            if (!isset($_SESSION['id_client'])) {
                
               ?> 
  <p><a class="btn btn-primary btn-lg" href="index.php?page=Connexion.php" role="button">Se connecter</a></p>
  <p><a class="btn btn-primary btn-lg" href="index.php?page=Inscription.php" role="button" >S'inscrire</a></p>
  
            <?php } ?>
</div>

   