<!DOCTYPE html>

<?php
session_start();
?>
<?php
require '../Admin/lib/php/admin_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);

?>



<html>
    <head> <meta charset="UTF-8">        
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous"/>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous">
        <link rel="stylesheet" href="./Admin/lib/css/Custom.css" />
        <link rel="stylesheet" type="text/css" href="./Admin/lib/css/Style.css"/>
        <script src='./Admin/lib/js/FonctionsJqueryDA.js'></script>
    </head>

    <body>
        <header>
            <div class ="container">
                
                <?php
                if (file_exists('./lib/c_menu.php')) {
                    require './lib/c_menu.php';
                }
                ?>
                <div class="">
                    <a href="index.php?page=Disconnect.php">Déconnexion</a>
                </div>

            </div>
        </header>
        <section>
            <div class="container">
                
            <?php 
            if (!isset($_SESSION['page'])) {
                $_SESSION['page'] = "Accueil_c.php"; // page par défaut 
            }
            if (isset($_GET['page'])) {
                $_SESSION['page'] = $_GET['page'];
            }
            $path = "./page/".$_SESSION['page'];

            if (file_exists($path)) {
                include ($path);
            } else {
                 include ('Admin/Page/Page404.php');;
            }
           
            ?>
            </div>
        </section>

        <footer>
            <div class="container text-center" id="footer">
            <?php
                if ('./Admin/Page/Footer.php') {
                  
                include ('./Admin/Page/Footer.php');
                
                }
                
                ?></div>
        </footer>

    </body>


</html> 
