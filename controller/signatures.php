<?php
require_once("model/signatures.php");
if (isset($_POST['start-call'])) {
    $scheduleId = $_POST['start-call'];
    changeCallStatus($pdo, $scheduleId, "start");
    header("Refresh:0");
}

if (isset($_POST['cancel-call'])) {
    $scheduleId = $_POST['cancel-call'];
    changeCallStatus($pdo, $scheduleId, "cancel");
    header("Location: ./");
}

if (isset($_POST['validate-call'])) {
    $scheduleId = $_POST['validate-call'];
    changeCallStatus($pdo, $scheduleId, "finish");
    header("Location: ./");
}

if (isset($_POST["close-popup"])) {
    header("Location: ./");
}

if(isset($_GET["call"])){
    $call_id = $_GET["call"];
    require_once("view/home/userViews/teacher/modal/signatures.php");
};

