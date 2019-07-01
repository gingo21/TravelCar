
<?php
include 'fragmentHeader.html';
include 'fragmentMenuClient.php';
require CHEMIN_LIB . 'php_forms.php';
?>


    <div class="col-lg-8 col-md-10 mx-auto">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Parking</th>
                    <th scope="col">Aéroport</th>
                    <th scope="col">Prix à la journée</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomParking = array();
                $size = count($resultsParking);
                for ($i = 0; $i < $size; ++$i) {
                    if ($type == 'car') {
                        $resultsParking[$i]->viewParkingCar($resultsCarsByParking[$i]);
                    } else {
                        $resultsParking[$i]->viewParking();
                    }
                    array_push($nomParking, $resultsParking[$i]->getLabel());
                }
                ?>
            </tbody>


        </table>
        <form class = "form-inline" action = "../controller/router.php" method = "post">
            <?php
            form_select("Choisissez le parking", "sel_parking", $nomParking);
            ?>
            <button type="submit" class="btn btn-default">Submit</button>
            <?php
            if ($type == 'car') {
                echo " <input type='hidden' name='type' value='reserveCar'>";
                echo "<input type='hidden' name='action' value='choixVoiture'>";
            } else {
                echo " <input type='hidden' name='type' value='reservation'>";
                echo "<input type='hidden' name='action' value='choixVoiture'>";
            }
            ?>

        </form>
    </div>


<?php include 'fragmentFooter.html'; ?>
