<?php
if(isset($_POST["log-out"])){
    logout();
}

function logout() {
    session_start();
    session_unset();
    session_destroy(); 
    header("Location: login");
    exit;
}