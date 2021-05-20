<?php
require_once dirname(__FILE__).'/../config.php';

include $config->root_path.'/app/security/guard.php';

require_once $config->root_path.'/app/CalcCurrencyController.class.php';

$controller = new CalcCurrencyController();
$controller->process();