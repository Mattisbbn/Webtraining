<?php
$pageActions = new pageActions;
class pageActions{
    public function getCurrentpage(){
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = str_replace('/webtraining/', '', $url);
        $segments = explode('/', $url);
        return $segments[0];
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy(); 
        header("Location: login");
    }

}

if(isset($_POST["logout"])){
    $pageActions->logout();
}