<?php

// Grabbing data
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $signupusername = htmlspecialchars($_POST['signupusername']);
    $signuppassword = htmlspecialchars($_POST['signuppassword']);
    $confirmpassword = htmlspecialchars($_POST['confirmpassword']);
    $signupemail = htmlspecialchars($_POST['signupemail']);
}

// Instaniate SignupContr class
include '../classes.php/dbh.classes.php';
include '../classes.php/signup.classes.php';
include '../classes.php/signup.contr.classes.php';
$signup = new SignupContr($signupusername,$signuppassword,$confirmpassword,$signupemail);

// Runnning error handlers and user signup
$signup->signUp();

$userId = $signup->fetchUserId($signupusername);
// Instaniate SignupContr class
include '../classes.php/profileinfo.classes.php';
include '../classes.php/profileinfo.contr.classes.php';


$profileinfo = new ProfileInfoContr($userId,$signupusername);

$profileinfo->defaultProfileInfo();





// Going back to front page
header("location: ../index.php?error=none");