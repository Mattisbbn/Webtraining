<?php
require_once("model/admin.php");

$userActions = new UserActions;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['userPassword']) && isset($_POST['userRole'])) {
        $hashedPassword = password_hash($_POST['userPassword'], PASSWORD_DEFAULT);
        $userActions->addNewUser($pdo,$_POST['userEmail'],$hashedPassword,$_POST['userName'],$_POST['userRole']);
    }

    if (isset($_POST["classIdToDelete"])) {
        deleteDbRow($pdo, "classes", $_POST["classIdToDelete"]);
    }

    if (isset($_POST["className"])) {
        addNewClass($pdo, $_POST["className"]);
    }

    if (isset($_POST["subjectIdToDelete"])) {
        deleteDbRow($pdo, "subject", $_POST["subjectIdToDelete"]);
    }

    if (isset($_POST["subjectName"])) {
        addNewSubject($pdo, $_POST["subjectName"]);
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

    if(isset($_POST["subjectOfLesson"]) && isset($_POST["classOfLesson"]) && isset($_POST["teacherOfLesson"]) && isset($_POST["lessonStartDate"]) && isset($_POST["lessonDurationInMin"])){
        $subjectOfLesson = $_POST["subjectOfLesson"];
        $classOfLesson = $_POST["classOfLesson"];
        $teacherOfLesson = $_POST["teacherOfLesson"];
        $lessonStartDate = date("Y-m-d H:i:s", strtotime($_POST["lessonStartDate"]));
        $lessonDurationInMin = intval($_POST["lessonDurationInMin"]);
        $lessonEndDate = date("Y-m-d H:i:s", strtotime("+$lessonDurationInMin minutes", strtotime($lessonStartDate)));
        addNewlesson($pdo,$subjectOfLesson,$classOfLesson,$teacherOfLesson,$lessonStartDate,$lessonEndDate);
    }

    if(isset($_POST["eventToDelete"])){
        $rowId = $_POST["eventToDelete"];
        deleteDbRow($pdo,"schedule",$rowId);
    }
    header("Refresh:0");
}