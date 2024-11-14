<?php

function getCurrentpage(){
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $url = str_replace('/webtraining/', '', $url);
    $segments = explode('/', $url);
    return $segments[0];
}