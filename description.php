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
                                <form>
                                    <h1>Description of Property</h1>
                                    <p></p>
                                    <div class="form-row mt-4">
                                        <div class="form-group col-md-6"><label>Property Type</label>
                                            <div class="dropdown"><button class="btn btn-primary dropdown-toggle col-md-12 btn-dark" data-toggle="dropdown" aria-expanded="false" type="button">Select</button>
                                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Vacant Lot</a><a class="dropdown-item" role="presentation" href="#">Residential</a><a class="dropdown-item" role="presentation" href="#">Commercial</a></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6"><label>Land Size</label>
                                            <div class="input-group"><input class="form-control" type="text">
                                                <div class="input-group-prepend"><span class="input-group-text">acres</span></div>
                                                <div class="input-group-append"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4"><label>Building Type</label>
                                            <div class="dropdown"><button class="btn btn-primary dropdown-toggle col-md-12 btn-dark" data-toggle="dropdown" aria-expanded="false" type="button">Select</button>
                                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Housing</a><a class="dropdown-item" role="presentation" href="#">Apartment</a><a class="dropdown-item" role="presentation" href="#">Town House</a>
                                                    <a
                                                        class="dropdown-item" role="presentation" href="#">Office Space</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4"><label># of Bedrooms</label><input class="form-control" type="number"></div>
                                        <div class="form-group col-md-4"><label># of Bathrooms</label><input class="form-control" type="number"></div>
                                    </div><button class="btn btn-primary roundbut col-md-12 mt-4" type="button">Continue</button></form>
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