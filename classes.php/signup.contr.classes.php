<?php

class SignupContr extends Signup {
    
    private $signupusername;
    private $signuppassword;
    private $confirmpassword;
    private $signupemail;


    public function __construct($signupusername,$signuppassword,$confirmpassword,$signupemail)
    {
        $this->signupusername = $signupusername;
        $this->signuppassword = $signuppassword;
        $this->confirmpassword = $confirmpassword;
        $this->signupemail = $signupemail;
    }

    public function signUp() {
        if($this->emptyInput() == false) {
            // echo "Empty Input";
            header("location:../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidUsername() == false) {
            // echo "Invalid Username";
            header("location:../index.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false) {
            // echo "Invalid Email";
            header("location:../index.php?error=email");
            exit();
        }
        if($this->passwordMatch() == false) {
            // echo "Password does not match";
            header("location:../index.php?error=passwordmatch");
            exit();
        }
        if($this->usernameCheck() == false) {
            // echo "Username or email taken";
            header("location:../index.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->signupusername,$this->signuppassword,$this->signupemail);
        
    }

    private function emptyInput() {
        $result = false;
        if(empty($this->signupusername) || empty($this->signuppassword) || empty($this->confirmpassword) ||  empty($this->signupemail)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function invalidUsername(){
        $result = false;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->signupusername)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(){
        $result = false;
        if(!filter_var($this->signupemail,FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function passwordMatch(){
        $result = false;
        if($this->signuppassword !== $this->confirmpassword) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function usernameCheck(){ 
        $result = false;     
        if(!$this->usercheck($this->signupusername,$this->signupemail)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
  
    public function fetchUserId($signupusername){
        $userId = $this->getUserId($signupusername);
        return $userId[0]["user_id"];
    }
}
