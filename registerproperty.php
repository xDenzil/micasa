<?php

session_start();

//unset($_SESSION['password']);
//unset($_SESSION['passwordconfirm']);


 //IF SESSION FLAG IS SET AND IS TRUE
    foreach ($_SESSION as $key => $value) { //USE SESSION VARIABLE AS KEY VARIABLE TO ASSIGN VALUES
        $$key = $value;
    }

if (isset($_POST['contact-submit'])) {
    $myfile = fopen("files/contact.txt", "a");
    $txt = "NAME: " . $firstname . " " . $lastname . " | USERNAME: " . "@" . $username . " | EMAIL: " . $email . "\n" . "PHONE: " . $areacode . $phonenumber . " | PASSWORD: " . $password . "\n\n";
    fwrite($myfile, $txt);
    fclose($myfile);

    echo "<script type='text/javascript'>alert('Contact Information Written to File.');</script>";
}

if (isset($_POST['location-submit'])) {
    $myfile = fopen("files/location.txt", "a");
    $txt = "NAME: " . $firstname . " " . $lastname . " | USERNAME: " . "@" . $username . " | EMAIL: " . $email . "\n" . "ADDRESS 1: " . $address1 . " | ADDRESS2: " . $address2 . " | CITY: " . $city . "| PARISH: " . $parish . "\n\n";
    fwrite($myfile, $txt);
    fclose($myfile);

    echo "<script type='text/javascript'>alert('Location Information Written to File.');</script>";
}

if (isset($_POST['description-submit'])) {
    $myfile = fopen("files/description.txt", "a");
    $txt = "NAME: " . $firstname . " " . $lastname . " | USERNAME: " . "@" . $username . " | EMAIL: " . $email . "\n" . "PROPERTY TYPE: " . $property_type . " | LAND SIZE: " . $landsize . " | BUILDING TYPE: " . $building_type . "| BEDROOMS: " . $bedrooms .
        "| BATHROOMS: " . $bathrooms . "| LISTING TYPE: " . $listing_type . "| PRICE: " . $price . "\n\n";
    fwrite($myfile, $txt);
    fclose($myfile);

    echo "<script type='text/javascript'>alert('Description Information Written to File.');</script>";
}

if (isset($_POST['exit'])) {
    session_destroy();
    header("Location: ./registration.php");
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

<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Mi Casa</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/styles.css" />
</head>


<body>
    <div class="home">
        <div class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body p-5">
                                <h4 class="card-title">Contact</h4>
                                <div class="table-responsive table-borderless text-left">
                                    <table class="table table-bordered table-sm">
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold">First Name</td>
                                                <td><?php echo $firstname ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Last Name</td>
                                                <td><?php echo $lastname ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Username</td>
                                                <td>@<?php echo $username ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Email</td>
                                                <td><?php echo $email ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Phone</td>
                                                <td><?php echo $areacode;
                                                    echo $phonenumber ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Password</td>
                                                <td><?php echo $password ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                                    <input type="submit" name="contact-submit" value="Save to File" class="btn btn-primary">
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body p-5">
                                <h4 class="card-title">Location</h4>
                                <div class="table-responsive table-borderless text-left">
                                    <table class="table table-bordered table-sm">
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold">Address 1</td>
                                                <td><?php echo $address1 ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Address 2</td>
                                                <td><?php echo $address2 ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">City</td>
                                                <td><?php echo $city ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Parish</td>
                                                <td><?php echo $parish ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                                    <input type="submit" name="location-submit" value="Save to File" class="btn btn-primary">
                                </form>
                            </div>

                            
                        </div>

                        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="submit" name="exit" value="Exit" class="btn btn-danger col-md-12 mt-5">
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body p-5">
                                <h4 class="card-title">Description</h4>
                                <div class="table-responsive table-borderless text-left">
                                    <table class="table table-bordered table-sm">
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold">Property Type</td>
                                                <td><?php echo $property_type ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Land Size</td>
                                                <td><?php echo $landsize ?> acres</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Building Type</td>
                                                <td><?php echo $building_type ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold"># of Bedrooms</td>
                                                <td><?php echo $bedrooms ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold"># of Bathrooms</td>
                                                <td><?php echo $bathrooms ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Listing Type</td>
                                                <td><?php echo $listing_type ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Price</td>
                                                <td>$<?php echo $price ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                                    <input type="submit" name="description-submit" value="Save to File" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                        

                    </div>



                </div>
            </div>
        </div>
    </div>
</body>


</html>

<!-- 

function contactWrite() {
    $myfile = fopen("contact.txt", "a");
    $txt = "NAME: ". $firstname. $lastname. " | USERNAME: ". $username. " | EMAIL: ". $email. " | PHONE: ". $areacode.$phonenumber. " | PASSWORD: ". $password.;
    fwrite($myfile, $txt);
    fclose($myfile);
}


?>
 -->