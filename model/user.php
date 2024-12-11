<?php

$userModel = new userModel($pdo);


class userModel{

    private object $pdo;

    public function __construct(object $pdo){
        $this->pdo = $pdo; 
    }


    // public function getUserClass(int $userID){
    //     $sql = "SELECT users.class_id FROM users WHERE users.id = :userId";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->bindParam(':userId', $userID);
    //     $stmt->execute();
    //     $results = $stmt->fetchColumn();

    // return $results;
    // }
}