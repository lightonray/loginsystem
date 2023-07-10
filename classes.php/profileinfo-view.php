<?php

class ProfileInfoView extends ProfileInfo {
    
    public function fetchTitle($userId){
        $profile = $this->getProfileInfo($userId);

        echo $profile[0]["profiles_introtitle"];
    }

    public function fetchIntro($userId){
        $profile = $this->getProfileInfo($userId);

        echo $profile[0]["profiles_introtext"];
    }

    public function fetchAbout($userId){
        $profile = $this->getProfileInfo($userId);

        echo $profile[0]["profiles_about"];
    }
}