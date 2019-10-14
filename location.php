<?php

session_start();

//unset($_SESSION['password']);
//unset($_SESSION['passwordconfirm']);


if ((isset($_SESSION['errFlagPage2'])) && ($_SESSION['errFlagPage2']) == true) { //IF SESSION FLAG IS SET AND IS TRUE
    foreach ($_SESSION as $key => $value) { //USE SESSION VARIABLE AS KEY VARIABLE TO ASSIGN VALUES
        $$key = $value;
    }
}


$expireAfter = 15;
 
//Check to see if our "last action" session
//variable has been set.
if(isset($_SESSION['last_action'])){
    
    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];
    
    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;

    
    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
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
                                <form action="./validations/locatevalid.php" method="POST">
                                    <h1>Location of Property</h1>
                                    <p>So, where is it?</p>

                                    <!--- ADDRESS LINE 1 --->

                                    <?php if (isset($address1_error)) {
                                        echo $address1_error;
                                    } ?>


                                    <div class="form-group mt-4"><label>Address Line 1</label><input class="form-control <?php if (isset($address1_error)) {
                                                                                                                                echo "is-invalid";
                                                                                                                            } ?>" type="text" name="address1" value="<?php echo $_SESSION['address1'] ?>"></div>

                                    <!--- ADDRESS LINE 2 --->

                                    <?php if (isset($address2_error)) {
                                        echo $address2_error;
                                    } ?>

                                    <div class="form-group"><label>Address Line 2</label><input class="form-control <?php if (isset($address2_error)) {
                                                                                                                        echo "is-invalid";
                                                                                                                    } ?>" type="text" name="address2" value="<?php echo $_SESSION['address2'] ?>"></div>

                                    <!--- CITY & PARISH SECTION --->


                                    <?php if (isset($city_error)) {
                                        echo $city_error;
                                    } ?>

                                    <?php if (isset($parish_error)) {
                                        echo $parish_error;
                                    } ?>

                                    <div class="form-row">
                                        <div class="form-group col-md-6"><label>City</label><input class="form-control <?php if (isset($city_error)) {
                                                                                                                            echo "is-invalid";
                                                                                                                        } ?>" type="text" name="city" value="<?php echo $_SESSION['city'] ?>"></div>
                                        <div class="form-group col-md-6"><label>Parish</label>
                                            <!-- <div class="dropdown"><button class="btn btn-primary dropdown-toggle col-md-12 btn-dark" data-toggle="dropdown" aria-expanded="false" type="button">Select Parish</button>
                                                <div class="dropdown-menu" name="parish-dropdown" id="parish-dropdown" role="menu"><a class="dropdown-item" role="presentation" href="#">Kingston</a><a class="dropdown-item" role="presentation" href="#">St. Andrew</a><a class="dropdown-item" role="presentation" href="#">Portland</a>
                                                    <a class="dropdown-item" role="presentation" href="#">St. Thomas</a><a class="dropdown-item" role="presentation" href="#">St. Catherine</a><a class="dropdown-item" role="presentation" href="#">St. Mary</a><a class="dropdown-item" role="presentation" href="#">St. Ann</a>
                                                    <a class="dropdown-item" role="presentation" href="#">Manchester</a><a class="dropdown-item" role="presentation" href="#">Clarendon</a><a class="dropdown-item" role="presentation" href="#">Hanover</a><a class="dropdown-item" role="presentation" href="#">Westmoreland</a>
                                                    <a class="dropdown-item" role="presentation" href="#">St. James</a><a class="dropdown-item" role="presentation" href="#">Trelawny</a><a class="dropdown-item" role="presentation" href="#">St. Elizabeth</a></div>
                                            </div> -->

                                            <select class="selectpicker" data-style="btn-dark" data-width="100%" name="parish" title="<?php if($_SESSION['parish']==null){echo 'Select Parish';}else{echo $_SESSION['parish'];} ?>">
                                                <option <?php if($_SESSION['parish']=='Kingston & St. Andrew'){echo 'selected="selected"';}?>>Kingston & St. Andrew</option>
                                                <option <?php if($_SESSION['parish']=='Portland'){echo 'selected="selected"';}?>>Portland</option>
                                                <option <?php if($_SESSION['parish']=='St. Thomas'){echo 'selected="selected"';}?>>St. Thomas</option>
                                                <option <?php if($_SESSION['parish']=='St. Catherine'){echo 'selected="selected"';}?>>St. Catherine</option>
                                                <option <?php if($_SESSION['parish']=='St. Mary'){echo 'selected="selected"';}?>>St. Mary</option>
                                                <option <?php if($_SESSION['parish']=='St. Ann'){echo 'selected="selected"';}?>>St. Ann</option>
                                                <option <?php if($_SESSION['parish']=='Manchester'){echo 'selected="selected"';}?>>Manchester</option>
                                                <option <?php if($_SESSION['parish']=='Clarendon'){echo 'selected="selected"';}?>>Clarendon</option>
                                                <option <?php if($_SESSION['parish']=='Hanover'){echo 'selected="selected"';}?>>Hanover</option>
                                                <option <?php if($_SESSION['parish']=='Westmoreland'){echo 'selected="selected"';}?>>Westmoreland</option>
                                                <option <?php if($_SESSION['parish']=='St. James'){echo 'selected="selected"';}?>>St. James</option>
                                                <option <?php if($_SESSION['parish']=='Trelawny'){echo 'selected="selected"';}?>>Trelawny</option>
                                                <option <?php if($_SESSION['parish']=='St. Elizabeth'){echo 'selected="selected"';}?>>St. Elizabeth</option>
                                            </select>


                                        </div>
                                    </div><input class=" btn btn-primary roundbut col-md-12 mt-4" role="button" href="./description.php" name="continuelocate" type="submit" value="Continue"></input>
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
                                <div class="col activesection">
                                    <p class="small-text pt-3">2. Location of Property</p>
                                </div>
                                <div class="col">
                                    <p class="small-text pt-3"><a href="./description.php">3. Property Description</a>
                                    </p>
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