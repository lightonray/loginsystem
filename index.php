<?php
include_once "./header.php";
?>

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