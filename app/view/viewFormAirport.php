<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'fragmentHeader.html';
include 'fragmentMenuAdmin.php';

?>

<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

        <form name="sentMessage" id="contactForm" method='post' action = '../controller/router.php' >
            <div class="control-group">
                <div class="form-group  controls">
                    <label for="plate_id">Acronym</label>
                    <input type="text" class="form-control"  id="acronym"  name='acronym' required data-validation-required-message="Please enter">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
            </div>
            <div class="form-group  controls">
                <label>Ville </label>
                <input type="text" class="form-control"  id="ville" name='ville'  required data-validation-required-message="Please enter">
                <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
                <div class="form-group controls">
                    <label>Nom aéroport </label>
                    <input type="text" class="form-control"  id="airport" name ='airport' required data-validation-required-message="Please enter">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <input type='hidden' name='type' value='admin'>
            <input type='hidden' name='action' value='insertAirport'>

            <div id="success"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
            </div>
        </form>
    </div>
</div>
</div>


<?php include 'fragmentFooter.html'; ?>