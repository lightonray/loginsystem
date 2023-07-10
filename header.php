<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Login in system - OOP PHP</title>
</head>
<body>
    <header>
<nav>
    <ul class="nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Contact</a></li>
      <?php
        if (isset($_SESSION["username"])) {
            ?>
            <li><a class="login-button" href="profile.php"><?php echo $_SESSION["username"] ?></a></li>
            <li><a class="login-button" href="./includes.php/logout.inc.php">Log Out</a></li>
            <?php
        } else {
            ?>
            <li><a class="login-button" href="#">Log In</a></li>
        <?php
        }
        ?>

    </ul>
  </nav>
    </header>