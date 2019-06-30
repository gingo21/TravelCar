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
                    <label >Nom du parking</label>
                    <input type="text" class="form-control"  id="label" name='label'  required data-validation-required-message="Please enter">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
<?php
form_select("Sélection aéroport", "sel_airport", $results);
?>
            <div class="control-group">
                <div class="form-group controls">
                    <label> Prix de location d'une place à la journée</label>
                    <input type="number" class="form-control"  id="price" name ='price' required data-validation-required-message="Please enter">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
                        <div class="control-group">
                <div class="form-group controls">
                    <label> Nombre  Maximum de places</label>
                    <input type="number" class="form-control"  id="places" name ='places' required data-validation-required-message="Please enter">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <input type='hidden' name='type' value='admin'>
            <input type='hidden' name='action' value='insertParking'>

            <div id="success"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
            </div>
        </form>
        
    </div>
</div>
</div>


<?php include 'fragmentFooter.html'; ?>