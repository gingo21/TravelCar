<?php
include 'fragmentHeader.html';
include 'fragmentMenuClient.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo'<div class="col-lg-8 col-md-10 mx-auto">';
echo $form->form_open();
echo $form->input_email('email','email:');
echo $form->input_password('password','password:');
echo $form->input_hidden('action','connexion2');
echo $form->input_hidden('type','user');


echo $form->input_submit();
echo $form->form_close();
$form->required = '*';
$_SESSION['form'] = $form;
?>
<p>Pas encore inscrit : cliquer ici </p>
<a class="btn btn-primary" href="../controller/router.php?action=inscription&type=user" role="button">Incription</a>
</div>





<?php include 'fragmentFooter.html'; ?>