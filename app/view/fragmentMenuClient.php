

<?php require_once 'functions.php'
?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="navbar-header">
        <a class="navbar-brand" href="../controller/router.php?action=accueil&controlleur=utilisateur">TravelCar</a>
    </div>
    <ul class="nav navbar-nav">
        <li class="dropdown">
            <a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Mon compte
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="drop1">

                <li><a href="../controller/router.php?action=modifier&type=user">Modifier Informations Personnelles</a></li>
                <li><a href="../controller/router.php?action=modifier&type=user">Modifier Mot de passe</a></li>
                <li><a href="../controller/router.php?action=modifier&type=user">Mes réservations</a></li>
            </ul>
        </li>
        <li class=" dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Réservations
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../controller/router.php?action=reserveParking&type=reservation">Parking</a>
                <a class="dropdown-item" href="../controller/router.php?action=reserveCar&type=reserveCar">Réserver Voiture</a>

                <a class="dropdown-item" href="#">Chasseurs</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Autres témoignages</a>
            </div>
        </li>
        <?php

        function isconnected() {
            if ($_SESSION[id] != null) {
                return true;
            } else {
                return false;
            }
        }

        if (isconnected()) {
            echo '<li><a href="../controller/router.php?action=deconnexion&type=user">Deconnexion</a></li>';
        } else {
            echo '<li><a href="../controller/router.php?action=connexion&type=user">Connexion</a></li>';
        }
        ?>
    </ul>
</nav>




<!--  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">Start Bootstrap</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="post.html">Sample Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>-->
<header class="masthead" style="background-image: url('../../public/img/sauv1.png')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>Contact Me</h1>
                    <span class="subheading">Have questions? I have answers.</span>
                </div>
            </div>
        </div>
    </div>
</header>
