<?php
require_once dirname(__FILE__).'/../config.php';

include $config->root_path.'/app/security/guard.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

switch($action){
    default:
        include_once $config->root_path.'/app/calc/CalcCurrencyController.class.php';
        $controller = new CalcCurrencyController();
        $controller->generateView();
        break;
    case 'calcCurrency':
        include_once $config->root_path.'/app/calc/CalcCurrencyController.class.php';
        $controller = new CalcCurrencyController();
        $controller->process();
        break;
    case 'login':
        include_once $config->root_path.'/app/security/LoginController.class.php';
        $controller = new LoginController();
        $controller->processLogin();
        break;
}