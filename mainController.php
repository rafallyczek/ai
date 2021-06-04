<?php
require_once 'init.php';

include getConfig()->root_path.'/app/security/guard.php';

switch($action){
    default:
        include_once getConfig()->root_path.'/app/controllers/CalcCurrencyController.class.php';
        $controller = new CalcCurrencyController();
        $controller->generateView();
        break;
    case 'calcCurrency':
        include_once getConfig()->root_path.'/app/controllers/CalcCurrencyController.class.php';
        $controller = new CalcCurrencyController();
        $controller->process();
        break;
    case 'login':
        include_once getConfig()->root_path.'/app/controllers/LoginController.class.php';
        $controller = new LoginController();
        $controller->processLogin();
        break;
    case 'logout':
        session_start();
        session_destroy();
        header("Location: ".getConfig()->app_url);
        break;
}