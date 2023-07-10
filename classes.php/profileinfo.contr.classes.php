<?php

class ProfileInfoContr extends ProfileInfo {
    
    private $userId;
    private $username;

    public function __construct($userId,$username)
    {
        $this->userId = $userId;
        $this->username = $username;
    }

    public function defaultProfileInfo(){
        $profileAbout = "Tell people about yourself!";
        $profileTitle = "Hi I am"." ".$this->username;
        $profileText = "Welcome to my page";
        
        $this->setProfileInfo($profileAbout,$profileTitle,$profileText,$this->userId);
    }

    public function updateProfileInfo($profileAbout,$profileTitle,$profileText){

        if($this->checkEmptyInput($profileAbout,$profileTitle,$profileText) == true){
            header("location: ../profilesettings.php?error=emptyinput");
            exit();
        }
        else
        { 
            $this->setNewProfileInfo($profileAbout,$profileTitle,$profileText,$this->userId);
        }
        
    }
        
    private function checkEmptyInput($profileAbout,$profileTitle,$profileText){
            $result = false;
            if(empty($profileAbout) || empty($profileTitle) || empty($profileText)){
                $result = true;
            }
            else{
                return $result = false;
            }

            return $result;
     }

}
    
