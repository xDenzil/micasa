<?php

session_start();

//unset($_SESSION['password']);
//unset($_SESSION['passwordconfirm']);


if ((isset($_SESSION['errFlagPage3'])) && ($_SESSION['errFlagPage3']) == true) { //IF SESSION FLAG IS SET AND IS TRUE
    foreach ($_SESSION as $key => $value) { //USE SESSION VARIABLE AS KEY VARIABLE TO ASSIGN VALUES
        $$key = $value;
    }
}


$expireAfter = 15;

//Check to see if our "last action" session
//variable has been set.
if (isset($_SESSION['last_action'])) {

    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];

    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;


    //Check to see if they have been inactive for too long.
    if ($secondsInactive >= $expireAfterSeconds) {
        //User has been inactive for too long.
        //Kill their session.


        session_unset();
        session_destroy();
        header("Location: ./registration.php");
    }
}

//Assign the current timestamp as the user's
//latest activity
$_SESSION['last_action'] = time();



?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mi Casa</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>
    <div class="home">
        <div class="container p-0">
            <div class="row">
                <div class="col col-lg-5 bg-white mt-5 mb-5 mb-5">
                    <div class="row">
                        <div class="col p-5">
                            <div>
                                <form action="./validations/propertvalid.php" method="POST">
                                    <h1>Description of Property</h1>

                                    <!--- PROPERTY TYPE & LAND SIZE --->



                                    <?php if (isset($property_type_error)) {
                                        echo $property_type_error;
                                    } ?>
                                    <?php if (isset($landsize_error)) {
                                        echo $landsize_error;
                                    } ?>


                                    <div class="form-row mt-4">
                                        <div class="form-group col-md-6"><label>Property Type</label>
                                            <select class="selectpicker" data-style="btn-dark" data-width="100%" name="property_type" title="<?php if ($_SESSION['property_type'] == null) {
                                                                                                                                                    echo 'Select';
                                                                                                                                                } else {
                                                                                                                                                    echo $_SESSION['property_type'];
                                                                                                                                                } ?>">
                                                <option <?php if ($_SESSION['property_type'] == 'Vacant Lot') {
                                                            echo 'selected="selected"';
                                                        } ?>>Vacant Lot</option>
                                                <option <?php if ($_SESSION['property_type'] == 'Residential') {
                                                            echo 'selected="selected"';
                                                        } ?>>Residential</option>
                                                <option <?php if ($_SESSION['property_type'] == 'Commercial') {
                                                            echo 'selected="selected"';
                                                        } ?>>Commercial</option>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-6"><label>Land Size</label>
                                            <div class="input-group"><input type="text" name="landsize" class="form-control <?php if (isset($landsize_error)) {
                                                                                                                                echo "is-invalid";
                                                                                                                            } ?>" type="text" value="<?php echo $_SESSION['landsize'] ?>">
                                                <div class="input-group-prepend"><span class="input-group-text">acres</span></div>
                                                <div class="input-group-append"></div>
                                            </div>
                                        </div>
                                    </div>



                                    <!--- BUILDING TYPE, BEDROOMS AND BATHROOMS --->

                                    <?php if (isset($building_type_error)) {
                                        echo $building_type_error;
                                    } ?>
                                    <?php if (isset($bedrooms_error)) {
                                        echo $bedrooms_error;
                                    } ?>
                                    <?php if (isset($bathrooms_error)) {
                                        echo $bathrooms_error;
                                    } ?>




                                    <div class="form-row">
                                        <div class="form-group col-md-4"><label>Building Type</label>
                                            <select class="selectpicker" data-style="btn-dark" data-width="100%" name="building_type" title="<?php if ($_SESSION['building_type'] == null) {
                                                                                                                                                    echo 'Select';
                                                                                                                                                } else {
                                                                                                                                                    echo $_SESSION['building_type'];
                                                                                                                                                } ?>">
                                                <option <?php if ($_SESSION['building_type'] == 'Housing') {
                                                            echo 'selected="selected"';
                                                        } ?>>Housing</option>
                                                <option <?php if ($_SESSION['building_type'] == 'Apartment') {
                                                            echo 'selected="selected"';
                                                        } ?>>Apartment</option>
                                                <option <?php if ($_SESSION['building_type'] == 'Town House') {
                                                            echo 'selected="selected"';
                                                        } ?>>Town House</option>
                                                <option <?php if ($_SESSION['building_type'] == 'Office Space') {
                                                            echo 'selected="selected"';
                                                        } ?>>Office Space</option>
                                                <option <?php if ($_SESSION['building_type'] == 'None') {
                                                            echo 'selected="selected"';
                                                        } ?>>None</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4"><label># of Bedrooms</label><input type="number" name="bedrooms" min="0" class="form-control <?php if (isset($bedrooms_error)) {
                                                                                                                                                                            echo "is-invalid";
                                                                                                                                                                        } ?>" type="text" value="<?php if (!isset($_SESSION['bedrooms'])) {
                                                                                                                                                                                                        echo '0';
                                                                                                                                                                                                    } else {
                                                                                                                                                                                                        echo $_SESSION['bedrooms'];
                                                                                                                                                                                                    } ?>"></div>
                                        <div class="form-group col-md-4"><label># of Bathrooms</label><input type="number" name="bathrooms" min="0" class="form-control <?php if (isset($bathrooms_error)) {
                                                                                                                                                                            echo "is-invalid";
                                                                                                                                                                        } ?>" type="text" value="<?php if (!isset($_SESSION['bathrooms'])) {
                                                                                                                                                                            echo '0';
                                                                                                                                                                        } else {
                                                                                                                                                                            echo $_SESSION['bathrooms'];
                                                                                                                                                                        } ?>"></div>
                                    </div>


                                    <!-- test -->

                                    <?php if (isset($listing_type_error)) {
                                        echo $listing_type_error;
                                    } ?>

                                    <?php if (isset($price_error)) {
                                        echo $price_error;
                                    } ?>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>ListingType</label>
                                            <select class="selectpicker" data-style="btn-dark" data-width="100%" name="listing_type" title="<?php if ($_SESSION['listing_type'] == null) {
                                                                                                                                                echo 'Select';
                                                                                                                                            } else {
                                                                                                                                                echo $_SESSION['listing_type'];
                                                                                                                                            } ?>">
                                                <option <?php if ($_SESSION['listing_type'] == 'Rent') {
                                                            echo 'selected="selected"';
                                                        } ?>>Rent</option>
                                                <option <?php if ($_SESSION['listing_type'] == 'Purchase') {
                                                            echo 'selected="selected"';
                                                        } ?>>Purchase</option>
                                                <option <?php if ($_SESSION['listing_type'] == 'Lease') {
                                                            echo 'selected="selected"';
                                                        } ?>>Lease</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6"><label>Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span></div><input type="text" name="price" class="form-control <?php if (isset($price_error)) {
                                                                                                                                                            echo "is-invalid";
                                                                                                                                                        } ?>" type="text" value="<?php echo $_SESSION['price'] ?>">
                                            </div>
                                        </div>
                                    </div>






                                    <input class=" btn btn-primary roundbut col-md-12 mt-4" role="button" href="./registerproperty.php" name="finish" type="submit" value="Finish"></input>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                            <div class="row p-0 bg-light">
                                <div class="col">
                                    <p class="small-text pt-3"><a href="./registration.php">1. Customer Information</a></p>
                                </div>
                                <div class="col">
                                    <p class="small-text pt-3"><a href="./location.php">2. Location of Property</a></p>
                                </div>
                                <div class="col activesection">
                                    <p class="small-text pt-3">3. Property Description</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-none"></div>
            </div>
        </div>
    </div>
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>