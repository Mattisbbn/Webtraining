<?php
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
    $user_id = $_POST["user_id"]; // Obtenir l'ID de l'utilisateur depuis le formulaire
    if ($class_id) {
        changeClass($pdo, $user_id, $class_id);
    }
}