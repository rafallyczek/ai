<?php
require_once 'init.php';

getRouter()->setDefaultRoute('calcShow');

getRouter()->addRoute('calcShow', 'CalcCurrencyController', ['user','admin']);
getRouter()->addRoute('calcCurrency', 'CalcCurrencyController', ['user','admin']);
getRouter()->addRoute('history', 'HistoryController','admin');
getRouter()->addRoute('login', 'LoginController');
getRouter()->addRoute('logout', 'LoginController', ['user','admin']);

getRouter()->go();