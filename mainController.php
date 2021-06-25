<?php
require_once 'init.php';

switch($action){
    default:
        control('CalcCurrencyController','generateView','user');
    case 'calcCurrency':
        control('CalcCurrencyController','process','user');
    case 'login':
        control('LoginController','processLogin');
    case 'logout':
        control('LoginController','processLogout','user');
}