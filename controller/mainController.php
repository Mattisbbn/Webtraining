<?php

require_once("config.php");
class pageActions{
    public function getCurrentpage(){
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = str_replace('/webtraining/', '', $url);
        $segments = explode('/', $url);
        return $segments[0];
    }
}

function fetchAllDb($pdo, $table) {
    $sql = "SELECT * FROM $table";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}