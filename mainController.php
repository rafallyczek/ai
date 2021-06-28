<?php
require_once 'init.php';

getRouter()->setDefaultRoute('calcShow');

getRouter()->addRoute('calcShow', 'CalcCurrencyController', 'user');
getRouter()->addRoute('calcCurrency', 'CalcCurrencyController', 'user');
getRouter()->addRoute('login', 'LoginController');
getRouter()->addRoute('logout', 'LoginController', 'user');

getRouter()->go();