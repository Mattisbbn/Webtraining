<?php
require_once("model/admin_actions.php");


if (isset($_POST["classIdToDelete"])) {
    deleteDbRow($pdo, "classes", $_POST["classIdToDelete"]);
    header("Refresh:0");
    exit();
}

if (isset($_POST["className"])) {
    addNewClass($pdo, $_POST["className"]);
    header("Refresh:0");
    exit();
}

if (isset($_POST["subjectIdToDelete"])) {
    deleteDbRow($pdo, "subject", $_POST["subjectIdToDelete"]);
    header("Refresh:0");
    exit();
}

if (isset($_POST["subjectName"])) {
    addNewSubject($pdo, $_POST["subjectName"]);
    header("Refresh:0");
    exit();
}

if(isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['userPassword']) && isset($_POST['userRole'])) {
    $hashedPassword = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);
    addNewUser($pdo,$_POST['userEmail'],$hashedPassword,$_POST['userName'],$_POST['userRole']);
    header("Refresh:0");
    exit();
}

if(isset($_POST["UserIdToDelete"])){
    $rowId = $_POST["UserIdToDelete"];
    deleteDbRow($pdo,"users",$rowId);
}

if (isset($_POST["editClass"])) {
    $class_id = $_POST["editClass"];
    $user_id = $_POST["user_id"];
    if ($class_id) {
        changeClass($pdo, $user_id, $class_id);
    }
}

if(isset($_POST["subjectOfLesson"]) && isset($_POST["classOfLesson"]) && isset($_POST["teacherOfLesson"]) && isset($_POST["lessonStartDate"]) && isset($_POST["lessonDuration"])){
    $subjectOfLesson = $_POST["subjectOfLesson"];
    $classOfLesson = $_POST["classOfLesson"];
    $teacherOfLesson = $_POST["teacherOfLesson"];
    $lessonStartDate = $_POST["lessonStartDate"];
    $lessonDuration = $_POST["lessonDuration"];
    addNewlesson($pdo,$subjectOfLesson,$classOfLesson,$teacherOfLesson,$lessonStartDate,$lessonDuration);
}