<?php
class LoginModel{

    private $pdo;
    private $user_type;
    private $email;

    public function __construct($pdo,$user_type,$email){
        $this->pdo = $pdo;
        $this->user_type = $user_type;
        $this->email = $email;
    }

    public function fetchUser(){
        $sql = "SELECT id,role,email,password,username FROM users WHERE role = :userType AND email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':userType', $this->user_type);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}
