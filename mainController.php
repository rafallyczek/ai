<?php
require_once 'init.php';

use app\controllers\CalcCurrencyController;
use app\controllers\LoginController;

switch($action){
    default:
        include 'guard.php';
        $controller = new CalcCurrencyController();
        $controller->generateView();
        break;
    case 'calcCurrency':
        include 'guard.php';
        $controller = new CalcCurrencyController();
        $controller->process();
        break;
    case 'login':
        $controller = new LoginController();
        $controller->processLogin();
        break;
    case 'logout':
        include 'guard.php';
        $controller = new LoginController();
        $controller->processLogout();
        break;
}