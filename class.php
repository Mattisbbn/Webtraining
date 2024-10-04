<?php 

class user{
    private int $id;
    private string $email;
    private string $username;
   
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
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
}