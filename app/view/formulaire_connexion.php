<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!empty($erreurs_connexion)) {

	echo '<ul>'."\n";
	
	foreach($erreurs_connexion as $e) {
	
		echo '	<li>'.$e.'</li>'."\n";
	}
	
	echo '</ul>';
}

echo $form->form_open();
echo $form->input_email('email','email:');
echo $form->input_text('password','password:');
echo $form->input_hidden('action','connexion');


echo $form->input_submit();
echo $form->form_close();

$form->required = '*';
