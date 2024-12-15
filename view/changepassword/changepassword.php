<?php 
require_once("controller/database.php");
require_once("model/changepassword.php");
$changePasswordModel = new changePassword($pdo);

if(isset($_GET["token"])){
    $token = $_GET["token"];

    $tokenAccount = $changePasswordModel->fetchRecoveryByToken($token);

    if($tokenAccount){
        require_once("view/changepassword/form/changepasswordform.php");
    }else{
        echo("Le token n'est pas valide");
    }
}
?>