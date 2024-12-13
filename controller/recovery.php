<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require_once("config.php");
require_once "model/recovery.php";

    class recoveryController{
        public function sendRecoveryPassword($email){
            $mail = new PHPMailer(true);
    
            try {
                $mail->isSMTP();
                $mail->CharSet = 'UTF-8';
                $mail->Encoding = 'base64';
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = EMAIL;
                $mail->Password   = EMAIL_PASS;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
            
                $mail->setFrom($email, 'WebTraining');
                $mail->addAddress($email);
            
                $mail->isHTML(true);
                $mail->Subject = 'Récupération mot de passe';
                $mail->Body    = 'Veuillez cliquer sur ce lien pour redéfinir votre mot de passe';
                $mail->AltBody = 'Récupération mot de passe';
            
                $mail->send();
                echo 'Message envoyé avec succès.';
                
            } catch (Exception $e) {
                echo "Le message n'a pas pu être envoyé. Erreur: {$mail->ErrorInfo}";
            }
        }
    }

    if(isset($_POST['emailToRecover'])){
        $emailToRecover = $_POST['emailToRecover'];
        // if($recoveryModel->addRecoveryToDb($emailToRecover)){
        //     $recoveryController = new recoveryController;
        //     $recoveryController->sendRecoveryPassword($emailToRecover);
        // }else{
        //     echo("L'email n'a pas été envoyé");
        // };

       
        var_dump($recoveryModel->addRecoveryToDb($emailToRecover));


      
       
       
    }
?>