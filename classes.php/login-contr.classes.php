<?php

class LoginContr extends Login {
    
    private $signupusername;
    private $signuppassword;

    public function __construct($signupusername,$signuppassword)
    {
        $this->signupusername = $signupusername;
        $this->signuppassword = $signuppassword;
    }

    public function logIn() {
        if($this->emptyInput() == false) {
            // echo "Empty Input";
            header("location:../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->signupusername,$this->signuppassword);
        
    }

    private function emptyInput() {
        $result = false;
        if(empty($this->signupusername) || empty($this->signuppassword)) {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

   

    
}