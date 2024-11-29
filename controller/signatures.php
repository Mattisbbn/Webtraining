<?php
require_once("model/signatures.php");
$signaturesModel = new signaturesModel($pdo);

if (isset($_POST['start-call'])) {
    $scheduleId = $_POST['start-call'];
    $signaturesModel->changeCallStatus($scheduleId, "started");
    header("Refresh:0");
}

if (isset($_POST['cancel-call'])) {
    $scheduleId = $_POST['cancel-call'];
    $signaturesModel->changeCallStatus($scheduleId, null);
    header("Location: ./");
}

if (isset($_POST['validate-call'])) {
    $scheduleId = $_POST['validate-call'];
    $signaturesModel->changeCallStatus($scheduleId, "finished");
    header("Location: ./");
}

if (isset($_POST["close-popup"])) {
    header("Location: ./");
}

if(isset($_GET["call"])){
    $call_id = $_GET["call"];
    require_once("view/home/userViews/teacher/modal/signatures.php");
};
