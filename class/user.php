<?php 

class user{
    private string $userID;
    private string $email;
    private string $username;
    private string $userType;
    // private int $classID;

    public function getUserID(){
        return $this->userID;
    }

    public function setuserID($userID){
        $this->userID = $userID;
    }






    public function setUserType($userType){
        $this->userType = $userType;
    }

    public function getUserType(){
        return $this->userType;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setUsername(string $username){
        $this->username = $username;
    }

    // public function setclassID($classID){
    //     $this->classID = $classID;
    // }

    // public function getClassID(){
    // return $this->classID;
    // }
}