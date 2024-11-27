<?php 

class user{
    private int $userID;
    private string $email;
    private string $username;
    private string $userType;

    public function __construct($userID,$email,$username,$userType)
    {
        $this->userID = $userID;
        $this->email = $email;
        $this->username = $username;
        $this->userType = $userType;
    }

    public function getUserID(){
        return $this->userID;
    }

    public function getUserType(){
        return $this->userType;
    }

    public function getEmail(){
        return $this->email;
    }
    
    public function getUsername(){
        return $this->username;
    }

}