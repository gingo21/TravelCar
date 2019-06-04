<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once CHEMIN_LIB . 'formr/class.formr.php';
require_once CHEMIN_MODELE . 'ModelUser.php';



$form = new Formr('bootstrap');
//echo $form->form_open();
//echo $form->input_text('fname','First name:');
//echo $form->input_text('lname','Last name:');
//echo $form->input_email('email','Email');
//echo $form->input_text('passwd','Password');
//echo $form->input_text('passwd_conf','Password');
//echo $form->input_text('telephone','Telephone');
//echo $form->input_hidden('action','inscription');
//
//
//echo $form->input_submit();
//echo $form->form_close();

$form->required = '*';

// check if the form was submitted
if ($form->submit()) {

    // process and validate the POST data
    $email = $form->post('email', 'Email', 'valid_email');
    $password = $form->post('passwd', 'Password', 'min_length[6]|hash');
    $pass_conf = $form->post('passwd_conf', 'Confirm Password', 'min_length[6]|matches[passwd]');

    // check if there were any errors
    if (!$form->errors()) {
        // no errors
        // user has entered a valid email address, username, and confirmed their password
        echo $form->success_message('Success!');
        $results = ModelUser::insert($_POST['lname'], $_POST['fname'], $_POST['telephone'], sha1($_POST['passwd']),
                        $_POST['email']);
    } else {
        include CHEMIN_VUE . 'formulaire_inscription.php';
    }
} else {
    include CHEMIN_VUE . 'formulaire_inscription.php';
}

// print messages
echo $form->messages();

// Création d'un tableau des erreurs
$erreurs_inscription = array();

