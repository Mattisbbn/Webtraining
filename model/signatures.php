<?php

function changeCallStatus($pdo, $scheduleId,$action) {
    
    if($action == "start"){
        $callAction = "started";
    }elseif($action == "finish"){
        $callAction = "finished";
    }elseif($action == "cancel"){
        $callAction = null;
    }

    $sql = 'UPDATE `schedule` SET `call_status` = :callAction WHERE `id` = :scheduleID';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':scheduleID', $scheduleId);
    $stmt->bindParam(':callAction', $callAction);
    $stmt->execute();
}
