<?php
if (!isset($_SESSION['admin'])) {
    ?>
    <meta http-equiv="refresh": Content="\"0;url=../index.php?page=Accueil.php"/>
    <?php
    exit();
}