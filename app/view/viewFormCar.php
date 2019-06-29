<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require ('fragmentHeader.html');


include 'fragmentMenuClient.php';
require CHEMIN_LIB . 'php_forms.php';
?>
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

        <form name="sentMessage" id="contactForm" method='post' action = '../controller/router.php' >
            <div class="control-group">
                <div class="form-group  controls">
                    <label for="plate_id">Email address</label>
                    <input type="text" class="form-control"  id="plate_id" placeholder="Plaque d'immatriculation" name='plate_id' required data-validation-required-message="Please enter">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
            </div>
            Ï <div class="form-group  controls">
                <label>Marque </label>
                <input type="text" class="form-control"  id="brand" name='brand' placeholder="Marque" required data-validation-required-message="Please enter">
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
                <div class="form-group controls">
                    <label>Modele </label>
                    <input type="text" class="form-control"  id="modele" name ='modele' placeholder="Modele" required data-validation-required-message="Please enter">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <input tyoe='hidden' name='type' value='user'>
            <input type='hidden' name='action' value='handleCarForm'>

            <div id="success"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
            </div>
        </form>
    </div>
</div>
</div>

<?php
include 'fragmentFooter.html';
