<?php


session_start(); // CONTINUING SESSION

// DECLARING VARIABLES





if (isset($_POST['continue'])) { //IF CONTINUE BUTTON IS PRESSED
    //session_destroy();
    foreach ($_POST as $key => $value) {
        $$key = $value;
        $_SESSION[$key] = $value;
    }

    

    // FIRST NAME VALIDATION
    if (empty($_POST['firstname'])) {
        $_SESSION['firstname_error'] = "<span class='error small-text'>* Please enter your first name. </span>";
        $_SESSION['firstname'] = null;
        $_SESSION['errFlag0'] = true;
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $_POST['firstname'])) {
            $_SESSION['firstname_error'] = "<span class='error small-text'>* Invalid first name. </span>";
            $_SESSION['firstname'] = $_POST['firstname'];
            $_SESSION['errFlag0'] = true;
        } else if (strlen($_POST['firstname']) < 3) {
            $_SESSION['firstname_error'] = "<span class='error small-text'>* First name must be more than 3 characters long. </span>";
            $_SESSION['firstname'] = $_POST['firstname'];
            $_SESSION['errFlag0'] = true;
        } else {
            $_SESSION['first_name'] = $_POST['firstname'];
            $_SESSION['firstname_error'] = null;
            $_SESSION['errFlag0'] = false;
        }
    }



    // LAST NAME VALIDATION
    if (empty($_POST['lastname'])) {
        $_SESSION['lastname_error'] = "<span class='error small-text'>* Please enter your last name. </span>";
        $_SESSION['lastname'] = null;
        $_SESSION['errFlag1'] = true;
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $_POST['lastname'])) {
            $_SESSION['lastname_error'] = "<span class='error small-text'>* Invalid last name. </span>";
            $_SESSION['lastname'] = $_POST['lastname'];
            $_SESSION['errFlag1'] = true;
        } else if (strlen($_POST['lastname']) < 3) {
            $_SESSION['lastname_error'] = "<span class='error small-text'>* Last name must be more than 3 characters long. </span>";
            $_SESSION['lastname'] = $_POST['lastname'];
            $_SESSION['errFlag1'] = true;
        } else {
            $_SESSON['lastname'] = $_POST['lastname'];
            $_SESSION['lastname_error'] = null;
            $_SESSION['errFlag1'] = false;
        }
    }


    // USERNAME VALIDATION
    if (empty($_POST['username'])) {
        $_SESSION['username_error'] = "<span class='error small-text'>* Please enter a username. </span>";
        $_SESSION['username'] = null;
        $_SESSION['errFlag2'] = true;
    } else if (!preg_match("/^[a-zA-Z0-9_-]{3,16}$/", $_POST['username'])) {
        $_SESSION['username_error'] = "<span class='error small-text'>* Username is invalid. 3 to 16 characters, letters, numbers, underscore and hyphen accepted. </span>";
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['errFlag2'] = true;
    } else {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['username_error'] = null;
        $_SESSION['errFlag2'] = false;
    }

    // EMAIL ADDRESS VALIDATION
    if (empty($_POST['email'])) {
        $_SESSION['email_error'] = "<span class='error small-text'>* Please enter your email address. </span>";
        $_SESSION['email'] = null;
        $_SESSION['errFlag3'] = true;
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email_error'] = "<span class='error small-text'>* Invalid email address. </span>";
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['errFlag3'] = true;
    } else {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['email_error'] = null;
        $_SESSION['errFlag3'] = false;
    }

    // PHONE NUMBER VALIDATION
    if (empty($_POST['areacode'])) {
        $_SESSION['areacode_error'] = "<span class='error small-text'>* Please enter the area code. </span>";
        $_SESSION['areacode'] = null;
        $_SESSION['errFlag4'] = true;
        $phoneNumberCorrect = false;
    } else if (!preg_match("/^$|^\d{3}$/", $_POST['areacode'])) {
        $_SESSION['areacode_error'] = "<span class='error small-text'>* Invalid area code. </span>";
        $_SESSION['areacode'] = $_POST['areacode'];
        $_SESSION['errFlag4'] = true;
    } else {
        $_SESSION['areacode_error'] = null;
        $phoneNumberCorrect = true;
        $_SESSION['errFlag4'] = false;
    }
    if (empty($_POST['phonenumber'])) {
        $_SESSION['phonenumber_error'] = "<span class='error small-text'>* Please enter phone number. </span>";
        $_SESSION['phonenumber'] = null;
        $_SESSION['errFlag5'] = true;
        $phoneNumberCorrect = false;
    } else if (!preg_match("/^$|^\d{7}$/", $_POST['phonenumber'])) { 
        $_SESSION['phonenumber_error'] = "<span class='error small-text'>* Invalid phone number. </span>";
        $_SESSION['phonenumber'] = $_POST['phonenumber'];
        $_SESSION['errFlag5'] = true;
    } else {
        $_SESSION['phonenumber_error'] = null;
        $phoneNumberCorrect = true;
        $_SESSION['errFlag5'] = false;
    }



    // PASSWORD VALIDATION


    if (empty($_POST['password'])) { // If password is empty
        $_SESSION['password_error'] = "<span class='error small-text'>* Please enter a password. </span>";
        $_SESSION['password'] = null;
        $_SESSION['errFlag6'] = true;
        $_SESSION['notmatching_error'] = null;
    } else if (!preg_match("/[a-zA-Z0-9]{6,}/", $_POST['password'])) { 
        $_SESSION['password_error'] = "<span class='error small-text'>* Password must be at least 6 characters long. </span>";
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['errFlag6'] = true;
    } else { // If password is not empty check confirm password
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['password_error'] = null;
        $_SESSION['errFlag6'] = false;
        $_SESSION['notmatching_error'] = null;

        if (empty($_POST['passwordconfirm'])) { // If confirm password is empty
            $_SESSION['passwordconfirm_error'] = "<span class='error small-text'>* Please confirm your password. </span>";
            $_SESSION['passwordconfirm'] = null;
            $_SESSION['errFlag7'] = true;
        } else { // If confirm password is not empty, compare both passwords
            $_SESSION['passwordconfirm'] = $_POST['passwordconfirm'];
            $_SESSION['passwordconfirm_error'] = null;
            $_SESSION['errFlag7'] = false;

            if (($_SESSION['password']) == ($_SESSION['passwordconfirm'])) {
                $_SESSION['validatedpassword'] = $_POST['password'];
                $_SESSION['errFlag8'] = false;
            } else {
                $_SESSION['notmatching_error'] = "<span class='error small-text'>* Passwords do not match. Re-enter. </span>";
                $_SESSION['password'] = null;
                $_SESSION['passwordconfirm'] = null;
                $_SESSION['errFlag8'] = true;
            }
        }
    }



    // FORM VALIDATION - Return current page if errors, progress if none.
    if (($_SESSION['errFlag0'] == true) || ($_SESSION['errFlag1'] == true) || ($_SESSION['errFlag2'] == true) 
    || ($_SESSION['errFlag3'] == true) || ($_SESSION['errFlag4'] == true) || ($_SESSION['errFlag5'] == true) 
    || ($_SESSION['errFlag6'] == true) || ($_SESSION['errFlag7'] == true) || ($_SESSION['errFlag8'] == true)) {
        $_SESSION['errFlagPage1'] = true;
        header("Location: ../registration.php");
    } else {
        $_SESSION['errFlagPage1'] = false;
        header("Location: ../location.php");
    }
}
