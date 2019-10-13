<?php
session_start(); //STARTING THE SESSION

if ((isset($_SESSION['errFlagPage1'])) && ($_SESSION['errFlagPage1']) == true) { //IF SESSION FLAG IS SET AND IS TRUE
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
                                <form action="./validations/regisvalid.php" method="POST">
                                    <h1>User Information</h1>
                                    <p class="m-0">Please fill out the following fields.</p>



                                    <!--- FIRST NAME & LAST NAME SECTION --->
                                    
                                    <?php if (isset($firstname_error)) {
                                        echo $firstname_error;
                                    } ?>
                                    <?php if (isset($lastname_error)) {
                                        echo $lastname_error;
                                    } ?>

                                    <div class="form-row mt-2">
                                        <div class="form-group col-md-6"><label>First Name</label>
                                            <input class="form-control <?php if (isset($firstname_error)) {
                                                                            echo "is-invalid";
                                                                        } ?>" type="text" name="firstname" value="<?php echo $_SESSION['firstname']; ?>"></div>
                                        <div class="form-group col-md-6"><label>Last Name</label><input class="form-control <?php if (isset($lastname_error)) {
                                                                                                                                echo "is-invalid";
                                                                                                                            } ?>" type="text" name="lastname" value="<?php echo $_SESSION['lastname'] ?>"></div>
                                    </div>


                                    <!--- USERNAME AND EMAIL SECTION --->
                                    
                                    <?php if (isset($username_error)) {
                                        echo $username_error;
                                    } ?>
                                    <?php if (isset($email_error)) {
                                        echo $email_error;
                                    } ?>


                                    <div class="form-row">
                                        <div class="form-group col-md-6"><label>Username</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">@</span>
                                                </div><input class="form-control <?php if (isset($username_error)) {
                                                                                        echo "is-invalid";
                                                                                    } ?>" type="text" name="username" value="<?php echo $_SESSION['username'] ?>">
                                                <div class="input-group-append"></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6"><label>Email Address</label><input class="form-control <?php if (isset($email_error)) {
                                                                                                                                    echo "is-invalid";
                                                                                                                                } ?>" type="text" name="email" value="<?php echo $_SESSION['email'] ?>"></div>
                                    </div>



                                    <!--- PHONE NUMBER SECTION --->
                                   
                                   <?php if (isset($areacode_error)) {
                                        echo $areacode_error;
                                    } ?>
                                    <?php if (isset($phonenumber_error)) {
                                        echo $phonenumber_error;
                                    } ?>


                                    <div class="form-group"><label>Phone Number</label>
                                        <div class="form-row">
                                            <div class="col col-md-5">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">+1</span></div><input class="form-control <?php if (isset($areacode_error)) {
                                                                                                                                    echo "is-invalid";
                                                                                                                                } ?>" type="text" name="areacode" value="<?php echo $_SESSION['areacode'] ?>">
                                                    <div class="input-group-append"></div>
                                                </div>
                                            </div>
                                            <div class="col col-md-7"><input class="form-control <?php if (isset($phonenumber_error)) {
                                                                                                                                    echo "is-invalid";
                                                                                                                                } ?>" type="text" name="phonenumber" value="<?php echo $_SESSION['phonenumber'] ?>"></div>
                                        </div>
                                    </div>



                                    <!--- PASSWORDS SECTION --->

                                    <?php if (isset($password_error)) {
                                        echo $password_error;
                                    } ?>
                                    <?php if (isset($passwordconfirm_error)) {
                                        echo $passwordconfirm_error;
                                    } ?>
                                    <?php if (isset($notmatching_error)) {
                                        echo $notmatching_error;
                                    } ?>


                                    <div class="form-group"><label>Password</label><input class="form-control <?php if (isset($password_error)) {
                                                                                                                                    echo "is-invalid";
                                                                                                                                } ?>" type="password" name="password" value="<?php echo $_SESSION['password'] ?>"></div>
                                    <div class="form-group"><label>Confirm Password</label><input class="form-control <?php if (isset($passwordconfirm_error)) {
                                                                                                                                    echo "is-invalid";
                                                                                                                                } ?>" type="password" name="passwordconfirm" value="<?php echo $_SESSION['passwordconfirm'] ?>"></div>


                                    <!--- CONTINUE BUTTON --->
                                    <input class="btn btn-primary roundbut col-md-12 mt-4" type="submit" name="continue" value="Continue"></input>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="row p-0 bg-light">
                                <div class="col activesection">
                                    <p class="small-text pt-3">1. Customer Information</p>
                                </div>
                                <div class="col">
                                    <p class="small-text pt-3"><a href="./location.php">2. Location of Property</a></p>
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
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>