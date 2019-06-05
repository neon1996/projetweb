
<nav class="navbar navbar-expand-md navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <div class="navbar-header">
            <a class="navbar-brand" href="./index.php?page=Accueil.php">Prépa'Tout</a>
        </div>

        <ul class="nav navbar-nav">
            <li class="nav-item"><a class="nav_link" href="./index.php?page=Accueil.php">Home</a></li>
            

            <li class="nav-item"><a class="nav_link" href="index.php?page=Menu.php">Menu</a></li>
            


            <?php
            if (isset($_SESSION['id_client'])) {
                
               ?> <li class="nav-item"><a class="nav_link" href="./index.php?page=Listeingredient.php">Commander</a></li>
               <li class="nav-item"><a class="nav_link" href="index.php?page=Disconnect.php">Déconnexion</a></li><?php
               ?><li class="nav-item"><a class="nav_link"><?php print "Statut : client";?></a></li><?php
            } else {
                ?><li class="nav-item"><a class="nav_link" href="./index.php?page=Connexion.php">Connexion</a></li>
                    <li class="nav-item"><a class="nav_link" href="./index.php?page=Inscription.php">Inscription</a></li>
                        <?php
                }
                ?>

        </ul>

    </div>
</nav>