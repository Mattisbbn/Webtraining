<?php 
require_once("controller/database.php");
require_once("model/changepassword.php");
$changePasswordModel = new changePasswordModel($pdo);

if(isset($_GET["token"])){
    $token = $_GET["token"];
    if($changePasswordModel->fetchRecoveryByToken($token)){
        require_once("view/changepassword/form/changepasswordform.php");
    }else{
        echo("Le token n'est pas valide");
    }
}
?>