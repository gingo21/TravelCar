
<div class="container">
    <?php
    include 'fragmentHeader.html';
    include 'fragmentMenuClient.php';

    ?>
    <body>
    <!-- Jumbotrom -->
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Travel Car</h3>
        </div>
    </div>
    <div class="jumbotron">
        <p>Bienvenue, <?php echo $_SESSION['email'];
    echo$_SESSION['type'] ?>.<br />
            Vous êtes maintenant connecté !</p>
    </div>
    <p/>
</div>
<?php include 'fragmentFooter.html'; ?>
