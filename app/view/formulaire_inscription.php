<?php
include 'fragmentHeader.html';
include 'fragmentMenuClient.php';
?>
<h2>Inscription au site</h2>

<?php
if (!empty($erreurs_inscription)) {

    echo '<ul>' . "\n";

    foreach ($erreurs_inscription as $e) {

        echo '	<li>' . $e . '</li>' . "\n";
    }

    echo '</ul>';
}
?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
              $form = new Formr('bootstrap');
        //les echos sont dans le view 
        $form->required = '*';
            echo $form->form_open();
            echo $form->input_text('fname', 'First name:');
            echo $form->input_text('lname', 'Last name:');
            echo $form->input_email('email', 'Email');
            echo $form->input_password('passwd', 'Password');
            echo $form->input_password('passwd_conf', 'Password');
            echo $form->input_text('telephone', 'Telephone');
            echo $form->input_hidden('action', 'inscription');
            ?>
            <input type='hidden' name='type' value='user'>
            <input type='hidden' name='action' value='inscriptionDone'>

            <?php
            echo $form->input_submit();
            echo $form->form_close();
            ?>


        </div>
    </div>
</div>

<?php include 'fragmentFooter.html';
