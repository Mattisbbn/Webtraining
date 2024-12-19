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

// if (isset($_POST['validate-call'])) {
//     $scheduleId = $_POST['validate-call'];
//     $signaturesModel->changeCallStatus($scheduleId, "finished");
//     header("Location: ./");
// }

if (isset($_POST["close-popup"])) {
    header("Location: ./");
}


if(isset($_POST["presence"])){
    var_dump($_POST["presence"]);
}