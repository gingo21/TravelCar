<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'fragmentHeader.html';
include 'fragmentMenuAdmin.php';
require CHEMIN_LIB . 'php_forms.php';

?>



<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

        <form name="sentMessage" id="contactForm" method='post' action = '../controller/router.php' >
            <div class="control-group">
                <div class="form-group  controls">
                    <label >Ancien mot de passe</label>
                    <input type="password" class="form-control"  id="passwordOld" name='w'  required data-validation-required-message="Please enter">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
                <div class="control-group">
                <div class="form-group  controls">
                    <label >Nouveau mot de passe</label>
                    <input type="password" class="form-control"  id="password" name='password'  required data-validation-required-message="Please enter">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
                <div class="control-group">
                <div class="form-group  controls">
                    <label >Confirmer mot de passe</label>
                    <input type="password" class="form-control"  id="password2" name='password2'  required data-validation-required-message="Please enter">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <input type='hidden' name='type' value='user'>
            <input type='hidden' name='action' value='handleModifyPassword'>

            <div id="success"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Valider</button>
            </div>
        </form>
    </div>
</div>
</div>


<?php include 'fragmentFooter.html'; ?>