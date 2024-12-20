<?php
require_once(__DIR__ . "/../config.php");
class database{

    private $host = DB_HOST;
    private $databaseName = DB_NAME;
    private $databaseUser = DB_USER;
    private $databasePassword = DB_PASS;
    private $settings = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    public function connect(){
        $pdo = new PDO('mysql:host=' . $this->host . '; port=3306; dbname=' . $this->databaseName, $this->databaseUser, $this->databasePassword,$this->settings);
        return $pdo;
    } 

    public function fetchAllTable($table){
        $pdo = $this->connect();
        $sql = "SELECT * FROM $table";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function deleteDbRow($table,$rowId){
        $pdo = $this->connect();
        $sql = "DELETE FROM $table WHERE id = $rowId";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }
}
$database = new database;
$pdo = $database->connect();