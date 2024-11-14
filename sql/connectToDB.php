<?php
function fetchAllDb($pdo, $table){ 
    $sql = "SELECT * FROM :table";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':table', $table);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
}

function fetchUserType($pdo,$userType){
    $sql = "SELECT * FROM users WHERE role = :userType";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userType', $userType);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
}
