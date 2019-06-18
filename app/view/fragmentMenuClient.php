
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <a class="navbar-brand" href="../controller/router.php?action=accueil&controlleur=utilisateur">Welcome to Travel Car</a>
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
            Témoignages
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Dompteurs</a>
            <a class="dropdown-item" href="#">Zoos</a>
            <a class="dropdown-item" href="#">Chasseurs</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Autres témoignages</a>
          </div>
        </li>
        <li><a href="../controller/router.php?action=signOut">Sign Out</a></li>
    </ul>
</nav>



