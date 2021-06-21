<?php

use app\transfer\User;
use app\controllers\LoginController;

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$user = isset($_SESSION['user']) ? unserialize($_SESSION['user']) : null;

if( !(isset($user) && isset($user->login) && isset($user->role)) ){
    $controller = new LoginController();
    $controller->generateView();
    exit();
}