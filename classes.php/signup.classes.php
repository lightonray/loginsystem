<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class Signup extends Dbh {
    

    protected function setUser($signupusername,$signuppassword,$signupemail){
        $stmt = $this->connect()->prepare('INSERT INTO users (username,pwd,email) VALUES (?,?,?);');

        $hashedPwd = password_hash($signuppassword, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($signupusername,$hashedPwd,$signupemail))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function userCheck($signupusername,$signupemail){
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        if(!$stmt->execute(array($signupusername,$signupemail))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }


        $resultcheck = null;
        if($stmt->rowCount() > 0){
            $resultcheck = false;
        }
        else{
            $resultcheck = true;
        }
        return $resultcheck;
    }

    protected function getUserId($username){
        $stmt = $this->connect()->prepare('SELECT user_id FROM users WHERE username =?;');

        if(!$stmt->execute(array($username))){
            $stmt = null;
            header("location: profile.php?error=stmtfailed");
            exit();
        }
       if($stmt-> rowCount() == 0){
         $stmt = null;
         header("location: profile.php?error=profilenotfound");
         exit();
       }

       $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);

       return $profileData;
    }
}
