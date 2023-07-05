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
<nav>
    <ul class="nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Contact</a></li>
      <?php
        if (isset($_SESSION["username"])) {
            ?>
            <li><a class="login-button" href="#"><?php echo $_SESSION["username"] ?></a></li>
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

<div class="container">
        <div class="form-wrapper">
            <h2>Login</h2>
            <form action="./includes.php/login.inc.php" method="post">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">

                <label for="password">Password</label>
                <input type="password" id="password" name="password">

                <button type="submit" name="submit">LOG IN </button>
            </form>

        </div>
        <div class="form-wrapper">
            <h2>Sign Up</h2>
            <form action="./includes.php/signup.inc.php" method="post">
                <label for="signup-username">Username</label>
                <input type="text" id="signup-username" name="signupusername">

                <label for="signup-password">Password</label>
                <input type="password" id="signup-password" name="signuppassword">

                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirmpassword">

                <label for="signup-email">Email</label>
                <input type="text" id="signup-email" name="signupemail">

                <button type="submit" name="submit">SIGN UP</button>
            </form>
        </div>
    </div>
</body>
</html>