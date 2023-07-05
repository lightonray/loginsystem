<?php

// Grabbing data
if(isset($_POST['submit'])){
    $signupusername = $_POST['signupusername'];
    $signuppassword = $_POST['signuppassword'];
    $confirmpassword = $_POST['confirmpassword'];
    $signupemail = $_POST['signupemail'];
}

// Instaniate SignupContr class
include '../classes.php/dbh.classes.php';
include '../classes.php/signup.classes.php';
include '../classes.php/signup.contr.classes.php';
$signup = new SignupContr($signupusername,$signuppassword,$confirmpassword,$signupemail);

// Runnning error handlers and user signup
$signup->signUp();

// Going back to front page

header("location: ../index.php?error=none");