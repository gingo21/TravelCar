

<?php require_once 'functions.php';
    ;
?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="navbar-header">
        <a class="navbar-brand" href="../controller/router.php?action=accueil&type=user">TravelCar</a>
    </div>
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Mon compte
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="drop1">

                <li><a href="../controller/router.php?action=modifier&type=user">Modifier Informations Personnelles</a></li>
                <li><a href="../controller/router.php?action=modifyPassword&type=user">Modifier Mot de passe</a></li>

            </ul>
        </li>
        <li class=" dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Parking
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../controller/router.php?action=reserveParking&type=reservation">Réserver Parking</a>
                <a class="dropdown-item" href="../controller/router.php?action=printreservation&type=reservation">Mes réservations</a>
            </div>
        </li>
         <li class=" dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Voiture
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../controller/router.php?action=reserveCar&type=reserveCar">Réserver Voiture</a>
                <a class="dropdown-item" href="../controller/router.php?action=printReservation&type=reserveCar">Mes réservations</a>

            </div>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto">
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
