<?php

class Login extends Dbh {
    

    protected function getUser($signupusername,$signuppassword){
        $stmt = $this->connect()->prepare('SELECT pwd FROM users WHERE username = ? OR email = ?;');

        if(!$stmt->execute(array($signupusername,$signuppassword))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }


        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();  
        }


        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $checkPwd = password_verify($signuppassword, $pwdHashed[0]["pwd"]);


        if($checkPwd == false){
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();  
        }
        elseif($checkPwd == true)
        {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR email = ? AND pwd = ?;');

            if(!$stmt->execute(array($signupusername,$signupusername,$signuppassword))){
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();  
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();

            $_SESSION["user_id"] = $user[0]["user_id"];
            $_SESSION["username"] = $user[0]["username"];
        }


        $stmt = null;
    }
}
