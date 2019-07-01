

<?php require_once 'functions.php'
?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="navbar-header">
        <a class="navbar-brand" href="../controller/router.php?action=accueil&controlleur=utilisateur">TravelCar</a>
    </div>
    <ul class="nav navbar-nav mr-auto">
        <li class="dropdown">
            <a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Sites
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="drop1">

                <li><a href="../controller/router.php?action=addAirport&type=admin">Ajouter un aeroport</a></li>
                <li><a href="../controller/router.php?action=addParking&type=admin">Ajouter un parking</a></li>
            </ul>
        </li>
        <li class=" dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Utilisateurs
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../controller/router.php?action=viewParks&type=admin">Voir les réservations</a>
            </div>
        </li>
    </ul>
    <ul>
        <?php

        function isconnected() {
            if ($_SESSION['id'] != null) {
                return true;
            } else {
                return false;
            }
        }

        if (isconnected()) {
            echo '<li><a href="../controller/router.php?action=deconnexion&type=user">Déconnexion</a></li>';
        } else {
            echo '<li><a href="../controller/router.php?action=connexion&type=user">Connexion</a></li>';
        }
        ?>
    </ul>
</nav>

<header class="masthead" style="background-image: url('../../public/img/sauv1.png')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
    <?php
    if (isset ($titre)) {
        echo "<h1>$titre</h1>";
    }
    ?>
                </div>
            </div>
        </div>
    </div>
</header>
