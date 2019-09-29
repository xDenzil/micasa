<?php

session_start();




if (isset($_POST['continue'])) {
    foreach ($_POST as $key => $value) {
        $$key = $value;
        $_SESSION[$key] = $value;
    }


    // ADDRESS LINE 1 VALIDATION
    if (empty($_POST['address1'])) {
        $_SESSION['address1'] = null;
        $_SESSION['address1_error'] = "<span class='error small-text'>* Please enter your address. </span>";
        $_SESSION['errFlag9'] = true;
    } else if (!preg_match("/^[a-zA-Z0-9 ]{3,}$/", $_POST['address1'])) {
        $_SESSION['address1_error'] = "<span class='error small-text'>* Invalid address.</span>";
        $_SESSION['address1'] = $_POST['address1'];
        $_SESSION['errFlag9'] = true;
    } else {
        $_SESSION['address1'] = $_POST['address1'];
        $_SESSION['address1_error'] = null;
        $_SESSION['errFlag9'] = false;
    }

     // ADDRESS LINE 2 VALIDATION
     if (empty($_POST['address2'])) {
        $_SESSION['address2'] = null;
        $_SESSION['errFlag11'] = false;
        $_SESSION['address2_error'] = null;
    } else if (!preg_match("/^[a-zA-Z0-9 ]{3,}$/", $_POST['address2'])) {
        $_SESSION['address2_error'] = "<span class='error small-text'>* Invalid address.</span>";
        $_SESSION['address2'] = $_POST['address2'];
        $_SESSION['errFlag11'] = true;
    } else {
        $_SESSION['address2'] = $_POST['address2'];
        $_SESSION['address2_error'] = null;
        $_SESSION['errFlag11'] = false;
    }


    // CITY VALIDATION
    if (empty($_POST['city'])) {
        $_SESSION['city'] = null;
        $_SESSION['city_error'] = "<span class='error small-text'>* Please enter your city. </span>";
        $_SESSION['errFlag10'] = true;
    } else if (!preg_match("/^[a-zA-Z0-9 ]{3,}$/", $_POST['city'])) {
        $_SESSION['city_error'] = "<span class='error small-text'>* Invalid city. </span>";
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['errFlag10'] = true;
    } else {
        $_SESSION['city'] = $_POST['city'];
        $_SESSION['city_error'] = null;
        $_SESSION['errFlag10'] = false;
    }



    if (($_SESSION['errFlag9'] == true) || ($_SESSION['errFlag10'] == true) || ($_SESSION['errFlag11'] == true)) {
        $_SESSION['errFlagPage2'] = true;
        header("Location: ../location.php");
    } else {
        header("Location: ../description.php");
    }
}
