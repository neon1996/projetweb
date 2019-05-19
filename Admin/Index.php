<!DOCTYPE html>

    
 
<?php
session_start();
include ('./lib/php/verifier_connexion.php');

require './lib/php/admin_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);

?>


<html>
    <head> <meta charset="UTF-8">        
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> <!-- Ne pas enlever l'intégrité sinon le tableau éditable ne fonctionne plus-->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
     
        <script src="./lib/js/jquery1_editable.js"></script> 
        <script src='./lib/js/FonctionsJqueryDA.js'></script>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous"/>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous">

       <!-- <link rel="stylesheet" href="lib/css/CustomPro.css" /> -->
        <link rel="stylesheet" type="text/css" href="lib/css/StylePro.css"/>
        <title>Mix-Tout</title>
    </head>

    <body>
        <header>
            <div class ="container">
                
                <?php
                if (file_exists('./lib/php/a_menu.php')) {
                    require './lib/php/a_menu.php';
                    
                }
                ?>
           <!--    <div class="">
                    <a href="index.php?page=Disconnect.php">Déconnexion</a>
                </div> -->

            </div>
        </header>
        
        <section>
            <div class="container">
                
            <?php 
            if (!isset($_SESSION['page'])) {
                $_SESSION['page'] = "Accueil.php"; // page par défaut 
            }
            if (isset($_GET['page'])) {
                $_SESSION['page'] = $_GET['page'];
            }
            $path = "./page/".$_SESSION['page'];

            if (file_exists($path)) {
                include ($path);
            } else {
                 include ('./Page/Page404.php');
            }
           
            ?>
            </div>
        </section>

        <footer>
            <div class="container text-center" id="footer">
            <?php
                if ('./Page/Footer.php') {
                  
                include ('./Page/Footer.php');
                
                }
                
                ?></div>
        </footer>

    </body>


</html> 
