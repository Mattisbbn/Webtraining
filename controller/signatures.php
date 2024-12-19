<?php
require_once("model/signatures.php");
$signaturesModel = new signaturesModel($pdo);

// if (isset($_POST['start-call'])) {
//     header("Refresh:0");
// }

// if (isset($_POST['cancel-call'])) {
//     $scheduleId = $_POST['cancel-call'];
//     $signaturesModel->changeCallStatus($scheduleId, null);
//     header("Location: ./");
// }

if (isset($_POST['end-call'])) {
    $scheduleId = $_POST['end-call'];
    $signaturesModel->endCall($scheduleId);
    header("Location: ./");
}

if (isset($_POST["close-popup"])) {
    header("Location: ./");
}


if(isset($_POST["presence"]) && isset($_GET["call"]) ){
    $presentStudents = $_POST["presence"];
    $scheduleId = $_GET["call"];
    $signaturesModel->startCall($scheduleId,$presentStudents);
}