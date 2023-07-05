<?php

// Grabbing data
if(isset($_POST['submit'])){
    $signupusername = $_POST['username'];
    $signuppassword = $_POST['password'];
}

// Instaniate SignupContr class
include '../classes.php/dbh.classes.php';
include '../classes.php/login.classes.php';
include '../classes.php/login-contr.classes.php';
$login = new LoginContr($signupusername,$signuppassword);

// Runnning error handlers and user signup
$login->logIn();

// Going back to front page

header("location: ../index.php?error=none");