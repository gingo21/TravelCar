
<?php

include 'fragmentHeader.html';
include 'fragmentMenuAdmin.php';
?>
<!-- Jumbotrom -->
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Travel Car</h3>
    </div>
</div>
<div class="jumbotron">
    <p>Bienvenue, <?php
$keys = array('email', 'id', 'type');

//iterate over the keys to test
foreach($keys as $key) {

    // test if $key exists in the $_SESSION global array
    if (isset($_SESSION[$key])) {

        // it does; output the value
        echo $_SESSION[$key];

        // remove the key so we don't keep outputting the message
//        unset($_SESSION[$key]);
    }
}
$test = session_id(); 
echo ($test);
?>.<br />
        Vous êtes maintenant connecté !</p>
</div>
<p/>
<?php include 'fragmentFooter.html'; ?>
