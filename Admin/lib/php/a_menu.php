<nav class="navbar navbar-expand navbar-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Mix-Tout</a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestion Client
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./index.php?page=Client_edit.php">Client - Commande</a> <!-- Rechercher un client, mettre option de modification et de suppression -->
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestion Menu</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./index.php?page=Menu_edit.php">Menu editable</a>
                        <a class="dropdown-item" href="./index.php?page=Ajout_ingredient.php">Ajout Ingredient</a>
                    </div>
                </li>

                <li class="nav-item">
                    <div >
                        <a class="nav_link" href="index.php?page=Disconnect.php">Déconnexion</a>
                    </div>
                </li> 

            </ul>
        </div>

    </div>
</nav>


