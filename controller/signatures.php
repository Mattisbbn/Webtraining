<?php
require_once("model/signatures.php");


if(isset($_POST['start-call'])){
    $scheduleId = $_POST['start-call'];
    changeCallStatus($pdo,$scheduleId,"start");
    header("Refresh:0");
    }


 if(isset($_POST['cancel-call'])){
        $scheduleId = $_POST['cancel-call'];
        changeCallStatus($pdo,$scheduleId,"cancel");
        header("Location: ./");
    }
    