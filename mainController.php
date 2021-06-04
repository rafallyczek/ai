<?php
require_once 'init.php';

use app\controllers\CalcCurrencyController;
use app\controllers\LoginController;

include getConfig()->root_path.'/app/security/guard.php';

switch($action){
    default:
        $controller = new CalcCurrencyController();
        $controller->generateView();
        break;
    case 'calcCurrency':
        $controller = new CalcCurrencyController();
        $controller->process();
        break;
    case 'login':
        $controller = new LoginController();
        $controller->processLogin();
        break;
    case 'logout':
        session_start();
        session_destroy();
        header("Location: ".getConfig()->app_url);
        break;
}