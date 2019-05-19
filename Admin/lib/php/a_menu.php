<?php
include ('./lib/php/verifier_connexion.php');
?>

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
            <li class="nav-item"><a class="nav_link" href="./index.php?page=Client_edit.php">Client - Commande</a></li>
            <li class="nav-item"><a class="nav_link" href="./index.php?page=Menu_edit.php">Menu editable</a></li>
            <li class="nav-item"><a class="nav_link" href="./index.php?page=Ajout_ingredient.php">Ajout Ingredient</a></li>
            <li class="nav-item"><a class="nav_link" href="./index.php?page=Inscription.php">Ajout Client</a></li>
            <li class="nav-item"><a class="nav_link" href="index.php?page=Disconnect.php">Déconnexion</a></li> 
            <li class="nav-item"><a class="nav_link"><?php print "Statut : Admin";?></a></li>
        </ul>

    </div>

</div>
</nav>


