<?php


session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id = $_SESSION["user_id"];
    $user = $_SESSION["username"];

    
    $title = $_POST["title"];
    $intro = $_POST["intro"];
    $about = $_POST["about"];


    include '../classes.php/dbh.classes.php';
    include '../classes.php/profileinfo.classes.php';
    include '../classes.php/profileinfo.contr.classes.php';

    $profileInfo = new ProfileInfoContr($id,$user);

    $profileInfo->updateProfileInfo($about,$title,$intro);


    header("location: ../profile.php?error=none");
}